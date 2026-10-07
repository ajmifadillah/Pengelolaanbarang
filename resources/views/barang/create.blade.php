@extends('layouts.master')

@section('title', 'Tambah Barang - Pengelolaan Barang')
@section('page-title', 'Tambah Barang')

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

    .form-group.full {
        grid-column: 1 / -1;
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

    .form-input,
    .form-select {
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

    .form-input:focus,
    .form-select:focus {
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

    @media (max-width: 650px) {

        .page-header h1 {
            font-size: 21px;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
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

    <h1>Tambah Barang</h1>

    <p>
        Tambahkan data barang baru ke dalam persediaan.
    </p>

</div>


<div class="form-card">

    <div class="form-header">

        <div class="form-title">
            Informasi Barang
        </div>

        <div class="form-subtitle">
            Isi data barang dengan lengkap dan benar.
        </div>

    </div>


    <form
        action="{{ route('barang.store') }}"
        method="POST"
    >

        @csrf


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
                        value="{{ old('material_code') }}"
                        placeholder="Contoh: P001"
                        required
                    >

                    @error('material_code')
                        <div class="error-message">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                <!-- NAMA BARANG -->

                <div class="form-group">

                    <label class="form-label">
                        Nama Barang
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        name="nama_barang"
                        class="form-input"
                        value="{{ old('nama_barang') }}"
                        placeholder="Masukkan nama barang"
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
                        value="{{ old('stock_awal', 0) }}"
                        min="0"
                        step="0.01"
                        placeholder="0"
                        required
                    >

                    <div class="form-help">
                        Stok awal sebelum ada transaksi masuk atau keluar.
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
                        value="{{ old('unit') }}"
                        placeholder="Contoh: PCS, KG, LITER"
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
                        value="{{ old('min', 0) }}"
                        min="0"
                        step="0.01"
                        placeholder="0"
                        required
                    >

                    <div class="form-help">
                        Batas minimum stok sebelum dianggap rendah.
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
                        value="{{ old('max', 0) }}"
                        min="0"
                        step="0.01"
                        placeholder="0"
                        required
                    >

                    <div class="form-help">
                        Batas maksimum stok barang.
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

                Simpan Barang

            </button>

        </div>


    </form>

</div>

@endsection