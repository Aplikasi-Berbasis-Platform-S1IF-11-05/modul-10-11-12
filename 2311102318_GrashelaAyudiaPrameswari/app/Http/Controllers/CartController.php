<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('cart', compact('cart', 'total'));
    }

    public function add(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        $quantity = $request->input('quantity', 1);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => $quantity,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request, $id)
    {
        if ($id && $request->quantity) {
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                $cart[$id]["quantity"] = max(1, $request->quantity);
                session()->put('cart', $cart);
                session()->flash('success', 'Cart updated successfully');
            }
        }
        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')->with('success', 'Product removed successfully');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = 0;
        $message = "Hello Ngawi Food Fest! I would like to order:%0A%0A";

        foreach ($cart as $id => $item) {
            $subtotal = $item['price'] * $item['quantity'];
            $total += $subtotal;
            $message .= "- " . $item['name'] . " (" . $item['quantity'] . "x) - Rp " . number_format($subtotal, 0, ',', '.') . "%0A";
        }

        $message .= "%0A*Total: Rp " . number_format($total, 0, ',', '.') . "*%0A%0A";
        $message .= "Please process my order. Thank you!";

        // Replace with your actual WhatsApp Number
        $waNumber = "6281234567890"; 
        
        $waLink = "https://wa.me/" . $waNumber . "?text=" . $message;

        // Clear cart after checkout preparation (optional, maybe clearer upon confirmation, but since we redirect, we can clear it)
        session()->forget('cart');

        return redirect()->away($waLink);
    }
}
