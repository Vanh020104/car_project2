<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    protected $table = 'order_products';

    protected $fillable = [
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'order_id',
        "buy_qty",
        'id'

    ];
    public function Products(){
        return $this->belongsToMany(Product::class,"order_products")->withPivot(["buy_qty","price","start_date","end_date","start_time","end_time","stt_remind"]);
    }
    public $timestamps = false;

}
