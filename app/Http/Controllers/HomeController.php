<?php

namespace App\Http\Controllers;

use App\Events\CreateNewOrder;
use App\Mail\OrderMail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function category(Category $category){
        $products = Product::where("category_id",$category->id)
            ->orderBy("created_at","desc")->paginate(14);
        return view("user.pages.category",compact("products"));
    }

    public function addToCart(Product $product, Request $request){
        $buy_qty = $request->get("buy_qty");
        $cart = session()->has("cart")?session("cart"):[];
        foreach ($cart as $item){
            if($item->id == $product->id){
                $item->buy_qty = $item->buy_qty + $buy_qty;
                session(["cart"=>$cart]);
                return redirect()->back()->with("success","Your vehicle has just been added to the cart!");
            }
        }
        $product->buy_qty = $buy_qty;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->back()->with("success","Your vehicle has just been added to the cart!");
    }
    public function cart(){
        $cart = session()->has("cart")?session("cart"):[];



        return view("user.pages.cart",compact("cart"));
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


    public function checkout(Request $request, $slug)
    {
//        $product = Product::where('slug', $slug)->firstOrFail();
        // Lấy thông tin sản phẩm từ slug
        $product = Product::where('slug', $slug)->first();

        // Kiểm tra xem sản phẩm có tồn tại hay không
        if (!$product) {
            abort(404);
        }
        $cart = session()->has("cart")?session("cart"):[];

        // Truyền thông tin sản phẩm vào view checkout
        return view("user.pages.checkout", ['product' => $product], compact("cart"));
    }

    public function placeOrder(Request $request){
        $request->validate([
            "full_name"=>"required|min:6",
            "address"=>"required",
            "location"=>"required",
            "tel"=> "required|min:9|max:11",
            "email"=>"required",
            "payment_method"=>"required"
        ],[
            "required"=>"Please enter information!"
        ]);
        // calculate
        $cart = session()->has("cart")?session("cart"):[];
        $subtotal = 0;
        foreach ($cart as $item){
            $subtotal += $item->price * $item->buy_qty;
            $total = $subtotal + $item->deposit;
        }
        $order = Order::create([
            "grand_total"=>$total,
            "full_name"=>$request->get("full_name"),
            "email"=>$request->get("email"),
            "tel"=>$request->get("tel"),
            "address"=>$request->get("address"),
            "location"=>$request->get("location"),
            "payment_method"=>$request->get("payment_method")
        ]);
        foreach ($cart as $item){
            DB::table("order_products")->insert([
                "order_id"=>$order->id,
                "product_id"=>$item->id,
                "buy_qty"=>$item->buy_qty,
//                "start_date"=>$item->start_date,
//                "end_date"=>$item->end_date,
                "price"=>$item->price
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
                            "value" => number_format($order->grand_total,2,".","")
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
    public function paypalCancel(Order $order){
        return redirect()->to("thank-you/$order->id");
    }



}
