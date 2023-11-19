<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverdueCosts extends Model
{
    use HasFactory;
    protected $table = "overdue_costs";
    protected $fillable = [
        "order_id",
        "time_late",
        "time",
        "costs"
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
