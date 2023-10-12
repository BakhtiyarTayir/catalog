<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|min:1'
        ]);

        $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

        $cartItem = $cart->items()->firstOrCreate(['product_id' => $request->product_id], ['quantity' => 0]);

        $cartItem->increment('quantity', $request->quantity);

        return response()->json(
            ['message' => 'Product added to cart'],
            $cartItem,
            );
    }


    public function updateCartItem(Request $request, $itemId)
    {
        $request->validate([
            'quantity' => 'required|min:1'
        ]);

        $cartItem = CartItem::findOrFail($itemId);

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json(['message' => 'Quantity updated']);
    }

    public function removeCartItem($itemId)
    {
        $cartItem = CartItem::findOrFail($itemId);

        $cartItem->delete();

        return response()->json(['message' => 'Item removed from cart']);
    }

    public function getCartItems() {
        $userId = auth()->id();
    
        // Находим или создаем корзину для пользователя
        $cart = Cart::firstOrCreate([
            'user_id' => $userId,
        ]);
    
        $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();
    
        return response()->json(['cartItems' => $cartItems]);
    }
    

}
