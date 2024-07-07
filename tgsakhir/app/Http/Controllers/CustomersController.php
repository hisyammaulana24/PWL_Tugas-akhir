<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_customers' => 'required|string|max:255',
            'alamat_customers' => 'required|string|max:255',
            'nohp_customers' => 'required|numeric',
            'email_customers' => 'required|email|unique:customers,email_customers',
        ], [
            'nama_customers.required' => 'Nama customer harus diisi.',
            'alamat_customers.required' => 'Alamat customer harus diisi.',
            'nohp_customers.required' => 'Nomor HP customer harus diisi.',
            'nohp_customers.numeric' => 'Nomor HP harus berupa angka.',
            'email_customers.required' => 'Email customer harus diisi.',
            'email_customers.email' => 'Format email tidak valid.',
            'email_customers.unique' => 'Email sudah digunakan.',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil ditambahkan.');
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_customers' => 'required|string|max:255',
            'alamat_customers' => 'required|string|max:255',
            'nohp_customers' => 'required|numeric',
            'email_customers' => 'required|email|unique:customers,email_customers,' . $id,
        ], [
            'nama_customers.required' => 'Nama customer harus diisi.',
            'alamat_customers.required' => 'Alamat customer harus diisi.',
            'nohp_customers.required' => 'Nomor HP customer harus diisi.',
            'nohp_customers.numeric' => 'Nomor HP harus berupa angka.',
            'email_customers.required' => 'Email customer harus diisi.',
            'email_customers.email' => 'Format email tidak valid.',
            'email_customers.unique' => 'Email sudah digunakan.',
        ]);

        $customers = Customer::findOrFail($id);
        $customers->update($request->all());

        return redirect()->route('customers.index')
            ->with('success', 'Customer berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer berhasil dihapus.');
    }
}
