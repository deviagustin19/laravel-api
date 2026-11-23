@extends('layouts.app')

@section('title', 'Tambah Produk')

@section('content')

    <h2>Tambah Produk</h2>

    <form action="{{ route('produk.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label>Nama Produk</label><br>
            <input type="text"
                   name="nama"
                   value="{{ old('nama') }}"
                   style="width: 100%; padding: 10px;">

            @error('nama')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Harga</label><br>
            <input type="number"
                   name="harga"
                   value="{{ old('harga') }}"
                   style="width: 100%; padding: 10px;">

            @error('harga')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label>Stok</label><br>
            <input type="number"
                   name="stok"
                   value="{{ old('stok') }}"
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
                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->nama }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <small style="color: red;">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Produk
        </button>

        <a href="{{ route('produk.index') }}" class="btn btn-danger">
            Kembali
        </a>
    </form>

@endsection
