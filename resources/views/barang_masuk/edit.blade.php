@extends('layouts.master')

@section('title', 'Edit Barang Masuk - Pengelolaan Barang')
@section('page-title', 'Edit Barang Masuk')

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
        padding: 24px;
        max-width: 850px;
    }

    .form-section-title {
        font-size: 15px;
        font-weight: 700;
        color: #17231d;
        padding-bottom: 14px;
        margin-bottom: 20px;
        border-bottom: 1px solid #edf1ee;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 18px;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        font-size: 11px;
        font-weight: 600;
        color: #52615a;
        margin-bottom: 7px;
    }

    .required {
        color: #b42318;
    }

    .form-control,
    .form-select {
        width: 100%;
        height: 39px;
        padding: 0 11px;
        border: 1px solid #d6dfda;
        border-radius: 6px;
        background: #ffffff;
        color: #26352e;
        font-family: 'Inter', sans-serif;
        font-size: 12px;
        outline: none;
        transition: .15s;
    }

    textarea.form-control {
        height: 90px;
        padding: 10px 11px;
        resize: vertical;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #2f7d55;
        box-shadow: 0 0 0 2px rgba(47,125,85,.08);
    }

    .error-message {
        font-size: 10px;
        color: #b42318;
        margin-top: 5px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 25px;
        padding-top: 18px;
        border-top: 1px solid #edf1ee;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 38px;
        padding: 0 14px;
        border-radius: 6px;
        text-decoration: none;
        border: none;
        font-family: 'Inter', sans-serif;
        font-size: 11px;
        font-weight: 600;
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
        background: #f1f4f2;
        color: #52615a;
        border: 1px solid #dfe7e2;
    }

    .btn-secondary:hover {
        background: #e7ece9;
    }

    .alert-error {
        background: #fce8e8;
        border: 1px solid #f3cccc;
        color: #b42318;
        padding: 12px 14px;
        border-radius: 6px;
        margin-bottom: 20px;
        font-size: 11px;
    }

    .alert-error ul {
        margin: 7px 0 0 18px;
    }

    @media (max-width: 650px) {

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .form-card {
            padding: 18px;
        }

        .page-header h1 {
            font-size: 21px;
        }

        .form-actions {
            flex-direction: column-reverse;
        }

        .btn {
            width: 100%;
        }

    }

</style>


<div class="page-header">

    <h1>
        Edit Barang Masuk
    </h1>

    <p>
        Perbarui informasi transaksi barang masuk.
    </p>

</div>


@if($errors->any())

    <div class="alert-error">

        <strong>
            Terdapat kesalahan pada data:
        </strong>

        <ul>

            @foreach($errors->all() as $error)

                <li>{{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif


<div class="form-card">

    <div class="form-section-title">

        Informasi Transaksi

    </div>


    <form
        action="{{ route('barang-masuk.update', $barangMasuk) }}"
        method="POST"
    >

        @csrf

        @method('PUT')


        <div class="form-grid">


            <!-- BARANG -->

            <div class="form-group">

                <label class="form-label">

                    Barang
                    <span class="required">*</span>

                </label>


                <select
                    name="barang_id"
                    class="form-select"
                    required
                >

                    <option value="">
                        Pilih Barang
                    </option>


                    @foreach($barangs as $barang)

                        <option
                            value="{{ $barang->id }}"
                            {{ old('barang_id', $barangMasuk->barang_id) == $barang->id ? 'selected' : '' }}
                        >

                            {{ $barang->material_code }}
                            -
                            {{ $barang->nama_barang }}

                        </option>

                    @endforeach

                </select>


                @error('barang_id')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- TANGGAL -->

            <div class="form-group">

                <label class="form-label">

                    Tanggal
                    <span class="required">*</span>

                </label>


                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    value="{{ old('tanggal', $barangMasuk->tanggal->format('Y-m-d')) }}"
                    required
                >


                @error('tanggal')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- JUMLAH -->

            <div class="form-group">

                <label class="form-label">

                    Jumlah
                    <span class="required">*</span>

                </label>


                <input
                    type="number"
                    name="jumlah"
                    class="form-control"
                    value="{{ old('jumlah', $barangMasuk->jumlah) }}"
                    min="0.01"
                    step="0.01"
                    required
                >


                @error('jumlah')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>


            <!-- KETERANGAN -->

            <div class="form-group full">

                <label class="form-label">

                    Keterangan

                </label>


                <textarea
                    name="keterangan"
                    class="form-control"
                    placeholder="Tambahkan keterangan jika diperlukan..."
                >{{ old('keterangan', $barangMasuk->keterangan) }}</textarea>


                @error('keterangan')

                    <div class="error-message">
                        {{ $message }}
                    </div>

                @enderror

            </div>


        </div>


        <div class="form-actions">

            <a
                href="{{ route('barang-masuk.index') }}"
                class="btn btn-secondary"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Kembali

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