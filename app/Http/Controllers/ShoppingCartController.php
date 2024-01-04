<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Closure;
use Stripe\Stripe;


class ShoppingCartController extends Controller
{
    public function getAddToCart(Request $request, $id){
        $comic = Comic::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($comic, $comic->id);

        $request->session()->put('cart', $cart);
        return back();

    }
    public function getReduceByOne($id)  {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect('/shopping-cart');
    }
    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect('/shopping-cart');
    }
    public function getCart(){
        if (!Session::has('cart')) {
            return view('pages.cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('pages.cart', ['comics' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function storeOrder(Request $request) {

        if (!Session::has('cart')) {
            return view('/');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $session = Session::getId();

        $this->validate(request(), [
            'ship_name' => 'required|string',
            'ship_surname' => 'required|string',
            'ship_address' => 'required|string',
            'post_code' => 'required|integer',
            'email' => 'required|string|email|regex:/^([a-z0-9+-]+)(.[a-z0-9+-]+)*@([a-z0-9-]+.)+[a-z]{2,6}$/ix'
        ]);

        $orderData = [
            'user_id' => Auth::check() ? Auth::id() : 0,
            'ship_name' => request('ship_name'),
            'ship_surname' => request('ship_surname'),
            'ship_address' => request('ship_address'),
            'email' => request('email'),
            'post_code' => request('post_code'),
            'total_price' => $total,
            'order_status' => 'pending',
            'session_id' => $session
        ];
        Order::create($orderData);


        return redirect('/checkout');
    }
}
