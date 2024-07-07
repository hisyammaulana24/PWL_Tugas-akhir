@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Produk</label>
            <input type="text" class="form-control" id="nama" name="nama_products" required>
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi Produk</label>
            <textarea class="form-control" id="deskripsi" name="deskripsi_products" required></textarea>
        </div>
        <div class="form-group">
            <label for="harga">Harga Produk</label>
            <input type="number" class="form-control" id="harga" name="harga_products" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar Produk</label>
            <input type="file" class="form-control-file" id="gambar" name="gambar_products">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
