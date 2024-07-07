@extends('layouts.app')

@section('content')
<h1>Detail Order</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Order ID: {{ $order->id }}</h5>
        <p class="card-text">Nama Customer: {{ $order->customer->nama_customers }}</p>
        <p class="card-text">Nama Produk: {{ $order->product->nama_products }}</p>
        <p class="card-text">Jumlah Produk: {{ $order->jumlah_products }}</p>
        <p class="card-text">Total Pembayaran: Rp{{ number_format($order->jumlah_pembayaran, 2) }}</p>
    </div>
</div>

<!-- Tombol Kembali -->
<a href="{{ route('orders.index') }}" class="btn btn-secondary">Kembali ke Daftar Orders</a>

@endsection
