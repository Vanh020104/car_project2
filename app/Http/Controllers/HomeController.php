<?php

namespace App\Http\Controllers;

use App\Events\CreateNewOrder;
use App\Mail\OrderMail;
use App\Models\Car;
use App\Models\Feedback;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Error;
use App\Models\Favorite;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;


class HomeController extends Controller
{
    public function home(){
        $products = Product::orderBy("created_at","desc")->paginate(14);
        return view("user.pages.home",compact("products"));
    }

    public function product(Product $product){



        return view("user.pages.product", compact("product"));
    }

    public function category(Category $category, Order $order){
        $products = Product::where("category_id",$category->id)
            ->orderBy("created_at","desc")->paginate(14);
        return view("user.pages.category",compact("products"));
    }

//    public function addToCart(Product $product, Request $request)
//    {
//        $buy_qty = $request->get("buy_qty");
//        $start_date = $request->get("start_date");
//        $end_date = $request->get("end_date");
//        $start_time = $request->get("start_time");
//        $end_time = $request->get("end_time");
//
//        // Kiểm tra xem sản phẩm đã được thuê trong khoảng thời gian yêu cầu
//        $isAlreadyRented = OrderProduct::where('product_id', $product->id)
//            ->where(function ($query) use ($start_date, $end_date, $start_time, $end_time) {
//                $query->where(function ($query) use ($start_date, $end_date) {
//                    $query->where('start_date', '<=', $start_date)
//                        ->where('end_date', '>=', $start_date);
//                })->orWhere(function ($query) use ($start_date, $end_date) {
//                    $query->where('start_date', '<=', $end_date)
//                        ->where('end_date', '>=', $end_date);
//                });
//            })
//            ->exists();
//
//        if ($isAlreadyRented) {
//            return redirect()->back()->with("error", "This vehicle is already rented during the requested period!");
//        }
//
//        $cart = session()->has("cart") ? session("cart") : [];
//
//        foreach ($cart as $item) {
//            if($item->id == $product->id){
//                $item->buy_qty = $item->buy_qty + $buy_qty;
//                $item->start_date = $start_date;
//                $item->end_date = $end_date;
//                $item->start_time = $start_time;
//                $item->end_time = $end_time;
//
//                session(["cart" => $cart]);
//                return redirect()->to("/checkout")->with("success", "Your vehicle has just been added to the cart!");
//            }
//        }
//
//
//        $product->buy_qty = $buy_qty;
//        $product->start_date = $start_date;
//        $product->end_date = $end_date;
//        $product->start_time = $start_time;
//        $product->end_time = $end_time;
//
//        $cart[] = $product;
//        session(["cart" => $cart]);
//
//        return redirect()->to("/checkout")->with("success", "Your vehicle has just been added to the cart!");
//    }

    public function addToCart(Product $product, Request $request)
    {
        $buy_qty = $request->get("buy_qty");
        $start_date = $request->get("start_date");
        $end_date = $request->get("end_date");
        $start_time = $request->get("start_time");
        $end_time = $request->get("end_time");

        //        // Kiểm tra xem sản phẩm đã được thuê trong khoảng thời gian yêu cầu
        $isAlreadyRented = OrderProduct::where('product_id', $product->id)
            ->where(function ($query) use ($start_date, $end_date, $start_time, $end_time) {
                $query->where(function ($query) use ($start_date, $end_date) {
                    $query->where('start_date', '<=', $start_date)
                        ->where('end_date', '>=', $start_date);
                })->orWhere(function ($query) use ($start_date, $end_date) {
                    $query->where('start_date', '<=', $end_date)
                        ->where('end_date', '>=', $end_date);
                });
            })
            ->exists();

        if ($isAlreadyRented) {
            return redirect()->back()->with("error", "This vehicle is already rented during the requested period!");
        }
        $cart = session()->has("cart") ? session("cart") : [];

        // Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng hay không
        $existingProductKey = -1;
        foreach ($cart as $key => $item) {
            if ($item->id == $product->id) {
                $existingProductKey = $key;
                break;
            }
        }

        // Nếu sản phẩm đã tồn tại trong giỏ hàng, cập nhật thông tin sản phẩm
        if ($existingProductKey !== -1) {
            $existingProduct = $cart[$existingProductKey];
            $existingProduct->buy_qty = $buy_qty;
            $existingProduct->start_date = $start_date;
            $existingProduct->end_date = $end_date;
            $existingProduct->start_time = $start_time;
            $existingProduct->end_time = $end_time;
            $cart[$existingProductKey] = $existingProduct;
        } else {
            // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào giỏ hàng
            $product->buy_qty = $buy_qty;
            $product->start_date = $start_date;
            $product->end_date = $end_date;
            $product->start_time = $start_time;
            $product->end_time = $end_time;
            $cart = [$product]; // Khởi tạo giỏ hàng với sản phẩm mới nếu không có sản phẩm khác
        }

        session(["cart" => $cart]);

        return redirect()->to("/checkout")->with("success", "Your vehicle has just been added to the cart!");
    }









    public function cart(){
        $cart = session()->has("cart")?session("cart"):[];
        $total =0;
        foreach ($cart as $item) {
            if ($item->start_date == $item->end_date) {
                $total += $item->hourly_price * $item->buy_qty ;
            } else {
                $total += $item->price * $item->buy_qty ;

            }
        }
        return view("user.pages.cart",compact("cart", "total"));
    }

    public function deleteFromCart(Product $product){
        $cart = session()->has("cart") ? session("cart") : [];
        $cart = array_filter($cart, function ($item) use ($product) {
            return $item->id != $product->id;
        });
        session()->put("cart", $cart);
        return redirect()->back()->with("success", "Product removed from cart!");


    }
    public function clearCart(){
        session()->forget("cart");
        return redirect()->back()->with("success", "All products have been removed from the cart!");
    }


    public function checkout()
    {

        $cart = session()->has("cart") ? session("cart") : [];
        $total = 0;
        foreach ($cart as $item) {
            if ($item->start_date == $item->end_date) {
                $total += $item->hourly_price * $item->buy_qty;
            } else {
                $total += $item->price * $item->buy_qty;

            }
        }
        $totalWithDelivery = $total;
        if (old('pickup_location') === 'home') {
            $totalWithDelivery += 20; // Cộng thêm 20 vào tổng nếu chọn nhận tại nhà
        }


        return view("user.pages.checkout", compact("cart", "total","totalWithDelivery"));

    }

//    public function checkout()
//    {
//        $cart = session()->has("cart") ? session("cart") : [];
//        $latestItem = end($cart); // Lấy sản phẩm cuối cùng trong mảng giỏ hàng
//
//        // Tính toán tổng giá trị
//        $total = 0;
//        if ($latestItem->start_date == $latestItem->end_date) {
//            $total += $latestItem->hourly_price * $latestItem->buy_qty;
//        } else {
//            $total += $latestItem->price * $latestItem->buy_qty;
//        }
//
//        $totalWithDelivery = $total;
//        if (old('pickup_location') === 'home') {
//            $totalWithDelivery += 20; // Cộng thêm 20 vào tổng nếu chọn nhận tại nhà
//        }
//
//        return view("user.pages.checkout", compact("latestItem", "total", "totalWithDelivery"));
//    }

    public function placeOrder(Request $request){
        $userId = Auth::id();
        $request->validate([
            "full_name"=>"required|min:6",
            "address"=>"required",
            "location"=>"required",
            "tel"=> "required|min:9|max:11",
            "email"=>"required",
            "payment_method"=>"required",
            "cccd"=>"required",
            "drive_photo"=>"required"
        ],[
            "required"=>"Please enter information!"
        ]);
        // calculate
        $cart = session()->has("cart")?session("cart"):[];
        $total = 0;
        $deposit = 0;
        $priceTotal =0;

        foreach ($cart as $item) {
            $deposit += $item->deposit;
            $pickupLocation = request()->input("pickup_location");
            if ($item->start_date == $item->end_date) {
                $priceTotal += $item->hourly_price;

                if ($pickupLocation === "home")
                {
                    $total += $item->hourly_price * $item->buy_qty + 20;
                } else{
                    $total += $item->hourly_price * $item->buy_qty;
                }

            } else {

                $priceTotal += $item->price;
                if ($pickupLocation === "home")
                {
                    $total += $item->price * $item->buy_qty + 20;
                } else{
                    $total += $item->price * $item->buy_qty ;
                }

            }
        }
        $order = Order::create([
            "user_id"=>$userId,
            "grand_total"=>$total,
            "deposit"=>$deposit,
            "full_name"=>$request->get("full_name"),
            "email"=>$request->get("email"),
            "tel"=>$request->get("tel"),
            "address"=>$request->get("address"),
            "location"=>$request->get("location"),
            "payment_method"=>$request->get("payment_method"),
            "cccd"=>$request->get("cccd"),
            "drive_photo"=>$request->get("drive_photo")
        ]);
        foreach ($cart as $item){
            DB::table("order_products")->insert([
                "order_id"=>$order->id,
                "id"=>$order->id,
                "product_id"=>$item->id,
                "buy_qty"=>$item->buy_qty,
                "price"=>$priceTotal,
                "start_date"=>$item->start_date,
                "end_date"=>$item->end_date,
                "start_time"=>$item->start_time,
                "end_time"=>$item->end_time,
                "stt_remind"=>"0"
            ]);
            $product = Product::find($item->id);
            $product->update(["buy_qty"=>$product->buy_qty- $item->buy_qty]);
        }
        // clear cart
        session()->forget("cart");
        // send email
        Mail::to($request->get("email"))
//            ->cc("mail nhan vien")
//            ->bcc("mail quan ly")
            ->send(new OrderMail($order));

        event(new CreateNewOrder($order));

        // thanh toan paypal
        if($order->payment_method == "Paypal"){
            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => url("paypal-success",['order'=>$order]),
                    "cancel_url" => url("paypal-cancel",['order'=>$order]),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
//                            "value" => number_format($order->grand_total,2,".","")
                            "value" => number_format($order->deposit,2,".","")
                        ]
                    ]
                ]
            ]);


            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->back()
                    ->with('error', 'Something went wrong.');

            } else {
                return redirect()
                    ->back()
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
        return redirect()->to("thank-you/$order->id")->with("order",$order);
    }
    public function thankYou(Order $order){

        return view("user.pages.thankyou",compact("order"));
    }
    public function paypalSuccess(Order $order){
        $order->update([
            "is_paid"=>true,
            "status"=> Order::CONFIRMED
        ]);// cập nhật trạng thái đã trả tiền

        return redirect()->to("thank-you/$order->id");
    }
    public function feedback($order){
        $od = Order::find("$order");
        return view("user.pages.feedback",compact("od"));
    }
    public function placefeedback(Request $request){
       $user_id = $request->get("user_id");
       $product_id = $request->get("product_id");
       $message = $request->get("message");
       $rating = $request->get("rating");
        Feedback::create([
            'user_id'=>$user_id,
            'product_id'=>$product_id,
            'feedback'=>$message,
            'rating'=>$rating
        ]);
        $product = Product::find($product_id);

        if ($product) {
            $productSlug = $product->slug;
            return redirect()->route('product.detail', ['product' => $productSlug]);
        } else {
            // Xử lý khi không tìm thấy sản phẩm
            return redirect()->route('home'); // hoặc bất kỳ trang nào khác
        }
    }
    public function paypalCancel(Order $order){
        return redirect()->to("thank-you/$order->id");
    }

    public function Errors(){
        $errors = Error::all();
        return view("user.pages.errors" ,compact('errors'));
    }
    public function getAvailableProducts()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Truy vấn các đơn hàng của người dùng với thông tin sản phẩm (xe)
            $orders = $user->orders()
                ->whereIn('status', [ Order::COMPLETE])
                ->with('productss')
                ->get();
            $order_dt = $user->orders()
                ->whereNotIn('status', [ Order::COMPLETE,Order::CANCEL])
                ->with('productss')
                ->get();

            return view('user.pages.extend', ['orders' => $orders ,'orders_dt'=> $order_dt]);
        } else {
            return redirect()->route('login');
        }
    }





    public function accountProfile(){
        return view("user.pages.account_profile");
    }


    public function homeAdmin(){
        return view("admin.pages.homeAdmin");

    }




    public function addFavorite(Request $request)
    {

        $productId = $request->input('product_id');
        $user = Auth::user();

// Kiểm tra xem sản phẩm đã được yêu thích bởi người dùng chưa
        $existingFavorite = Favorite::where('user_id', $user->id)
            ->where('product_id', $productId)
            ->first();
        if ($existingFavorite) {
            // Sản phẩm đã tồn tại trong yêu thích
            return redirect()->back()->with('message', 'Failed!')->with('product_id', $productId)->with('status', 'error');
        }

// Thêm sản phẩm vào yêu thích
        $favorite = new Favorite();
        $favorite->user_id = $user->id;
        $favorite->product_id = $productId;
        $favorite->save();

// Lưu thông tin sản phẩm vào session
        $request->session()->flash('message', 'Success!');
        $request->session()->flash('product_id', $productId);
        $request->session()->flash('status', 'success');

        return redirect()->back();
    }

    public function showFavorites()
    {
        $user = Auth::user();

        // Lấy danh sách sản phẩm yêu thích của người dùng
        $favorites = Favorite::where('user_id', $user->id)->get();

        return view("user.pages.favorites", compact('favorites'));
    }


    public function removeFromFavorites($favoriteId)
    {
        $favorite = Favorite::find($favoriteId);


        if ($favorite) {

            $favorite->delete();
        } else {

        }
        return redirect()->back()->with('error', '');
    }


    public function accountFavorites(){
        return view("user.pages.favorites");
    }
    public function cars_list(){

        $products = Product::orderBy("created_at","desc")->paginate(9);
        return view("user.pages.cars_list",compact("products"));
    }
    public function filterProducts(Request $request){
        $products = Product::Search($request)->FilterSeat($request)->FilterColor($request)->PriceMin($request)->PriceMax($request)->orderBy("id","desc")->paginate(20);

        return view("user.pages.cars_list",[
            "products"=>$products
        ]);
    }



    public  function cars( Category $category ){


        $products = Product::where("category_id",$category->id,)
            ->orderBy("created_at","desc")->paginate(14);
        $categoryName = $category->name;
        $id = $category->id;



        return view("user.pages.cars",compact("products","categoryName","category","id"));
    }
    public  function filterProduct(Request $request, Category $category){
        $products = Product::where("category_id",$category->id)->Search($request)->FilterSeat($request)->FilterColor($request)->PriceMin($request)->PriceMax($request)->orderBy("created_at","desc")->paginate(20);
        $categoryName = $category->name;


        return view("user.pages.cars",compact("categoryName","category","products"));
    }
    public function confirmUser($order , Request $request){
        $orders = Order::find("$order");

        $orders->status = '3';
        $orders->save();
        $id = $request->get("user_id");
        if (Auth::check()) {
            $user = Auth::user();

            // Truy vấn các đơn hàng của người dùng với thông tin sản phẩm (xe)
            $orders = $user->orders()
                ->whereIn('status', [ Order::COMPLETE])
                ->with('productss')
                ->get();
            $order_dt = $user->orders()
                ->whereNotIn('status', [ Order::COMPLETE,Order::CANCEL])
                ->with('productss')
                ->get();

            return view('user.pages.extend', ['orders' => $orders ,'orders_dt'=> $order_dt]);
        }}
    public function confirmUserCompleted($order , Request $request){
        $orders = Order::find("$order");

        $orders->status = '7';
        $orders->save();
        $id = $request->get("user_id");
        if (Auth::check()) {
            $user = Auth::user();

            // Truy vấn các đơn hàng của người dùng với thông tin sản phẩm (xe)
            $orders = $user->orders()
                ->whereIn('status', [ Order::COMPLETE])
                ->with('productss')
                ->get();
            $order_dt = $user->orders()
                ->whereNotIn('status', [ Order::COMPLETE,Order::CANCEL])
                ->with('productss')
                ->get();

            return view('user.pages.extend', ['orders' => $orders ,'orders_dt'=> $order_dt]);
        }
    }
    public function detailsBill($order){
        $orders = Order::find($order);
        return view("user.pages.detailsBill",compact("orders"));
    }

    public function cars_list(){

        $products = Product::orderBy("created_at","desc")->paginate(9);
        return view("user.pages.cars_list",compact("products"));
    }
    public function filterProducts(Request $request){
        $products = Product::Search($request)->FilterSeat($request)->FilterColor($request)->PriceMin($request)->PriceMax($request)->orderBy("id","desc")->paginate(20);

        return view("user.pages.cars_list",[
            "products"=>$products
        ]);
    }

    public function addExtend(Product $product, Order $order){

        return view("user.pages.addextend", compact("product", "order"));
    }


    public function update(Request $request, $id)
    {
        // Lấy dữ liệu từ request
        $orderData = $request->only(['grand_total']);
        $orderProductData = $request->only(['buy_qty','start_date', 'end_date', 'start_time', 'end_time']);

        // Tìm kiếm bản ghi theo ID
        $order = Order::findOrFail($id);
        $orderProduct = OrderProduct::where('order_id', $id)->firstOrFail();

        // Cập nhật thông tin
        $order->update($orderData);
        $orderProduct->update($orderProductData);

        // Redirect hoặc trả về thông báo thành công
        return redirect()->back()->with('success', 'Cập nhật thông tin thành công!');
    }
}
