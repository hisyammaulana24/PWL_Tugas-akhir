@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Orders</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('orders.create') }}" class="btn btn-primary">Tambah Order Baru</a>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
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
                                <td>{{ 'Rp ' . number_format($order->product->harga_products, 2, ',', '.') }}</td>
                                <td>{{ $order->jumlah_products }}</td>
                                <td>{{ 'Rp ' . number_format($order->jumlah_pembayaran, 2, ',', '.') }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('orders.show', $order->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
