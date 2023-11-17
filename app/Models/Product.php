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
        "hourly_price",
        "thumbnail",
        "description",
        "qty",
        "category_id",
        "seat",
        "door",
        "power",
        "fuel_style",
        "car_year",
        "mileage",
        "color"
    ];
    public function Category(){ // model relationship
        return $this->belongsTo(Category::class);
    }
    public function scopeSearch($query,$request){
        if($request->has("search")&& $request->get("search") != ""){
            $search = $request->get("search");
            $query->where("name","like","%$search%")
                ->orWhere("description","like","%$search%");
        }
        return $query;
    }
    public function Orders(){
        return $this->belongsToMany(Order::class,"order_products");
    }

    public function scopeFilterCategory($query,$request){
        if($request->has("category_id")&& $request->get("category_id") != 0){
            $category_id = $request->get("category_id");
            $query->where("category_id",$category_id);
        }
        return $query;
    }


    public function favoritedByUsers()
    {
        return $this->belongsToMany(Order::class, 'favorite_products', 'product_id', 'user_id');
    }



    public function scopeFilterSeat($query,$request){
        if($request->has("seat")&& $request->get("seat") != 0){
            $seat = $request->get("seat");
            $query->where("seat","=",$seat);
        }
        return $query;
    }
    public function scopeFilterColor($query,$request){
        if($request->has("color")&& $request->get("color") != 0){
            $color = $request->get("color");
            $query->where("color","=",$color);
        }
        return $query;
    }
    public function scopePriceMin($query,$request){
        if($request->has("pricemin")&& $request->get("pricemin") != ""){
            $pricemin = $request->get("pricemin");
            $query->where("price",">",$pricemin);
        }
        return $query;
    }
    public function scopePriceMax($query,$request){
        if($request->has("pricemax")&& $request->get("pricemax") != ""){
            $pricemax = $request->get("pricemax");
            $query->where("price","<",$pricemax);
        }
        return $query;
    }

}
