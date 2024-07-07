@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Produk</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('products.create') }}" class="btn btn-primary">+ Produk</a>
    </div>

    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                @if ($product->gambar_products)
                    <img src="{{ asset('storage/' . $product->gambar_products) }}" class="card-img-top" alt="Gambar Produk" style="height: 100px; object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Tidak ada gambar" style="height: 100px; object-fit: cover;">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nama_products }}</h5>
                    <p class="card-text">{{ Str::limit($product->deskripsi_products, 100) }}</p>
                    <p class="card-text"><strong>{{ 'Rp ' . number_format($product->harga_products, 2, ',', '.') }}</strong></p>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Aksi Produk">
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Ditail</a>
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
