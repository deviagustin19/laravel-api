<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    // Menampilkan produk, pencarian, filter stok, dan pagination
    public function index(Request $request)
    {
        // Mengatur jumlah data per halaman
        $perPage = min(
            max((int) $request->query('per_page', 10), 1),
            50
        );

        // Pencarian produk
        $search = $request->query('search');
        $products = Product::query()
        
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })

            // Filter hanya produk dengan stok lebih dari 0
            ->when($request->query('tersedia') == 1, function ($query) {
                $query->where('stok', '>', 0);
            })

            ->latest()
            ->paginate($perPage);

        return ProductResource::collection($products)
            ->additional([
                'success' => true,
                'message' => 'Data produk berhasil ditampilkan'
            ]);
    }

    // Menampilkan ringkasan data produk
    public function summary()
    {
        $summary = Product::selectRaw('
            COUNT(*) as total_produk,
            COALESCE(SUM(stok), 0) as total_stok,
            COALESCE(AVG(harga), 0) as rata_rata_harga
        ')->first();

        return response()->json([
            'success' => true,
            'message' => 'Ringkasan produk berhasil ditampilkan',
            'data' => $summary
        ]);
    }

    // Menambahkan produk
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:255',
            'stok' => 'nullable|integer|min:0'
        ]);

        $product = Product::create($validated);

        return (new ProductResource($product))
            ->additional([
                'success' => true,
                'message' => 'Produk berhasil ditambahkan'
            ])
            ->response()
            ->setStatusCode(201);
    }

    // Menampilkan detail produk
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return (new ProductResource($product))
            ->additional([
                'success' => true,
                'message' => 'Detail produk berhasil ditampilkan'
            ]);
    }

    // Mengubah produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255',
            'harga' => 'sometimes|required|numeric|min:0',
            'kategori' => 'sometimes|nullable|string|max:255',
            'stok' => 'sometimes|nullable|integer|min:0'
        ]);

        $product->update($validated);

        return (new ProductResource($product->fresh()))
            ->additional([
                'success' => true,
                'message' => 'Produk berhasil diperbarui'
            ]);
    }

    // Menghapus produk (Soft Delete)
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus'
        ], 200);
    }

    // Menampilkan produk yang sudah dihapus
    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(10);

        return ProductResource::collection($products)
            ->additional([
                'success' => true,
                'message' => 'Data produk yang sudah dihapus berhasil ditampilkan'
            ]);
    }

    // Memulihkan produk yang sudah dihapus
    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);

        $product->restore();

        return (new ProductResource($product->fresh()))
            ->additional([
                'success' => true,
                'message' => 'Produk berhasil dipulihkan'
            ]);
    }
}
