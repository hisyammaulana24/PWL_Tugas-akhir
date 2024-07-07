@extends('layouts.app')

@section('content')
<h1>Edit Order</h1>

<form action="{{ route('orders.update', $order->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="customer">Customer</label>
        <select class="form-control" id="customer" name="customer_id" required>
            @foreach ($customers as $customer)
                <option value="{{ $customer->id }}" {{ $order->customer_id == $customer->id ? 'selected' : '' }}>{{ $customer->nama_customers }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="product">Product</label>
        <select class="form-control" id="product" name="product_id" required>
            @foreach ($products as $product)
                <option value="{{ $product->id }}" {{ $order->product_id == $product->id ? 'selected' : '' }}>{{ $product->nama_products }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah Produk</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah_products" required value="{{ $order->jumlah_products }}">
    </div>
    <div class="form-group">
        <label for="pembayaran">Jumlah Pembayaran</label>
        <input type="number" class="form-control" id="pembayaran" name="jumlah_pembayaran" required value="{{ $order->jumlah_pembayaran }}">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
