@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Produk</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->nama_products }}</h5>
            <p class="card-text">{{ $product->deskripsi_products }}</p>
            <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($product->harga_products, 2, ',', '.') }}</p>
            <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali ke Daftar Produk</a>
        </div>
    </div>
</div>
@endsection
