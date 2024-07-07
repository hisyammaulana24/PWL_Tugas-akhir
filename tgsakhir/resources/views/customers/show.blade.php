@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Detail Customer</h1>
        </div>

        <div class="card-body">
            <div class="mb-3">
                <strong>Nama:</strong> {{ $customer->nama_customers }}
            </div>
            <div class="mb-3">
                <strong>Alamat:</strong> {{ $customer->alamat_customers }}
            </div>
            <div class="mb-3">
                <strong>No HP:</strong> {{ $customer->nohp_customers }}
            </div>
            <div class="mb-3">
                <strong>Email:</strong> {{ $customer->email_customers }}
            </div>

            <a href="{{ route('customers.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
