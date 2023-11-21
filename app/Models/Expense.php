<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = "expense";
    protected $fillable = [
        "order_id",
        "damage",
        "price",
        "image",
        "product_id"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class ,'order_id', 'id');
    }
    public function scopeFilterProduct($query,$request){
        if($request->has("product_id")&& $request->get("product_id") != 0){
            $product_id = $request->get("product_id");
            $query->where("product_id",$product_id);
        }
        return $query;
    }
}
