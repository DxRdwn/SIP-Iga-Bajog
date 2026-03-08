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
                'no_hp' => $request->no_hp,

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

            // ubah status
            $order->status = 'selesai';
            $order->save();

            // ambil nomor hp dari database
            $no_hp = $order->no_hp;

            // format nomor (hapus 0 depan -> jadi 62)
            $no_hp = preg_replace('/^0/', '62', $no_hp);

            // pesan whatsapp
            $pesan = urlencode("Halo {$order->nama}, pesanan Anda sudah selesai dan siap diambil. Terima kasih telah memesan Iga Bajog.");

            // redirect ke whatsapp
            return redirect("https://wa.me/".$no_hp."?text=".$pesan);
        }
}