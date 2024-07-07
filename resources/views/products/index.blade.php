@extends('layouts.app')

@section('content')
<h1>Daftar Produk</h1>
<a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Tambah Produk Baru</a>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->nama_products }}</td>
            <td>{{ $product->deskripsi_products }}</td>
            <td>{{ $product->harga_products }}</td>
            <td>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">Lihat</a>
                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
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
