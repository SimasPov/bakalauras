<?php

namespace App\Http\Controllers;

use App\Comic;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;
use Closure;

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
}
