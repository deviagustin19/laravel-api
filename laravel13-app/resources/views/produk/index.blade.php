@extends('layouts.app')

@section('title', 'Data Produk')
@section('heading', 'Data Produk')

@section('content')

<style>
    /* HEADER PRODUK */
    .product-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 25px;
    }

    .product-header h2 {
        font-size: 25px;
        font-weight: 800;
        color: #172554;
        margin: 0;
    }

    .product-description {
        color: #64748b;
        font-size: 13px;
        margin-top: 7px;
    }

    .add-product {
        padding: 14px 22px;
        font-size: 14px;
        border-radius: 12px;
        background: #2563eb;
        color: white;
        text-decoration: none;
        font-weight: 700;
        box-shadow: 0 5px 12px rgba(37,99,235,.2);
        transition: .2s;
    }

    .add-product:hover {
        background: #1d4ed8;
        transform: translateY(-2px);
    }

    /* TABLE WRAPPER */
    .table-wrapper {
        width: 100%;
        overflow-x: auto;
        border-radius: 15px;
    }

    .product-table {
        width: 100%;
        min-width: 750px;
        border-collapse: separate;
        border-spacing: 0;
        border: 1px solid #dbe4f2;
        border-radius: 15px;
        overflow: hidden;
        background: white;
        margin-top: 10px;
    }

    .product-table th {
        background: linear-gradient(135deg, #2563eb, #1d4ed8);
        color: white;
        padding: 20px 17px;
        font-size: 14px;
        font-weight: 700;
        text-align: left;
        white-space: nowrap;
    }

    .product-table td {
        padding: 20px 17px;
        font-size: 14px;
        color: #1e293b;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    .product-table tbody tr:nth-child(even) {
        background: #f8faff;
    }

    .product-table tbody tr:hover {
        background: #eff6ff;
    }

    .product-table tbody tr:last-child td {
        border-bottom: none;
    }

    /* KOLOM NOMOR */
    .product-table th:first-child,
    .product-table td:first-child {
        width: 65px;
        text-align: center;
    }

    /* KOLOM AKSI */
    .product-table th:last-child {
        text-align: center;
    }

    .product-table td:last-child {
        text-align: center;
        white-space: nowrap;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 10px;
    }

    .action-buttons .btn {
        min-width: 85px;
        padding: 12px 16px;
        font-size: 13px;
        border-radius: 11px;
    }

    /* DATA KOSONG */
    .empty-data {
        text-align: center !important;
        padding: 35px !important;
        color: #94a3b8 !important;
    }

    /* RESPONSIVE */
    @media(max-width: 768px) {
        .product-header {
            align-items: flex-start;
        }

        .product-header h2 {
            font-size: 21px;
        }

        .add-product {
            width: 100%;
            text-align: center;
        }
    }
</style>

<!-- HEADER PRODUK -->
<div class="product-header">

    <div>
        <h2>Daftar Produk</h2>
        <p class="product-description">
            Kelola data produk dengan mudah dan rapi.
        </p>
    </div>

    <a href="{{ route('produk.create') }}" class="add-product">
        ＋ Tambah Produk
    </a>

</div>

<!-- TABEL PRODUK -->
<div class="table-wrapper">

    <table class="product-table">

        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($products as $product)

                <tr>
                    <td>
                        {{ $loop->iteration + $products->firstItem() - 1 }}
                    </td>

                    <td>
                        <strong>{{ $product->nama }}</strong>
                    </td>

                    <td>
                        {{ $product->category->nama ?? '-' }}
                    </td>

                    <td>
                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                    </td>

                    <td>
                        {{ $product->stok }}
                    </td>

                    <td>
                        <div class="action-buttons">

                            <a href="{{ route('produk.edit', $product->id) }}"
                               class="btn btn-warning">
                                Edit
                            </a>

                            <form action="{{ route('produk.destroy', $product->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    Hapus
                                </button>

                            </form>

                        </div>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="6" class="empty-data">
                        Belum ada data produk.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

</div>

<!-- PAGINATION -->
<div class="custom-pagination">
    {{ $products->links('vendor.pagination.custom') }}
</div>

@endsection
