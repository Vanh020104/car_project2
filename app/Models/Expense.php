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
        "price"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class ,'order_id', 'id');
    }
}