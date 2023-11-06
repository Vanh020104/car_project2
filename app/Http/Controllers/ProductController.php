<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController
{
    public function create(){
        $categories = Category::all();
        return view("admin.pages.product.create",compact('categories'));
    }

    public function store(Request $request){
        $request->validate([
            "name"=>"required|min:6",
            "price"=>"required|numeric|min:0",
            "hourly_price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required|numeric|min:1",
            "thumbnail"=>"nullable|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",


            "deposit"=>"required|numeric|min:1000",
            "seat"=>"required|numeric|min:2",
            "door"=>"required|numeric|min:2",
            "car_year"=>"required|numeric|min:1900",
            "mileage"=>"required|numeric|min:0",
            "power"=>"required|numeric|min:1000",
            "fuel_style"=>"required:min:3",
            "color"=>"required|min:2"

        ]);
        try {
            $thumbnail = null;
            // xu ly upload file
            if($request->hasFile("thumbnail")){
                $path = public_path("uploads");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension();
                $file->move($path,$file_name);
                $thumbnail = "/uploads/".$file_name;
            }

            Product::create([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "thumbnail"=>$thumbnail,
                "price"=>$request->get("price"),
                "hourly_price"=>$request->get("hourly_price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "description"=>$request->get("description"),
                "color"=>$request->get("color"),
                "fuel_style"=>$request->get("fuel_style"),
                "deposit"=>$request->get("deposit"),
                "seat"=>$request->get("seat"),
                "door"=>$request->get("door"),
                "car_year"=>$request->get("car_year"),
                "mileage"=>$request->get("mileage"),
                "power"=>$request->get("power"),

            ]);
            return redirect()->to("/admin/carsList")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function delete(Product $product){
        try {
            $product->delete();
            return redirect()->to("/admin/carsList")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }
    public function edit(Product $product){
        $categories = Category::all();
        return view("admin.pages.product.edit",compact('product','categories'));
    }
    public function update(Product $product,Request $request){
        $request->validate([
            "name"=>"required|min:6",
            "price"=>"required|numeric|min:0",
            "hourly_price"=>"required|numeric|min:0",
            "qty"=>"required|numeric|min:0",
            "category_id"=>"required|numeric|min:1",
            "thumbnail"=>"nullable|mimes:png,jpg,jpeg,gif|mimetypes:image/jpeg,image/png,image/jpg",
            "deposit"=>"required|numeric|min:1000",
            "seat"=>"required|numeric|min:2",
            "door"=>"required|numeric|min:2",
            "car_year"=>"required|numeric|min:1900",
            "mileage"=>"required|numeric|min:0",
            "power"=>"required|numeric|min:1000",
            "fuel_style"=>"required:min:3",
            "color"=>"required|min:2"
        ]);
        try {
            $thumbnail = $product->thumbnail;
            // xu ly upload file
            if($request->hasFile("thumbnail")){
                $path = public_path("uploads");
                $file = $request->file("thumbnail");
                $file_name = Str::random(5).time().Str::random(5).".".$file->getClientOriginalExtension();
                $file->move($path,$file_name);
                $thumbnail = "/uploads/".$file_name;
            }
            $product->update([
                "name"=>$request->get("name"),
                "slug"=> Str::slug($request->get("name")),
                "thumbnail"=>$thumbnail,
                "price"=>$request->get("price"),
                "hourly_price"=>$request->get("hourly_price"),
                "qty"=>$request->get("qty"),
                "category_id"=>$request->get("category_id"),
                "description"=>$request->get("description"),
                "color"=>$request->get("color"),
                "fuel_style"=>$request->get("fuel_style"),
                "deposit"=>$request->get("deposit"),
                "seat"=>$request->get("seat"),
                "door"=>$request->get("door"),
                "car_year"=>$request->get("car_year"),
                "mileage"=>$request->get("mileage"),
                "power"=>$request->get("power"),
            ]);
            return redirect()->to("/admin/carsList")->with("success","Successfully");
        }catch (\Exception $e){
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

}
