@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Tambah Order Baru</h1>
        </div>

        <div class="card-body">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="customer">Customer</label>
                    <select class="form-control" id="customer" name="customer_id" required>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->nama_customers }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="product">Product</label>
                    <select class="form-control" id="product" name="product_id" required>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->nama_products }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah Produk</label>
                    <input type="number" class="form-control" id="jumlah" name="jumlah_products" required>
                </div>

                <div class="form-group">
                    <label for="pembayaran">Jumlah Pembayaran</label>
                    <input type="number" class="form-control" id="pembayaran" name="jumlah_pembayaran" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
