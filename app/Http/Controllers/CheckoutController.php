<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Cart\CartRepository;

class CheckoutController extends Controller
{
    public function index(CartRepository $cart)
    {
        if ($cart->all()->count() == 0) {
            return redirect()->route('home');
        }
        $user = Auth::check()? Auth::user() : new User();

        return view('store.checkout', compact('cart', 'user'));
    }

    public function store(Request $request, CartRepository $cart)
    {
        $request->validate([
            'shipping.first_name' => ['required'],
            'shipping.last_name' => ['required'],
            'shipping.street' => ['required'],
            'shipping.city' => ['required'],
            'shipping.country_code' => ['required'],
        ]);

        DB::beginTransaction();
        try {
            // 1: Create Order and Items
            $order = $this->storeOrder($request, $cart);
            // 2: Add Order Addresses
            $this->storeAddresses($order, $request);
            // 3: Empty Cart
            $cart->empty();
            // 4: Commit
            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            throw $e;
        }

        // event('order.created', [$cart, Auth::user()]);
        event( new OrderCreated($order) );

        return redirect()->route('payments.create', $order->id);
    }
}
