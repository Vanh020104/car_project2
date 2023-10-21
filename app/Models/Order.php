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
        "email",
        "status",
        "full_name",
        "tel",
        'location',
        "address",
        "payment_method",
        "is_paid",
    ];
}
