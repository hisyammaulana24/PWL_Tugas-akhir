@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->nama_products }}</h2>
                    <p class="card-text">{{ $product->deskripsi_products }}</p>
                    @if ($product->gambar_products)
                    <img src="{{ asset('storage/' . $product->gambar_products) }}" class="img-fluid mb-3" alt="Gambar Produk">
                    @endif
                    <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($product->harga_products, 2, ',', '.') }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
