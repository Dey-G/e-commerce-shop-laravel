<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function create()
    {
        $user = Auth::user();
        $cartItems = $user->products()->withPivot('quantity')->get();

        if ($cartItems->count() == 0) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        return view('checkout.create', compact('cartItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:30',
            'address' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $user = Auth::user();
        $cartItems = $user->products()->withPivot('quantity')->get();

        foreach ($cartItems as $item) {
            Order::create([
                'user_id' => $user->id,
                'product_id' => $item->id,
                'customer_name' => $request->customer_name,
                'contact_number' => $request->contact_number,
                'address' => $request->address,
                'notes' => $request->notes,
                'product_name' => $item->Name,
                'quantity' => $item->pivot->quantity,
                'price' => $item->Price,
                'total_price' => $item->Price * $item->pivot->quantity,
                'status' => 'Pending',
            ]);
        }

        $user->products()->detach();

        return redirect()->route('cart.index')->with('success', 'Order placed successfully.');
    }
}