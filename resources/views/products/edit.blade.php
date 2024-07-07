@extends('layouts.app')

@section('content')
<h1>Edit Produk</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="nama">Nama Produk</label>
        <input type="text" class="form-control" id="nama" name="nama_products" value="{{ $product->nama_products }}" required>
    </div>
    <div class="form-group">
        <label for="deskripsi">Deskripsi Produk</label>
        <textarea class="form-control" id="deskripsi" name="deskripsi_products" required>{{ $product->deskripsi_products }}</textarea>
    </div>
    <div class="form-group">
        <label for="harga">Harga Produk</label>
        <input type="number" class="form-control" id="harga" name="harga_products" value="{{ $product->harga_products }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
@endsection
