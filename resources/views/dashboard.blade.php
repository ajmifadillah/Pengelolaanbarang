@extends('layouts.master')

@section('title', 'Dashboard - Pengelolaan Barang')
@section('page-title', 'Dashboard')

@section('content')

<style>

    /* ================================
       DASHBOARD HEADER
    ================================= */

    .dashboard-header {
        margin-bottom: 26px;
    }

    .dashboard-header h1 {
        font-size: 24px;
        line-height: 1.4;
        color: #17231d;
        font-weight: 700;
        letter-spacing: -.3px;
        margin-bottom: 5px;
    }

    .dashboard-header p {
        font-size: 12px;
        color: #718078;
    }


    /* ================================
       STAT CARDS
    ================================= */

    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 22px;
    }

    .stat-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        padding: 19px;
        display: flex;
        align-items: center;
        gap: 14px;
        min-height: 100px;
    }

    .stat-card:hover {
        border-color: #cbdad2;
    }

    .stat-icon {
        width: 44px;
        height: 44px;
        border-radius: 8px;
        background: #edf6f1;
        color: #2f7d55;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 17px;
        flex-shrink: 0;
    }

    .stat-label {
        font-size: 11px;
        color: #718078;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .stat-value {
        font-size: 22px;
        color: #17231d;
        font-weight: 700;
        line-height: 1.2;
    }


    /* ================================
       CARD
    ================================= */

    .card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        padding: 22px;
        margin-bottom: 20px;
    }

    .card-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-bottom: 19px;
    }

    .card-title {
        font-size: 16px;
        color: #17231d;
        font-weight: 700;
    }

    .card-subtitle {
        font-size: 11px;
        color: #7a8781;
        margin-top: 5px;
    }


    /* ================================
       STATUS
    ================================= */

    .badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 5px;
        font-size: 10px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-low {
        background: #fce8e8;
        color: #b42318;
    }

    .badge-safe {
        background: #e7f4ec;
        color: #23613e;
    }

    .badge-watch {
        background: #fff4d6;
        color: #8a6100;
    }


    /* ================================
       BUTTON
    ================================= */

    .btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 9px 13px;
        border-radius: 6px;
        text-decoration: none;
        font-size: 11px;
        font-weight: 600;
    }

    .btn-primary {
        background: #2f7d55;
        color: #ffffff;
    }

    .btn-primary:hover {
        background: #256644;
    }


    /* ================================
       TABLE
    ================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table {
        width: 100%;
        min-width: 900px;
        border-collapse: collapse;
    }

    thead th {
        background: #f6f8f7;
        color: #52615a;
        padding: 11px 12px;
        font-size: 10px;
        font-weight: 600;
        text-align: left;
        border-bottom: 1px solid #dfe7e2;
        white-space: nowrap;
    }

    tbody td {
        padding: 12px;
        font-size: 11px;
        color: #45524c;
        border-bottom: 1px solid #edf1ee;
        vertical-align: middle;
    }

    tbody tr:hover {
        background: #fafcfb;
    }

    .code {
        color: #2f7d55;
        font-weight: 600;
    }

    .number {
        font-weight: 500;
    }

    .available {
        color: #17231d;
        font-weight: 700;
    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 1100px) {

        .stats {
            grid-template-columns: repeat(2, 1fr);
        }

    }


    @media (max-width: 650px) {

        .stats {
            grid-template-columns: 1fr;
        }

        .card {
            padding: 17px;
        }

        .dashboard-header h1 {
            font-size: 21px;
        }

    }

</style>


<!-- =================================
     HEADER
================================= -->

<div class="dashboard-header">

    <h1>
        Selamat Datang, {{ auth()->user()->name }}
    </h1>

    <p>
        Berikut ringkasan kondisi persediaan barang saat ini.
    </p>

</div>


<!-- =================================
     STATISTICS
================================= -->

<div class="stats">


    <!-- TOTAL BARANG -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class="fa-solid fa-boxes-stacked"></i>

        </div>

        <div>

            <div class="stat-label">
                Total Jenis Barang
            </div>

            <div class="stat-value">
                {{ $totalBarang }}
            </div>

        </div>

    </div>


    <!-- BARANG MASUK -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class="fa-solid fa-arrow-down"></i>

        </div>

        <div>

            <div class="stat-label">
                Total Barang Masuk
            </div>

            <div class="stat-value">
                {{ $totalMasuk + 0 }}
            </div>

        </div>

    </div>


    <!-- BARANG KELUAR -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class="fa-solid fa-arrow-up"></i>

        </div>

        <div>

            <div class="stat-label">
                Total Barang Keluar
            </div>

            <div class="stat-value">
                {{ $totalKeluar + 0 }}
            </div>

        </div>

    </div>


    <!-- TOTAL STOK -->

    <div class="stat-card">

        <div class="stat-icon">

            <i class="fa-solid fa-chart-simple"></i>

        </div>

        <div>

            <div class="stat-label">
                Total Stok Tersedia
            </div>

            <div class="stat-value">
                {{ $totalStok + 0 }}
            </div>

        </div>

    </div>


</div>


<!-- =================================
     KONDISI STOK
================================= -->

<div class="card">

    <div class="card-header">

        <div>

            <div class="card-title">
                Kondisi Stok
            </div>

            <div class="card-subtitle">
                Informasi barang berdasarkan batas minimum stok.
            </div>

        </div>


        @if($stokRendah > 0)

            <span class="badge badge-low">

                <i class="fa-solid fa-triangle-exclamation"></i>

                {{ $stokRendah }} barang perlu diperhatikan

            </span>

        @else

            <span class="badge badge-safe">

                <i class="fa-solid fa-circle-check"></i>

                Semua stok aman

            </span>

        @endif

    </div>

</div>


<!-- =================================
     DATA STOK
================================= -->

<div class="card">

    <div class="card-header">

        <div>

            <div class="card-title">
                Data Stok Barang
            </div>

            <div class="card-subtitle">
                Ringkasan stok berdasarkan transaksi barang masuk dan keluar.
            </div>

        </div>


        <a href="{{ route('barang.index') }}"
           class="btn btn-primary">

            <i class="fa-solid fa-boxes-stacked"></i>

            Kelola Barang

        </a>

    </div>


    <div class="table-wrapper">

        <table>

            <thead>

                <tr>

                    <th>No</th>

                    <th>Material Code</th>

                    <th>Nama Barang</th>

                    <th>Stock Awal</th>

                    <th>In</th>

                    <th>Out</th>

                    <th>Available</th>

                    <th>Max</th>

                    <th>Min</th>

                    <th>Status</th>

                </tr>

            </thead>


            <tbody>


                @forelse($barangs as $index => $barang)

                    @php

                        $masuk =
                            (float) (
                                $barang->barang_masuk_sum_jumlah
                                ?? 0
                            );

                        $keluar =
                            (float) (
                                $barang->barang_keluar_sum_jumlah
                                ?? 0
                            );

                        $available =
                            (float) $barang->stock_awal
                            + $masuk
                            - $keluar;

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

                    @endphp


                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>


                        <td>

                            <span class="code">

                                {{ $barang->material_code }}

                            </span>

                        </td>


                        <td>

                            {{ $barang->nama_barang }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($barang->stock_awal) }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($masuk) }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($keluar) }}

                        </td>


                        <td class="available">

                            {{ $formatAngka($available) }}

                            {{ $barang->unit }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($barang->max) }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($barang->min) }}

                        </td>


                        <td>

                            @if($available <= (float) $barang->min)

                                <span class="badge badge-low">

                                    <i class="fa-solid fa-circle-exclamation"></i>

                                    Stok Rendah

                                </span>


                            @elseif($available >= (float) $barang->max)

                                <span class="badge badge-safe">

                                    <i class="fa-solid fa-circle-check"></i>

                                    Stok Aman

                                </span>


                            @else

                                <span class="badge badge-watch">

                                    <i class="fa-solid fa-circle-info"></i>

                                    Perlu Dipantau

                                </span>

                            @endif

                        </td>

                    </tr>


                @empty

                    <tr>

                        <td
                            colspan="10"
                            style="
                                text-align:center;
                                padding:40px;
                                color:#8a9690;
                            "
                        >

                            <i
                                class="fa-solid fa-box-open"
                                style="
                                    display:block;
                                    font-size:28px;
                                    margin-bottom:10px;
                                    color:#aab6b0;
                                "
                            ></i>

                            Belum ada data barang.

                        </td>

                    </tr>

                @endforelse


            </tbody>

        </table>

    </div>

</div>

@endsection