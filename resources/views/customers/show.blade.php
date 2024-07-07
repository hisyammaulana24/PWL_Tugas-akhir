<!-- resources/views/customers/show.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Detail Customer</h1>
    
    <div>
        <p><strong>Nama:</strong> {{ $customer->nama_customers }}</p>
        <p><strong>Alamat:</strong> {{ $customer->alamat_customers }}</p>
        <p><strong>No HP:</strong> {{ $customer->nohp_customers }}</p>
        <p><strong>Email:</strong> {{ $customer->email_customers }}</p>
    </div>
    
    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
