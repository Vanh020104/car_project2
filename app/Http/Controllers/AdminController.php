<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function homeAdmin() {
        $products = Product::orderBy("created_at","desc")->paginate(12);
        $orders = Order::orderBy("created_at","desc")->paginate(12);
        return view("admin.pages.homeAdmin",compact("products","orders"));
    }
    public function carsList(Request $request) {
        $products = Product::Search($request)->FilterCategory($request)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.pages.carsList",[
            "products"=>$products,
            'categories'=>$categories]);
    }
    public function ordersList(){
        $orders = Order::orderBy("created_at","desc")->paginate(12);
        return view("admin.pages.ordersList",compact("orders"));
    }
    public function detailOrder($id){
        $order = Order::find("$id");

        return view("admin.pages.detailOrder",compact("order"));
    }
}
