<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverdueRemind extends Model
{
    use HasFactory;
    protected $table = "overdue_remind";
    protected $fillable = [
        "order_id",
        "time_remind"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class ,'order_id', 'id');
    }
}
