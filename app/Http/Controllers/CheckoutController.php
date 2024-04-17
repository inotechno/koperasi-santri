<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\DeliveryDetail;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentDetail;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\VouchersUsers;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Royryando\Duitku\Facades\Duitku;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // dd($subdistrict);
        // dd($request);
        if (!$request->cart_id) {
            return redirect()->route('cart.view')->with('error', 'Silahkan pilih produk terlebih dahulu !');
        }

        $voucher = Voucher::where('code', $request->voucher_code)->first();
        $address = UserAddress::where('user_id', auth()->user()->id)->with('subdistrict')->get();

        $cart = Cart::where('user_id', Auth::id())->where('checkout_at', NULL)->whereIn('id', $request->cart_id)->get();

        // dd($cart);
        if ($cart->count() == 0) {
            return redirect()->route('cart.view')->with('error', 'Silahkan pilih produk terlebih dahulu !');
        }

        foreach ($cart as $key => $crt) {

            $crt->quantity = $request->quantity[$key];
            $crt->save();
        }

        $cart = $cart->map(function ($_cart) {
            $_cart->subdistrict = $_cart->product->store->user->useraddress->where('store_address', "on")->map(function ($add) {
                return $add;
            });

            $_cart->user = $_cart->product->store->user->useraddress->where('store_address', "on")->map(function ($add) {
                $user = $add->user_id;
                return $user;
            });

            // if (count(array_flip($add->user_id)) !== 1) {
            //     return redirect()->back()->with('error', 'Tidak checkout pada dua toko sekaligus !');
            // }

            return $_cart;
        });

        // dd(count(array_flip($users)));
        // if (count(array_flip($users)) !== 1) {
        //     return redirect()->route('cart.view')->with('error', 'Tidak bisa checkout pada dua toko atau lebih !');
        // }
        $users = [];

        foreach ($cart as $key => $crt) {
            $user = array_push($users, $crt->user[0]);
            // if ($user != $crt->user[0]) {
            //     redirect()->back()->with('error', 'Tidak bisa checkout pada dua toko atau lebih !');
            // }

            // $crt->quantity = $request->quantity[$key];
            // $crt->save();
        }

        // dd($cart);
        // dd(count(array_flip($users)));

        if (count(array_flip($users)) !== 1) {
            return redirect()->route('cart.view')->with('error', 'Tidak bisa checkout pada dua toko atau lebih !');
        }

        // $payment = PaymentMethod::where('status', 1)->get();

        return view('checkout.index', [
            'title' => 'Checkout',
            'address' => $address,
            'cart' => $cart,
            'voucher' => $voucher
        ]);
    }

    public function method(Request $request)
    {
        // dd(intval($request->nominal));
        try {
            $duitku = Duitku::paymentMethods(intval($request->nominal));
            return response()->json($duitku);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    public function process(Request $request)
    {
        // dd($request);
        $order_id = date('YmdHis');
        $id = auth()->user()->id;
        $name = auth()->user()->name;
        $email = auth()->user()->email;
        $ongkir = $request->ongkir;
        $ppn = intval($request->ppn);
        $disc = intval($request->disc);
        $fee = $request->fee;
        $grand_total = intval($request->grand_total);
        $payment_method = $request->payment_method;
        $payment_name = $request->payment_name;
        $address_from = $request->address_from;
        $address_to = $request->address_to;
        $expedition = $request->expedition;
        $expedition_service = $request->expedition_service;
        $total_weight = $request->total_weight;
        $product_name = implode('|', $request->product_name);

        $store = UserAddress::with('user')->with('user.store')->where('id', $address_from)->first();
        // dd($store->user->store->id);
        $cart = Cart::with('product')->whereIn('id', $request->cart_id)->get();

        try {
            $duitku = Duitku::createInvoice($order_id, (intval($grand_total) - $fee), $payment_method, $product_name, $name, $email, 120);

            $reference = $duitku['reference'];
            $va_number = $duitku['va_number'];
            $payment_url = $duitku['payment_url'];

            // dd($duitku['reference']);
            $data['deliveryDetail'] = DeliveryDetail::create([
                'address_to' => $address_to,
                'address_from' => $address_from,
                'expedition' => $expedition,
                'expedition_service' => $expedition_service,
                'total_weight' => $total_weight,
                'shipping_cost' => $ongkir
            ]);

            $data['paymentDetail'] = PaymentDetail::create([
                'payment_code' => $payment_method,
                'payment_name' => $payment_name,
                'va_number'     => $va_number,
                'payment_url'   => $payment_url,
                'fee'           => $fee,
                'status_code'   => 201,
                'expiration_date'   => Carbon::now()->addMinutes(120)
            ]);

            // dd(DB::getQueryLog());
            $data['order'] = Order::create([
                'order_number' => $order_id,
                'reference_number' => $reference,
                'store_id'       => $store->user->store->id,
                'user_id'       => $id,
                'ppn'           => $ppn,
                'disc'           => $disc,
                'grand_total'   => $grand_total,
                'voucher_id'    => $request->voucher,
                'payment_detail_id' => $data['paymentDetail']->id,
                'delivery_detail_id'    => $data['deliveryDetail']->id,
            ]);

            if ($request->voucher) {
                VouchersUsers::create([
                    'user_id' => $id,
                    'voucher_id' => $request->voucher
                ]);
            }

            // dd($data['order']);
            foreach ($cart as $crt) {
                $crt->checkout_at = date('Y-m-d H:i:s');
                $crt->save();

                $crt->product->update(['stock' => $crt->product->stock - $crt->quantity]);

                $data['orderItem'][] = OrderItem::create([
                    'order_id' => $data['order']->id,
                    'price' => $crt->product->price,
                    'product_id' => $crt->product_id,
                    'quantity' => $crt->quantity
                ]);
            }

            $data['response'] = 200;
            // dd($data);
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
        // dd($cart);
    }
}
