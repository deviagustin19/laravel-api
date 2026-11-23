<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductWebController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('produk.index', compact('products'));
    }

    // Menampilkan form tambah produk
    public function create()
    {
        $categories = Category::all();

        return view('produk.create', compact('categories'));
    }

    // Menyimpan produk baru
  public function store(StoreProductRequest $request)
{
    $data = $request->validated();

    // Mengambil nama kategori berdasarkan category_id
    $data['kategori'] = Category::findOrFail(
        $data['category_id']
    )->nama;

    Product::create($data);

    return redirect('/produk')
        ->with('success', 'Produk berhasil ditambahkan.');
}

    // Menampilkan form edit produk
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('produk.edit', compact('product', 'categories'));
    }

    // Memperbarui produk
      public function update(UpdateProductRequest $request, $id)
{
    $product = Product::findOrFail($id);

    $data = $request->validated();

    // Memperbarui nama kategori
    $data['kategori'] = Category::findOrFail(
        $data['category_id']
    )->nama;

    $product->update($data);

    return redirect('/produk')
        ->with('success', 'Produk berhasil diperbarui.');
}
    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/produk')
            ->with('success', 'Produk berhasil dihapus.');
    }
}
