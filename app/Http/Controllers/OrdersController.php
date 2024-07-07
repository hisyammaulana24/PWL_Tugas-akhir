<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Customer;
use App\Models\Product;

class OrdersController extends Controller
{
    public function index()
    {
        $orders = Orders::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.create', compact('customers', 'products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'jumlah_products' => 'required|integer',
            'jumlah_pembayaran' => 'required|integer',
        ]);

        $orders = Orders::create([
            'customer_id' => $request->customer_id,
            'product_id' => $request->product_id,
            'jumlah_products' => $request->jumlah_products,
            'jumlah_pembayaran' => $request->jumlah_pembayaran,
        ]);
        return redirect()->route('orders.index')->with('success', 'Order berhasil ditambahkan.');
    }

    public function show(Orders $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Orders $order)  // Pastikan menggunakan 'Orders' bukan 'Order'
    {
        $customers = Customer::all();
        $products = Product::all();
        return view('orders.edit', compact('order', 'customers', 'products'));
    }

    public function update(Request $request, Orders $order)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'jumlah_products' => 'required|integer',
            'jumlah_pembayaran' => 'required|integer',
        ]);

        $order->update($request->all());
        return redirect()->route('orders.index')->with('success', 'Order berhasil diperbarui.');
    }

    public function destroy(Orders $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order berhasil dihapus.');
    }

}
