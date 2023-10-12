<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function placeOrder(Request $request) {

        $client_id = auth()->check() ? auth()->id() : $request->header('Client-Id');

        $cart = Cart::where('client_id', $client_id)->firstOrFail();
    
        
        $rules = [
            'email' => 'required|email',
            'phone' => 'required',
        ];

        if (auth()->check()) {
            $rules = [];  // для авторизованных пользователей email и phone подтягиваются из профиля
        }

        $validated = $request->validate($rules);

        $order = new Order();
        if(auth()->check()) {
            $order->user_id = auth()->id();
            $order->email = auth()->user()->email;
            $order->phone = auth()->user()->phone;
        } else {
            $order->email = $request->email;
            $order->phone = $request->phone;
        }
    
        $order->save();

        foreach($cart->items as $item) {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->product_id;
            $orderItem->quantity = $item->quantity;
            $orderItem->order_id = $order->id;
            $orderItem->save();
        }
    
        $cart->items()->delete();
    
        return response()->json(['message' => 'Заказ успешно оформлен']);
    }
    
    

    public function getOrders() {
        if(auth()->check()) {
            $orders = Order::where('user_id', auth()->id())->get();
            return response()->json($orders);
        } else {
            return response()->json(['message' => 'Unauthorized'], 401);
        }
    }
    
}
