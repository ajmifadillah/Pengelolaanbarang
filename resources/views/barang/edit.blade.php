@extends('layouts.master')

@section('title', 'Edit Barang - Pengelolaan Barang')
@section('page-title', 'Edit Barang')

@section('content')

<style>

    .page-header {
        margin-bottom: 24px;
    }

    .page-header h1 {
        font-size: 24px;
        color: #17231d;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .page-header p {
        font-size: 12px;
        color: #718078;
    }

    .form-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        max-width: 850px;
        overflow: hidden;
    }

    .form-header {
        padding: 18px 22px;
        border-bottom: 1px solid #edf1ee;
    }

    .form-title {
        font-size: 14px;
        font-weight: 700;
        color: #17231d;
    }

    .form-subtitle {
        font-size: 10px;
        color: #7a8781;
        margin-top: 4px;
    }

    .form-body {
        padding: 24px 22px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px 20px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-label {
        font-size: 10px;
        font-weight: 600;
        color: #52615a;
        margin-bottom: 7px;
    }

    .required {
        color: #b42318;
    }

    .form-input {
        width: 100%;
        height: 38px;
        border: 1px solid #d6dfda;
        border-radius: 6px;
        padding: 0 11px;
        background: #ffffff;
        color: #26352e;
        font-family: 'Inter', sans-serif;
        font-size: 11px;
        outline: none;
        transition: .15s;
    }

    .form-input:focus {
        border-color: #2f7d55;
        box-shadow: 0 0 0 2px rgba(47,125,85,.08);
    }

    .form-help {
        font-size: 9px;
        color: #8a9690;
        margin-top: 5px;
    }

    .error-message {
        color: #b42318;
        font-size: 9px;
        margin-top: 5px;
    }

    .form-footer {
        padding: 16px 22px;
        background: #fafcfb;
        border-top: 1px solid #edf1ee;
        display: flex;
        justify-content: flex-end;
        gap: 8px;
    }

    .btn {
        min-height: 36px;
        padding: 0 14px;
        border-radius: 6px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        font-family: 'Inter', sans-serif;
        font-size: 10px;
        font-weight: 600;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: .15s;
    }

    .btn-primary {
        background: #2f7d55;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #256644;
    }

    .btn-secondary {
        background: #ffffff;
        color: #52615a;
        border: 1px solid #d6dfda;
    }

    .btn-secondary:hover {
        background: #f3f6f4;
    }

    .current-code {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        margin-top: 7px;
        color: #2f7d55;
        font-size: 9px;
        font-weight: 600;
    }

    @media (max-width: 650px) {

        .page-header h1 {
            font-size: 21px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-body {
            padding: 20px 17px;
        }

        .form-footer {
            padding: 14px 17px;
        }

    }

</style>


<div class="page-header">

    <h1>Edit Barang</h1>

    <p>
        Perbarui informasi barang yang sudah tersimpan.
    </p>

</div>


<div class="form-card">

    <div class="form-header">

        <div class="form-title">
            Informasi Barang
        </div>

        <div class="form-subtitle">
            Periksa kembali data sebelum menyimpan perubahan.
        </div>

    </div>


    <form
        action="{{ route('barang.update', $barang) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="form-body">

            <div class="form-grid">


                <!-- MATERIAL CODE -->

                <div class="form-group">

                    <label class="form-label">
                        Material Code
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="material_code"
                        class="form-input"
                        value="{{ old('material_code', $barang->material_code) }}"
                        required
                    >

                    <div class="current-code">
                        <i class="fa-solid fa-barcode"></i>
                        Kode barang saat ini
                    </div>

                    @error('material_code')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- NAMA -->

                <div class="form-group">

                    <label class="form-label">
                        Nama Barang
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-input"
                        value="{{ old('nama_barang', $barang->nama_barang) }}"
                        required
                    >

                    @error('nama_barang')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- STOCK AWAL -->

                <div class="form-group">

                    <label class="form-label">
                        Stock Awal
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="stock_awal"
                        class="form-input"
                        value="{{ old('stock_awal', $barang->stock_awal) }}"
                        min="0"
                        step="0.01"
                        required
                    >

                    <div class="form-help">
                        Perubahan stock awal akan memengaruhi perhitungan stok tersedia.
                    </div>

                    @error('stock_awal')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- UNIT -->

                <div class="form-group">

                    <label class="form-label">
                        Unit
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="unit"
                        class="form-input"
                        value="{{ old('unit', $barang->unit) }}"
                        required
                    >

                    @error('unit')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- MIN -->

                <div class="form-group">

                    <label class="form-label">
                        Minimum Stock
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="min"
                        class="form-input"
                        value="{{ old('min', $barang->min) }}"
                        min="0"
                        step="0.01"
                        required
                    >

                    <div class="form-help">
                        Batas minimum stok.
                    </div>

                    @error('min')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- MAX -->

                <div class="form-group">

                    <label class="form-label">
                        Maximum Stock
                        <span class="required">*</span>
                    </label>

                    <input
                        type="number"
                        name="max"
                        class="form-input"
                        value="{{ old('max', $barang->max) }}"
                        min="0"
                        step="0.01"
                        required
                    >

                    <div class="form-help">
                        Batas maksimum stok.
                    </div>

                    @error('max')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


            </div>

        </div>


        <div class="form-footer">

            <a
                href="{{ route('barang.index') }}"
                class="btn btn-secondary"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Batal

            </a>


            <button
                type="submit"
                class="btn btn-primary"
            >

                <i class="fa-solid fa-floppy-disk"></i>

                Simpan Perubahan

            </button>

        </div>


    </form>

</div>

@endsection