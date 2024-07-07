<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
            'gambar_products' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('gambar_products')) {
            $path = $request->file('gambar_products')->store('product_images', 'public');
            $data['gambar_products'] = $path;
        }

        Product::create($data);

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
            'gambar_products' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }

        $data = $request->all();

        if ($request->hasFile('gambar_products')) {
            // Hapus gambar lama jika ada
            if ($product->gambar_products && Storage::disk('public')->exists($product->gambar_products)) {
                Storage::disk('public')->delete($product->gambar_products);
            }

            // Simpan gambar baru
            $path = $request->file('gambar_products')->store('product_images', 'public');
            $data['gambar_products'] = $path;
        }

        $product->update($data);

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

        // Hapus gambar terkait jika ada
        if ($product->gambar_products && Storage::disk('public')->exists($product->gambar_products)) {
            Storage::disk('public')->delete($product->gambar_products);
        }

        // Hapus semua order yang terkait dengan produk ini
        $product->orders()->delete();

        // Kemudian hapus produknya
        $product->delete();

        // Redirect ke halaman index produk
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }

    /**
     * Menampilkan form untuk menambah produk baru.
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Menampilkan form untuk mengedit produk berdasarkan ID.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Produk tidak ditemukan');
        }
        return view('products.edit', compact('product'));
    }
}
