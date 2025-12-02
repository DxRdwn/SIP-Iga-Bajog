<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->latest()->get();
        return view('admin.order', compact('orders'));
    }

    public function store(Request $request)
    {
        
            $order = Order::create([
                'customer_name' => $request->customer_name,
                'table_number' => $request->table_number,
                'note' => $request->note,
                'total_price' => $request->total_price,
                'status' => 'pending', // optional
            ]);

            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    
                    'quantity' => $item['qty'],
                    'price' => $item['price']
                ]);
            }
            // Tambahkan notifikasi sukses ke session
            session()->flash('success', 'Pesanan berhasil dibuat!');

            return response()->json([
                'success' => true,
                'order_id' => $order->id
            ]);

        }

    public function updateStatus($id)
    {
        $order = Order::findOrFail($id);
        $order->status = 'selesai';
        $order->save();

        return back()->with('success', 'Pesanan selesai diproses.');
    }
}