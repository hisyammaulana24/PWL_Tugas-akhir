@extends('layouts.app')

@section('content')
<h1>Daftar Orders</h1>
<a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Tambah Order Baru</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Customer</th>
            <th>Nama Product</th>
            <th>Harga Produk</th>
            <th>Jumlah Produk</th>
            <th>Jumlah Pembayaran</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer->nama_customers }}</td>
            <td>{{ $order->product->nama_products }}</td>
            <td>{{ $order->product->harga_products }}</td>
            <td>{{ $order->jumlah_products }}</td>
            <td>{{ $order->jumlah_pembayaran }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
