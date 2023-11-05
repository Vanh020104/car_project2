<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function homeAdmin() {
        $month = date('m');

        $categoryCounts = DB::table('categories')
            ->select('categories.name', DB::raw('COUNT(*) as count'))
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('order_products', 'products.id', '=', 'order_products.product_id')
            ->join('orders', 'order_products.order_id', '=', 'orders.id')
            ->whereMonth('orders.time_completed', '=', $month)
            ->groupBy('categories.name')
            ->where('status','7')

            ->get();


        $today = Carbon::today();
        $order_today = Order::whereDate('created_at', $today)->paginate(20);
        $products = Product::orderBy("created_at","desc")->paginate(12);
        $orders = Order::where("status","!=","7")->where("status","!=","6")->orderBy("created_at","desc")->paginate(12);
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();
        $doanhthu = Order::where('status', '7')
            ->whereBetween('time_completed', [$startDate, $endDate])
            ->paginate(100);
        return view("admin.pages.homeAdmin",compact("products","orders","order_today","doanhthu","categoryCounts"));
    }
    public function carsList(Request $request) {
        $products = Product::Search($request)->FilterCategory($request)->orderBy("id","desc")->paginate(20);
        $categories = Category::all();
        return view("admin.pages.carsList",[
            "products"=>$products,
            'categories'=>$categories]);
    }
    public function ordersList(Request $request){
        $orders = Order::where("status","!=","7")->where("status","!=","6")->Search($request)->orderBy("created_at","desc")->paginate(100);
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
    public function historyOrder(Request $request){
        $history_order = Order::whereIn('status', ['7', '6'])->Search($request)->orderBy("created_at","desc")->paginate(100);
        return view("admin.pages.historyOrder",compact("history_order"));
    }
    public function revenueChart(Request $request)
    {
        $year = $request->input('year', date('Y'));
        $monthLabels = [
            'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
        ];
        $data = Order::selectRaw('MONTH(time_completed) AS month, SUM(grand_total) AS revenue')
            ->groupBy('month')
            ->orderBy('month')
            ->whereYear('time_completed',$year)
            ->where('status','7')
            ->get();

        $revenueByMonth = $data->pluck('revenue', 'month')->toArray();
        $revenues = [];

        foreach (range(1, 12) as $month) {
            $revenues[] = $revenueByMonth[$month] ?? 0;
        }

        return response()->json([
            'labels' => $monthLabels,
            'revenues' => $revenues,
        ]);
    }
    public function categoryCounts()
    {
        $month = date('m');

        $categoryCounts = DB::table('categories')
            ->select('categories.name', DB::raw('COUNT(*) as count'))
            ->join('products', 'categories.id', '=', 'products.category_id')
            ->join('order_products', 'products.id', '=', 'order_product.product_id')
            ->join('orders', 'order_product.order_id', '=', 'orders.order_id')
            ->whereMonth('orders.time_completed', '=', $month)
            ->where('status','7')
            ->groupBy('categories.name')
            ->get();
        return view('admin.pages.home', ['categoryCounts' => $categoryCounts]);
    }
    public function uploadImageCVD(Request $request,Order $order){
        $stt = $request->get("status");
        $order->status = $stt;
        $order->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $path = public_path('uploads');
                $fileName = Str::random(5) . time() . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $image->move($path, $fileName);
                $imagePath = '/uploads/' . $fileName;

                // Lưu thông tin ảnh vào cơ sở dữ liệu
                $order->images()->create([
                    'order_id' => $order->id,
                    'image' => $imagePath
                ]);
            }
        }


        return redirect()->back()->with('success', 'Success');
    }
    public function uploadImageReturn(Request $request,Order $order){
        $stt = $request->get("status");
        $order->status = $stt;
        $order->save();

        if ($request->hasFile('images')) {
            $images = $request->file('images');

            foreach ($images as $image) {
                $path = public_path('uploads');
                $fileName = Str::random(5) . time() . Str::random(5) . '.' . $image->getClientOriginalExtension();
                $image->move($path, $fileName);
                $imagePath = '/uploads/' . $fileName;

                // Lưu thông tin ảnh vào cơ sở dữ liệu
                $order->imagesReturn()->create([
                    'order_id' => $order->id,
                    'image' => $imagePath
                ]);
            }
        }
        return redirect()->back()->with('success', 'Success');
    }
    public function damage(Request $request , Order $order){
        $stt = $request->get("status");

        $names = $request->input('name');
        $prices = $request->input('price');
        foreach ($names as $key => $name) {
            $price = $prices[$key];

            $order->costsIncurred()->create([
                'order_id' => $order->id,
                'damage' => $name,
                'price' => $price,
            ]);}
        return redirect()->back()->with('success', 'Success');
    }
}
