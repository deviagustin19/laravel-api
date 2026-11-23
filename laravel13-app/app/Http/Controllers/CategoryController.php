<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;

class CategoryController extends Controller
{
    // Menampilkan semua kategori
    public function index()
    {
        return CategoryResource::collection(Category::all())
            ->additional([
                'success' => true,
                'message' => 'Data kategori berhasil ditampilkan'
            ]);
    }

    // Menambahkan kategori
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $category = Category::create($validated);

        return (new CategoryResource($category))
            ->additional([
                'success' => true,
                'message' => 'Kategori berhasil ditambahkan'
            ])
            ->response()
            ->setStatusCode(201);
    }

    // Menampilkan detail kategori
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return new CategoryResource($category);
    }

    // Mengubah kategori
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'sometimes|required|string|max:255'
        ]);

        $category->update($validated);

        return new CategoryResource($category->fresh());
    }

    // Menghapus kategori
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Kategori berhasil dihapus'
        ]);
    }
}
