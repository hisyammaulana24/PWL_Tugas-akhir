<!-- resources/views/customers/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Daftar Customers</h1>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Tambah Customer Baru</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No HP</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->nama_customers }}</td>
                    <td>{{ $customer->alamat_customers }}</td>
                    <td>{{ $customer->nohp_customers }}</td>
                    <td>{{ $customer->email_customers }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
