<?php

namespace App\Http\Controllers;

use App\Events\CreateConfirmCompleted;
use App\Events\CreateConfirmOrder;
use App\Events\CreateNewOrder;
use App\Events\CreateNewRemindReturnCar;
use App\Mail\ConfirmCompleted;
use App\Mail\ConfirmOrder;
use App\Mail\NewRemindReturnCar;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Expense;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function homeAdmin() {
        $currentDate = Carbon::now()->format('Y-m-d');
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
        $costs = Expense::all();

        return view("admin.pages.detailOrder",compact("order","costs"));
    }
    public function updateStatus($order , Request $request)
    {
        $stt=$request->get("status");
        $order = Order::find("$order");
        if($stt == 8){
            Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
                ->send(new ConfirmCompleted($order));

            event(new CreateConfirmCompleted($order));
        }

        $order->status = "$stt";

        $order->save();
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
        if($stt == 2){
            Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
                ->send(new ConfirmOrder($order));

            event(new CreateConfirmOrder($order));
        }
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
        $date_now = Carbon::now()->format('Y-m-d');
        $time_now = Carbon::now()->format('H:i:s');
        $od = DB::table('order_products')->where("order_id",$order->id)->first();
        $end_date = $od->end_date;
        $start_date = $od->start_date;
        $start_time = $od->start_time;
        $end_time = $od->end_time;
        $product = Product::find($od->product_id);
        $product_price = $product->price;
        if($date_now != $end_date && $end_date!= $start_date){
            $ngay1 = Carbon::createFromFormat('Y-m-d H:i:s', $start_date . ' ' . $start_time); // Mốc thời gian đầu
            $ngay2 = Carbon::createFromFormat('Y-m-d H:i:s', $date_now . ' ' . $time_now); // Mốc thời gian cuối
            $hieuGio = $ngay2->diffInHours($ngay1);
            $day = $hieuGio / 24;
            $kq_day = round($day);
            $amount_new = $kq_day * $product_price;
            $od->end_date = $date_now;
            $od->end_time = $time_now;
            $result = DB::table("order_products")
                ->where('order_id',$order->id)
                ->update([
                    'end_date' => $date_now,
                    'end_time' => $time_now,
                    'buy_qty' => $kq_day,

                ]);
            $order->grand_total = $amount_new;
            $order->save();
        }
        else if($start_date == $end_date){
            $startDateTime = Carbon::createFromFormat('H:i:s', $start_time);
            $price_hours = $product->hourly_price;
            $diff = $startDateTime->diffInHours($time_now);
            $hieu_hours = round($diff);
            $result = DB::table("order_products")
                ->where('order_id',$order->id)
                ->update([
                    'buy_qty' => $hieu_hours,
                    'end_time' => $time_now,


                ]);
            $amount_new = $hieu_hours * $price_hours;
            $order->grand_total = $amount_new;
            $order->save();

        }



        return redirect()->back()->with('success', 'Success');
    }
    public function damage (Request $request , Order $order){
        $stt = $request->get("status");

        $names = $request->input('name');
        $prices = $request->input('price');
        $images = $request->file('image');
        foreach ($names as $key => $name) {
            $price = $prices[$key];
            $image = $images[$key];
            $path = public_path('uploads');
            $fileName = Str::random(5) . time() . Str::random(5) . '.' . $image->getClientOriginalExtension();
            $image->move($path, $fileName);
            $imagePath = '/uploads/' . $fileName;


            $order->costsIncurred()->create([
                'order_id' => $order->id,
                'damage' => $name,
                'price' => $price,
                'image'=>$imagePath
            ]);}
        return redirect()->back()->with('success', 'Success');
    }
    public function remindReturnCar(Request $request , Order $order)
    {   $currentDate = Carbon::now()->format('Y-m-d');
        $currentTime = Carbon::now();

        $remind = Order::where('status','3')->whereHas('products', function ($query) use ($currentDate) {
            $query->whereDate('end_date', $currentDate);
        })->paginate(10);
        return view("admin.pages.remindReturnCar",compact("remind"));
    }
    public function updateSttRemind($order , Request $request){
        $stt = $request->get("stt");

        DB::table('order_products')
            ->where('order_id', $order)
            ->update(['stt_remind' => $stt]);
        $order = Order::find($order);
        Mail::to($order->email)
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
            ->send(new NewRemindReturnCar($order));

        event(new CreateNewRemindReturnCar($order));
        return redirect()->back()->with('success', 'Success');
    }
    public function billOrderCompleted($id){
        $orders = Order::find($id);
        return view("admin.pages.billOrderCompleted",compact("orders"));
    }
    public function feedback(){
        $feedbacks = Feedback::all();
        return view("admin.pages.feedback",compact("feedbacks"));
    }
}
