<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function homeAdmin() {
        $today = Carbon::today();

        $order_today = Order::whereDate('created_at', $today)->paginate(20);
        $products = Product::orderBy("created_at","desc")->paginate(12);
        $orders = Order::orderBy("created_at","desc")->paginate(12);

        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $doanhthu = Order::where('status', '7')
            ->whereBetween('time_completed', [$startDate, $endDate])
            ->paginate(100);
        return view("admin.pages.homeAdmin",compact("products","orders","order_today","doanhthu"));
    }
    public function carsList(Request $request) {
        $products = Product::Search($request)->FilterCategory($request)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.pages.carsList",[
            "products"=>$products,
            'categories'=>$categories]);
    }
    public function ordersList(Request $request){
        $orders = Order::Search($request)->orderBy("created_at","desc")->paginate(100);
        return view("admin.pages.ordersList",compact("orders"));
    }
    public function detailOrder($id){
        $order = Order::find("$id");

        return view("admin.pages.detailOrder",compact("order"));
    }
    public function updateStatus($order , Request $request)
    {
        $stt=$request->get("status");
        $orders = Order::find("$order");
        $orders->status = "$stt";
        if($stt == 7){
            $orders->time_completed = Carbon::now();
        }
        $orders->save();
        return redirect()->to("/admin/ordersList")->with("success", "Successfully");
    }
    public function orderToday(Request $request){
        $today = Carbon::today();
        $orders = Order::Search($request)->whereDate('created_at', $today)->orderBy("created_at","desc")->paginate(100);
        return view("admin.pages.orderToday",compact("orders"));
    }
    public function monthlyRevenue(Request $request){
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $orders = Order::where('status', '7')
            ->whereBetween('time_completed', [$startDate, $endDate])
            ->Search($request)->paginate(100);

        return view("admin.pages.monthlyRevenue",compact("orders"));
    }
}
