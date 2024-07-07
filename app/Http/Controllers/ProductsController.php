<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Menampilkan daftar semua produk.
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Menyimpan produk baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_products' => 'required|string|max:255',
            'deskripsi_products' => 'required|string',
            'harga_products' => 'required|integer',
        ]);

        $product = Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan.');
    }

    /**
     * Menampilkan produk berdasarkan ID.
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('products.show', compact('product'));
    }

    /**
     * Memperbarui produk yang ada berdasarkan ID.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_products' => 'required|string|max:255',
            'deskripsi_products' => 'required|string',
            'harga_products' => 'required|integer',
        ]);

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }

        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Menghapus produk dari database berdasarkan ID.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Hapus semua order yang terkait dengan produk ini
        $product->orders()->delete();

        // Kemudian hapus produknya
        $product->delete();

        // Redirect ke halaman index produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }

    public function create()
    {
        return view('products.create');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('products.edit', compact('product'));
    }
}
