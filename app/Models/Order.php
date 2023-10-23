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
        "user_id",
        "email",
        "status",
        "full_name",
        "tel",
        'location',
        "address",
        "payment_method",
        "is_paid",
    ];
    const WAIT = 0;
    const CONFIRMED = 1;
    const SHIPPING = 2;
    const SHIPPED = 3;
    const RETURN =4;
    const COMPLETE = 5;
    const CANCEL = 6;

    public function Products(){
        return $this->belongsToMany(Product::class,"order_products")->withPivot(["buy_qty","price"]);
    }

    public function getGrandTotal(){
        return "$".number_format($this->grand_total,2);
    }
    public function getPaid(){
        return $this->is_paid?"<span style='border-radius: 7px' class='bg-success p-2 small'>Paid</span>"
            :"<span style='border-radius: 7px' class='bg-secondary p-2 small'>Unpaid</span>";
    }
    public function getStatus(){
        switch ($this->status){
            case self::WAIT: return "<span class='text-secondary'>Wait for confirmation</span>";
            case self::CONFIRMED: return "<span class='text-info'>Confirmed</span>";
            case self::SHIPPING: return "<span class='text-warning'>Car is being delivered</span>";
            case self::SHIPPED: return "<span class='text-primary'>Delivered</span>";
            case self::RETURN: return "<span class='text-primary'>Car returned</span>";
            case self::COMPLETE: return "<span class='text-success'>Complete</span>";
            case self::CANCEL: return "<span class='text-danger'>Cancel</span>";
        }
    }
}
