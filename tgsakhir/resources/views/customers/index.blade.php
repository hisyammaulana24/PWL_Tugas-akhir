@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Daftar Customers</h1>
    <div class="d-flex justify-content-between mb-4">
        <a href="{{ route('customers.create') }}" class="btn btn-primary">Tambah Customer Baru</a>
    </div>

    <div class="row">
        <div class="col-md-10">
            <div class="card shadow-sm">
                <div class="card-body">
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
                                    <div class="btn-group" role="group" aria-label="Actions">
                                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
