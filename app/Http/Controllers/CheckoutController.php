<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;
use App\Cart;
use Session;

class CheckoutController extends Controller
{
    public function checkout() {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        if (!Session::has('cart')) {
            return redirect('/shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $lineItems = [];
        foreach ($cart->items as $comic) {
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'eur',
                    'product_data' => [
                        'name' => $comic['item']['title'],
                    ],
                    'unit_amount_decimal' => $comic['price'] / $comic['qty'] * 100,
                ],
                'quantity' => $comic['qty'],
            ];
        }

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('success', [], true).'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('failure', [], true),
        ]);


        return redirect($session->url);
    }

    public function success(Request $request) {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        try{
            $session = \Stripe\Checkout\Session::retrieve($request->get('session_id'));
            if(!$session) {
                return view('pages.failure');
            }
            Order::where('session_id', Session::getId())->update(['order_status' => 'paid']);
            Session::forget('cart');
            return view('pages.success');
        } catch(\Exception $e) {
            return view('pages.failure');
        }

    }

    public function failure() {
        Order::where('session_id', Session::getId())->delete();
        Session::forget('cart');
        return view('pages.failure');
    }
}
