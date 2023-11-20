<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = "feedback";
    protected $fillable = [
        "id",
        "order_id",
        "user_id",
        "product_id",
        "rating",
        "feedback"
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function scopeFilterProduct($query,$request){
        if($request->has("product_id")&& $request->get("product_id") != 0){
            $product_id = $request->get("product_id");
            $query->where("product_id",$product_id);
        }
        return $query;
    }
}
