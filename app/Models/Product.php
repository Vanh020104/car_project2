<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "products";
    protected $fillable = [
        "name",
        "slug",
        "price",
        "deposit",
        "thumbnail",
        "description",
        "qty",
        "category_id",
        "seat",
        "door",
        "fuel_style",
        "car_year",
        "mileage",
        "color"
    ];
}
