<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::paginate();

        return $orders;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Order::create([
            'user_id' => \Auth::id(),
            'store_id' => $request->store_id,
            'address_id' => $request->address_id,
            'order_status' => Order::DEFAULT_STATUS,
            'payment_status' => $request->payment_status,
            'delivery_type' => $request->delivery_type,
            'time_delivery' => $request->time_delivery,
            'current_location' => $request->current_location,
        ]);

        //return $msg = "order has been created successfully"
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //return $order;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->update([
            'user_id' => \Auth::id(),
            'store_id' => $request->store_id,
            'address_id' => $request->address_id,
            'order_status' => $request->order_status,
            'payment_status' => $request->payment_status,
            'delivery_type' => $request->delivery_type,
            'time_delivery' => $request->time_delivery,
            'current_location' => $request->current_location,
        ]);
        //return $msg = "order has been updated successfully"
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        //return $msg = "order has been deleted successfully"
    }
}
