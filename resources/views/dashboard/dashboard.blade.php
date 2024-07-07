@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>

    <!-- Tampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tombol Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <p>Total Orders: {{ $orders->count() }}</p>
                    <a href="{{ route('orders.index') }}" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <p>Total Customers: {{ $customers->count() }}</p>
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">View Customers</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <p>Total Products: {{ $products->count() }}</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
