<!-- resources/views/customers/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>
    
    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama_customers" value="{{ $customer->nama_customers }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat_customers" value="{{ $customer->alamat_customers }}" required>
        </div>
        <div class="form-group">
            <label for="nohp">No HP</label>
            <input type="text" class="form-control" id="nohp" name="nohp_customers" value="{{ $customer->nohp_customers }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email_customers" value="{{ $customer->email_customers }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
