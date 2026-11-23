@extends('layouts.app')

@section('title', 'Edit Produk')

@section('content')

    <h2>Edit Produk</h2>

    <form action="{{ route('produk.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div style="margin-bottom: 15px;">
            <label>Nama Produk</label><br>
            <input type="text"
                   name="nama"
                   value="{{ old('nama', $product->nama) }}"
                   style="width: 100%; padding: 10px;">

            @error('nama')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Harga</label><br>
            <input type="number"
                   name="harga"
                   value="{{ old('harga', $product->harga) }}"
                   style="width: 100%; padding: 10px;">

            @error('harga')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Stok</label><br>
            <input type="number"
                   name="stok"
                   value="{{ old('stok', $product->stok) }}"
                   style="width: 100%; padding: 10px;">

            @error('stok')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Kategori</label><br>
            <select name="category_id" style="width: 100%; padding: 10px;">
                <option value="">-- Pilih Kategori --</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Update Produk
        </button>

        <a href="{{ route('produk.index') }}" class="btn btn-danger">
            Kembali
        </a>
    </form>

@endsection
