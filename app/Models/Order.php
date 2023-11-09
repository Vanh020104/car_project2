<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        "grand_total",
        "deposit",
        "user_id",
        "email",
        "status",
        "full_name",
        "tel",
        "time_completed",
        'location',
        "address",
        "payment_method",
        "is_paid",

    ];
    const WAIT = 0;
    const CONFIRMED = 1;
    const SHIPPED = 3;
    const RETURN =4;

    const CAR_RETURNED =5;
    const COMPLETE = 7;
    const CANCEL = 6;

    public function Products(){
        return $this->belongsToMany(Product::class,"order_products")->withPivot(["buy_qty","price","start_date","end_date","start_time","end_time","stt_remind"]);
    }

    public function getGrandTotal(){
        return "$".number_format($this->grand_total,2);
    }
    // Trong mô hình Order.php


    public function getPaid(){
        return $this->is_paid?"<span style='border-radius: 7px' class='bg-success p-2 small'>Paid</span>"
            :"<span style='border-radius: 7px' class='bg-secondary p-2 small'>Unpaid</span>";
    }
    public function getStatus(){
        switch ($this->status){
            case self::WAIT: return "<span class='text-secondary'>Wait for confirmation</span>";
            case self::CONFIRMED: return "<span class='text-info'>Confirmed</span>";

            case self::SHIPPED: return "<span class='text-primary'>Delivered</span>";
            case self::RETURN: return "<span class='text-primary'>Car returned</span>";
            case self::COMPLETE: return "<span class='text-success'>Complete</span>";
            case self::CAR_RETURNED: return "<span class='text-danger'>Car Returned</span>";
            case self::CANCEL: return "<span class='text-danger'>Cancel</span>";
        }
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("id","like","%$search%");
        }
        return $query;
    }



    public function favoriteProducts()
    {
        return $this->belongsToMany(Product::class, 'favorite_products', 'user_id', 'product_id');
    }
    public function productss()
    {
        return $this->belongsToMany(Product::class, 'order_products', 'order_id', 'product_id');
    }
    public function images()
    {
        return $this->hasMany(ImageCvd::class,'order_id', 'id');
    }
    public function imagesReturn()
    {
        return $this->hasMany(ImageReturn::class,'order_id', 'id');
    }
    public function costsIncurred()
    {
        return $this->hasMany(Expense::class,'order_id', 'id');
    }

}
