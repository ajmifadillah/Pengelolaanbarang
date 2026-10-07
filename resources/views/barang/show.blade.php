@extends('layouts.master')

@section('title', 'Detail Barang - Pengelolaan Barang')
@section('page-title', 'Detail Barang')

@section('content')

<style>

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 15px;
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

    .header-actions {
        display: flex;
        gap: 7px;
    }

    .btn {
        min-height: 36px;
        padding: 0 13px;
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

    .detail-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .detail-header {
        padding: 20px 22px;
        border-bottom: 1px solid #edf1ee;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .item-title {
        font-size: 17px;
        font-weight: 700;
        color: #17231d;
    }

    .item-code {
        color: #2f7d55;
        font-size: 10px;
        font-weight: 700;
        margin-top: 5px;
    }

    .status {
        display: inline-flex;
        align-items: center;
        padding: 6px 9px;
        border-radius: 5px;
        font-size: 9px;
        font-weight: 700;
        white-space: nowrap;
    }

    .status-low {
        background: #fcebea;
        color: #b42318;
    }

    .status-safe {
        background: #edf6f1;
        color: #23613e;
    }

    .status-watch {
        background: #f7f2df;
        color: #8a6d1d;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 0;
    }

    .info-box {
        padding: 20px;
        border-right: 1px solid #edf1ee;
    }

    .info-box:last-child {
        border-right: none;
    }

    .info-label {
        color: #7a8781;
        font-size: 9px;
        margin-bottom: 7px;
    }

    .info-value {
        color: #17231d;
        font-size: 19px;
        font-weight: 700;
    }

    .info-unit {
        color: #7a8781;
        font-size: 9px;
        font-weight: 500;
    }

    .stock-available {
        color: #2f7d55;
    }

    .stock-low {
        color: #b42318;
    }

    .section-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .section-header {
        padding: 17px 20px;
        border-bottom: 1px solid #edf1ee;
    }

    .section-title {
        color: #17231d;
        font-size: 13px;
        font-weight: 700;
    }

    .section-subtitle {
        color: #7a8781;
        font-size: 9px;
        margin-top: 4px;
    }

    .table-wrapper {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead th {
        background: #f6f8f7;
        color: #52615a;
        font-size: 9px;
        font-weight: 700;
        padding: 11px 12px;
        text-align: left;
        border-bottom: 1px solid #dfe7e2;
        white-space: nowrap;
    }

    tbody td {
        padding: 11px 12px;
        font-size: 10px;
        color: #3d4a43;
        border-bottom: 1px solid #edf1ee;
    }

    tbody tr:last-child td {
        border-bottom: none;
    }

    tbody tr:hover {
        background: #fafcfb;
    }

    .quantity-in {
        color: #2f7d55;
        font-weight: 700;
    }

    .quantity-out {
        color: #b42318;
        font-weight: 700;
    }

    .empty-data {
        padding: 30px !important;
        text-align: center;
        color: #9aa59f !important;
    }

    @media (max-width: 900px) {

        .info-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .info-box:nth-child(2) {
            border-right: none;
        }

        .info-box:nth-child(-n+2) {
            border-bottom: 1px solid #edf1ee;
        }

    }

    @media (max-width: 650px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .header-actions {
            width: 100%;
        }

        .header-actions .btn {
            flex: 1;
        }

        .detail-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .info-box {
            border-right: none;
            border-bottom: 1px solid #edf1ee;
        }

        .info-box:last-child {
            border-bottom: none;
        }

    }

</style>


@php

    $formatAngka = function ($angka) {

        return rtrim(
            rtrim(
                number_format(
                    (float) $angka,
                    2,
                    ',',
                    '.'
                ),
                '0'
            ),
            ','
        );

    };

    $stockAwal = (float) $barang->stock_awal;
    $masuk = (float) $totalMasuk;
    $keluar = (float) $totalKeluar;
    $stokTersedia = (float) $available;

@endphp


<div class="page-header">

    <div>

        <h1>
            Detail Barang
        </h1>

        <p>
            Informasi lengkap dan riwayat persediaan barang.
        </p>

    </div>


    <div class="header-actions">

        <a
            href="{{ route('barang.index') }}"
            class="btn btn-secondary"
        >

            <i class="fa-solid fa-arrow-left"></i>

            Kembali

        </a>


        <a
            href="{{ route('barang.edit', $barang) }}"
            class="btn btn-primary"
        >

            <i class="fa-solid fa-pen"></i>

            Edit

        </a>

    </div>

</div>


<!-- INFORMASI UTAMA -->

<div class="detail-card">

    <div class="detail-header">

        <div>

            <div class="item-title">

                {{ $barang->nama_barang }}

            </div>

            <div class="item-code">

                {{ $barang->material_code }}

            </div>

        </div>


        @if($stokTersedia <= (float) $barang->min)

            <span class="status status-low">

                <i class="fa-solid fa-triangle-exclamation"></i>

                &nbsp;Stok Rendah

            </span>

        @elseif($stokTersedia >= (float) $barang->max)

            <span class="status status-safe">

                <i class="fa-solid fa-circle-check"></i>

                &nbsp;Stok Aman

            </span>

        @else

            <span class="status status-watch">

                <i class="fa-solid fa-circle-exclamation"></i>

                &nbsp;Perlu Dipantau

            </span>

        @endif

    </div>


    <div class="info-grid">


        <div class="info-box">

            <div class="info-label">
                Stock Awal
            </div>

            <div class="info-value">

                {{ $formatAngka($stockAwal) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Total Barang Masuk
            </div>

            <div class="info-value">

                {{ $formatAngka($masuk) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Total Barang Keluar
            </div>

            <div class="info-value">

                {{ $formatAngka($keluar) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Available
            </div>

            <div
                class="info-value
                {{ $stokTersedia <= (float) $barang->min
                    ? 'stock-low'
                    : 'stock-available' }}"
            >

                {{ $formatAngka($stokTersedia) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


    </div>

</div>


<!-- BATAS STOK -->

<div class="detail-card">

    <div class="section-header">

        <div class="section-title">
            Batas Persediaan
        </div>

        <div class="section-subtitle">
            Batas minimum dan maksimum yang digunakan untuk memantau stok.
        </div>

    </div>


    <div class="info-grid">


        <div class="info-box">

            <div class="info-label">
                Minimum Stock
            </div>

            <div class="info-value">

                {{ $formatAngka($barang->min) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Maximum Stock
            </div>

            <div class="info-value">

                {{ $formatAngka($barang->max) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Selisih dari Minimum
            </div>

            <div class="info-value">

                {{ $formatAngka($stokTersedia - (float) $barang->min) }}

                <span class="info-unit">
                    {{ $barang->unit }}
                </span>

            </div>

        </div>


        <div class="info-box">

            <div class="info-label">
                Unit Barang
            </div>

            <div class="info-value">

                {{ $barang->unit }}

            </div>

        </div>


    </div>

</div>


<!-- BARANG MASUK -->

<div class="section-card">

    <div class="section-header">

        <div class="section-title">
            Riwayat Barang Masuk
        </div>

        <div class="section-subtitle">
            Daftar transaksi barang yang masuk ke persediaan.
        </div>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                    <th>Keterangan</th>

                </tr>

            </thead>


            <tbody>

                @forelse($barang->barangMasuk as $index => $item)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $item->tanggal->format('d/m/Y') }}
                        </td>

                        <td>

                            <span class="quantity-in">

                                +{{ $formatAngka($item->jumlah) }}

                                {{ $barang->unit }}

                            </span>

                        </td>

                        <td>
                            {{ $item->petugas->name ?? '-' }}
                        </td>

                        <td>
                            {{ $item->keterangan ?: '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="empty-data"
                        >

                            Belum ada transaksi barang masuk.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


<!-- BARANG KELUAR -->

<div class="section-card">

    <div class="section-header">

        <div class="section-title">
            Riwayat Barang Keluar
        </div>

        <div class="section-subtitle">
            Daftar transaksi barang yang keluar dari persediaan.
        </div>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Petugas</th>
                    <th>Keterangan</th>

                </tr>

            </thead>


            <tbody>

                @forelse($barang->barangKeluar as $index => $item)

                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>

                        <td>
                            {{ $item->tanggal->format('d/m/Y') }}
                        </td>

                        <td>

                            <span class="quantity-out">

                                -{{ $formatAngka($item->jumlah) }}

                                {{ $barang->unit }}

                            </span>

                        </td>

                        <td>
                            {{ $item->petugas->name ?? '-' }}
                        </td>

                        <td>
                            {{ $item->keterangan ?: '-' }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="5"
                            class="empty-data"
                        >

                            Belum ada transaksi barang keluar.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection