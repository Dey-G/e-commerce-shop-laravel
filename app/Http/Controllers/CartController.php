<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;


class CartController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $usertype = Auth::user()->usertype;
            if ($usertype == 'user') {
                $user = Auth::user();
                $cartItems = $user->products()->withPivot('quantity')->get();
                return view('cart.index', compact('cartItems'));
            } else {
                return redirect()->route('home.index');
            }
        }
    }

    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $request->validate([
            'quantity' => 'required|integer|max:' . $product->Quantity,
        ]);

        $existingCartItem = Auth::user()->products()->where('product_id', $request->product_id)->first();

        if ($existingCartItem) {
            $existingCartItem->quantity = $request->quantity;
            $existingCartItem->save();
        } else {
            Auth::user()->Products()->attach($request->product_id, ['quantity' => $request->quantity]);
        }

        return redirect()->route('products.show', $request->product_id)->with('success', 'Product added to cart successfully.');
    }


    public function destroy(Request $request)
    {
        $user = Auth::user();
        $user->products()->detach($request->product_id);

        return redirect()->route('cart.index');
    }
    
    public function checkout()
{
    $user = Auth::user();

    $cartItems = $user->products()->withPivot('quantity')->get();

    if ($cartItems->count() == 0) {
        return redirect()->back()->with('error', 'Cart is empty.');
    }

    foreach ($cartItems as $item) {

        $quantity = $item->pivot->quantity;
        $price = $item->Price;
        $total = $price * $quantity;

        Order::create([
            'user_id' => $user->id,
            'product_id' => $item->id,
            'customer_name' => $user->name,
            'product_name' => $item->Name,
            'quantity' => $quantity,
            'price' => $price,
            'total_price' => $total,
            'status' => 'Pending'
        ]);
    }

    $user->products()->detach();

    return redirect()->route('cart.index')
        ->with('success', 'Order placed successfully.');
}
}
