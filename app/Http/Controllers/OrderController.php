<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */


        public function index()
    {
        //
        $user = Auth::user();
        $orders = Order::with('products')->where('user_id', $user->id)->get();
        return view('order.index', compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = product::all();
        return view('order.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $productIds = $request->input('products');
        $products = product::whereIn('id', $productIds)->get();

        $totalPrice = $products->sum('product_price');

        $order = new order();
        $order->price = $totalPrice;
        $order->user_id = Auth::id();
        $order->save();

        $order->products()->attach($productIds);

        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $order=order::find($id);
        $order->update($request->all());
        return redirect()->route('order.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        //
        $order = order::find($id);
        return view('order.update', compact('order'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function  destroy($id)
    {
        //
        order::where('id',$id)->delete();
        return redirect()->route('order.index');
    }
}
