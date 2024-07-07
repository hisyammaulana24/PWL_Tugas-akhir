@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="card-title mb-4">Edit Produk</h1>

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" class="form-control" id="nama" name="nama_products" value="{{ $product->nama_products }}" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi Produk</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi_products" rows="4" required>{{ $product->deskripsi_products }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Produk</label>
                            <input type="number" class="form-control" id="harga" name="harga_products" value="{{ $product->harga_products }}" required>
                        </div>
                        <div class="form-group">
                            <label for="gambar">Gambar Produk</label><br>
                            @if ($product->gambar_products)
                            <img src="{{ asset('storage/' . $product->gambar_products) }}" class="img-fluid mb-3" alt="Gambar Produk" style="max-width: 300px;">
                            @endif
                            <input type="file" class="form-control-file" id="gambar" name="gambar_products">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
