<!-- resources/views/customers/create.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Tambah Customer Baru</h1>
    
    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control @error('nama_customers') is-invalid @enderror" id="nama" name="nama_customers" value="{{ old('nama_customers') }}" required>
            @error('nama_customers')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control @error('alamat_customers') is-invalid @enderror" id="alamat" name="alamat_customers" value="{{ old('alamat_customers') }}" required>
            @error('alamat_customers')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nohp">No HP</label>
            <input type="text" class="form-control @error('nohp_customers') is-invalid @enderror" id="nohp" name="nohp_customers" value="{{ old('nohp_customers') }}" required>
            @error('nohp_customers')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email_customers') is-invalid @enderror" id="email" name="email_customers" value="{{ old('email_customers') }}" required>
            @error('email_customers')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
