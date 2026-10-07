@extends('layouts.master')

@section('title', 'Detail Barang Masuk - Pengelolaan Barang')
@section('page-title', 'Detail Barang Masuk')

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

    .detail-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        max-width: 850px;
        overflow: hidden;
    }

    .detail-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf1ee;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .detail-icon {
        width: 42px;
        height: 42px;
        border-radius: 8px;
        background: #edf6f1;
        color: #2f7d55;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
    }

    .detail-header-title {
        font-size: 15px;
        font-weight: 700;
        color: #17231d;
    }

    .detail-header-subtitle {
        font-size: 10px;
        color: #7a8781;
        margin-top: 4px;
    }

    .detail-body {
        padding: 24px;
    }

    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        border: 1px solid #e5ebe7;
        border-radius: 7px;
        overflow: hidden;
    }

    .detail-item {
        padding: 15px 17px;
        border-bottom: 1px solid #edf1ee;
    }

    .detail-item:nth-child(odd) {
        border-right: 1px solid #edf1ee;
    }

    .detail-item:nth-last-child(-n+2) {
        border-bottom: none;
    }

    .detail-label {
        font-size: 10px;
        color: #7a8781;
        margin-bottom: 6px;
    }

    .detail-value {
        font-size: 12px;
        color: #26352e;
        font-weight: 600;
    }

    .material-code {
        color: #2f7d55;
    }

    .quantity {
        color: #2f7d55;
        font-size: 15px;
        font-weight: 700;
    }

    .detail-note {
        margin-top: 18px;
        padding: 14px 16px;
        background: #f6f8f7;
        border: 1px solid #e5ebe7;
        border-radius: 7px;
    }

    .detail-note-title {
        font-size: 10px;
        font-weight: 700;
        color: #52615a;
        margin-bottom: 6px;
    }

    .detail-note-text {
        font-size: 11px;
        color: #52615a;
        line-height: 1.6;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 22px;
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
        font-family: 'Inter', sans-serif;
        font-size: 11px;
        font-weight: 600;
        transition: .15s;
    }

    .btn-secondary {
        background: #f1f4f2;
        color: #52615a;
        border: 1px solid #dfe7e2;
    }

    .btn-secondary:hover {
        background: #e7ece9;
    }

    .btn-primary {
        background: #2f7d55;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #256644;
    }

    @media (max-width: 650px) {

        .detail-grid {
            grid-template-columns: 1fr;
        }

        .detail-item:nth-child(odd) {
            border-right: none;
        }

        .detail-item:nth-last-child(-n+2) {
            border-bottom: 1px solid #edf1ee;
        }

        .detail-item:last-child {
            border-bottom: none;
        }

        .detail-card {
            border-radius: 7px;
        }

        .detail-body {
            padding: 17px;
        }

        .page-header h1 {
            font-size: 21px;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn {
            width: 100%;
        }

    }

</style>


<div class="page-header">

    <h1>
        Detail Barang Masuk
    </h1>

    <p>
        Informasi lengkap transaksi barang yang masuk.
    </p>

</div>


<div class="detail-card">

    <div class="detail-header">

        <div class="detail-icon">

            <i class="fa-solid fa-arrow-down"></i>

        </div>

        <div>

            <div class="detail-header-title">
                Informasi Transaksi
            </div>

            <div class="detail-header-subtitle">
                Data transaksi barang masuk
            </div>

        </div>

    </div>


    <div class="detail-body">

        <div class="detail-grid">


            <!-- MATERIAL CODE -->

            <div class="detail-item">

                <div class="detail-label">
                    Material Code
                </div>

                <div class="detail-value material-code">

                    {{ $barangMasuk->barang->material_code }}

                </div>

            </div>


            <!-- NAMA BARANG -->

            <div class="detail-item">

                <div class="detail-label">
                    Nama Barang
                </div>

                <div class="detail-value">

                    {{ $barangMasuk->barang->nama_barang }}

                </div>

            </div>


            <!-- TANGGAL -->

            <div class="detail-item">

                <div class="detail-label">
                    Tanggal
                </div>

                <div class="detail-value">

                    {{ $barangMasuk->tanggal->format('d/m/Y') }}

                </div>

            </div>


            <!-- JUMLAH -->

            <div class="detail-item">

                <div class="detail-label">
                    Jumlah Barang Masuk
                </div>

                <div class="detail-value quantity">

                    {{ rtrim(rtrim(number_format((float) $barangMasuk->jumlah, 2, ',', '.'), '0'), ',') }}

                    {{ $barangMasuk->barang->unit }}

                </div>

            </div>


            <!-- UNIT -->

            <div class="detail-item">

                <div class="detail-label">
                    Unit
                </div>

                <div class="detail-value">

                    {{ $barangMasuk->barang->unit }}

                </div>

            </div>


            <!-- PETUGAS -->

            <div class="detail-item">

                <div class="detail-label">
                    Petugas
                </div>

                <div class="detail-value">

                    {{ $barangMasuk->petugas->name ?? '-' }}

                </div>

            </div>


        </div>


        <!-- KETERANGAN -->

        <div class="detail-note">

            <div class="detail-note-title">

                Keterangan

            </div>

            <div class="detail-note-text">

                {{ $barangMasuk->keterangan ?: 'Tidak ada keterangan.' }}

            </div>

        </div>


        <!-- BUTTON -->

        <div class="form-actions">

            <a
                href="{{ route('barang-masuk.index') }}"
                class="btn btn-secondary"
            >

                <i class="fa-solid fa-arrow-left"></i>

                Kembali

            </a>


            <a
                href="{{ route('barang-masuk.edit', $barangMasuk) }}"
                class="btn btn-primary"
            >

                <i class="fa-solid fa-pen"></i>

                Edit Data

            </a>

        </div>

    </div>

</div>

@endsection