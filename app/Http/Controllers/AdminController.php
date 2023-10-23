<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeAdmin() {
        return view("admin.pages.homeAdmin");
    }
    public function carsList(Request $request) {
        $products = Product::Search($request)->FilterCategory($request)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.pages.carsList",[
            "products"=>$products,
            'categories'=>$categories]);
    }

}
