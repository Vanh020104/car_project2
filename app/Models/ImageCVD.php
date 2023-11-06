<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageCVD extends Model
{
    use HasFactory;
    protected $table = "image_cvd";
    protected $fillable = [
        "order_id",
        "image"
    ];

    public function order()
    {
        return $this->belongsTo(Order::class ,'order_id', 'id');
    }
}
