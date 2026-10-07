@extends('layouts.master')

@section('title', 'Barang Masuk - Pengelolaan Barang')
@section('page-title', 'Barang Masuk')

@section('content')

<style>

    /* ================================
       HEADER
    ================================= */

    .page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 26px;
        flex-wrap: wrap;
    }

    .page-header h1 {
        font-size: 24px;
        line-height: 1.4;
        color: #17231d;
        font-weight: 700;
        letter-spacing: -.3px;
        margin-bottom: 5px;
    }

    .page-header p {
        font-size: 12px;
        color: #718078;
    }


    /* ================================
       BUTTON TAMBAH
    ================================= */

    .btn-add {
        display: inline-flex;
        align-items: center;
        gap: 8px;

        padding: 9px 13px;

        background: #2f7d55;
        color: #ffffff;

        border-radius: 6px;

        text-decoration: none;

        font-size: 11px;
        font-weight: 600;

        transition: .15s;
    }

    .btn-add:hover {
        background: #256644;
    }


    /* ================================
       ALERT
    ================================= */

    .alert {
        display: flex;
        align-items: center;
        gap: 9px;

        padding: 11px 14px;

        border-radius: 6px;

        margin-bottom: 20px;

        font-size: 12px;

        background: #e7f4ec;
        color: #23613e;

        border: 1px solid #d2e9da;
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
       TABLE
    ================================= */

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }


    table.dataTable {
        width: 100% !important;
    }


    table.dataTable thead th {
        background: #f6f8f7 !important;

        color: #52615a !important;

        padding: 11px 12px !important;

        font-size: 10px !important;

        font-weight: 600 !important;

        text-align: left;

        border-bottom: 1px solid #dfe7e2 !important;

        white-space: nowrap;
    }


    table.dataTable tbody td {
        padding: 12px !important;

        font-size: 11px;

        color: #45524c;

        border-bottom: 1px solid #edf1ee;

        vertical-align: middle;
    }


    table.dataTable tbody tr:hover {
        background: #fafcfb !important;
    }


    .material-code {
        color: #2f7d55;

        font-weight: 600;
    }


    .number {
        font-weight: 600;

        color: #17231d;
    }


    /* ================================
       ACTION
    ================================= */

    .action-wrapper {
        display: flex;

        gap: 5px;

        flex-wrap: wrap;
    }


    .action-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 5px;

        padding: 6px 9px;

        border-radius: 5px;

        text-decoration: none;

        border: none;

        font-family: 'Inter', sans-serif;

        font-size: 10px;

        font-weight: 600;

        cursor: pointer;

        transition: .15s;
    }


    .btn-detail {
        background: #edf6f1;

        color: #2f7d55;
    }


    .btn-detail:hover {
        background: #dceee4;
    }


    .btn-edit {
        background: #fff4d6;

        color: #8a6100;
    }


    .btn-edit:hover {
        background: #ffedb5;
    }


    .btn-delete {
        background: #fce8e8;

        color: #b42318;
    }


    .btn-delete:hover {
        background: #f8d6d6;
    }


    /* ================================
       DATATABLES
    ================================= */

    .dataTables_wrapper {

        font-family: 'Inter', sans-serif;

        color: #52615a;

        font-size: 11px;

    }


    .dataTables_wrapper .dataTables_filter input {

        border: 1px solid #d6dfda;

        border-radius: 6px;

        padding: 7px 9px;

        outline: none;

        margin-left: 6px;

        font-family: 'Inter', sans-serif;

        font-size: 11px;

        background: #ffffff;

    }


    .dataTables_wrapper .dataTables_filter input:focus {

        border-color: #2f7d55;

        box-shadow:
            0 0 0 2px
            rgba(47,125,85,.08);

    }


    .dataTables_wrapper .dataTables_length select {

        border: 1px solid #d6dfda;

        border-radius: 6px;

        padding: 5px;

        font-family: 'Inter', sans-serif;

        font-size: 11px;

        outline: none;

    }


    .dataTables_wrapper .dataTables_info {

        font-size: 10px;

        color: #7a8781;

        padding-top: 14px !important;
    }


    .dataTables_wrapper .dataTables_paginate {

        margin-top: 12px;
    }


    .dataTables_wrapper .dataTables_paginate .paginate_button {

        font-size: 10px !important;

        border-radius: 5px !important;

    }


    .dataTables_wrapper .dataTables_paginate .paginate_button.current {

        background: #2f7d55 !important;

        border: 1px solid #2f7d55 !important;

        color: white !important;

    }


    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {

        background: #256644 !important;

        border: 1px solid #256644 !important;

        color: white !important;

    }


    /* ================================
       EXPORT EXCEL
    ================================= */

    .dt-buttons {

        margin-bottom: 14px;
    }


    .dt-button.excel-button {

        background: #2f7d55 !important;

        border: 1px solid #2f7d55 !important;

        color: #ffffff !important;

        border-radius: 6px !important;

        padding: 8px 12px !important;

        font-family: 'Inter', sans-serif !important;

        font-size: 10px !important;

        font-weight: 600 !important;

        box-shadow: none !important;

        transition: .15s !important;

    }


    .dt-button.excel-button:hover {

        background: #256644 !important;

        border-color: #256644 !important;

    }


    /* ================================
       RESPONSIVE
    ================================= */

    @media (max-width: 700px) {

        .page-header h1 {
            font-size: 21px;
        }

        .card {
            padding: 17px;
        }

    }

</style>


<!-- HEADER -->

<div class="page-header">

    <div>

        <h1>
            Barang Masuk
        </h1>

        <p>
            Kelola transaksi barang yang masuk ke persediaan.
        </p>

    </div>


    <a href="{{ route('barang-masuk.create') }}"
       class="btn-add">

        <i class="fa-solid fa-plus"></i>

        Tambah Barang Masuk

    </a>

</div>


<!-- ALERT -->

@if(session('success'))

    <div class="alert">

        <i class="fa-solid fa-circle-check"></i>

        {{ session('success') }}

    </div>

@endif


<!-- CARD -->

<div class="card">


    <div class="card-header">

        <div>

            <div class="card-title">
                Data Barang Masuk
            </div>

            <div class="card-subtitle">
                Riwayat seluruh transaksi barang masuk.
            </div>

        </div>

    </div>


    <div class="table-wrapper">

        <table id="barangMasukTable"
               class="display">

            <thead>

                <tr>

                    <th>No</th>

                    <th>Tanggal</th>

                    <th>Material Code</th>

                    <th>Nama Barang</th>

                    <th>Jumlah</th>

                    <th>Unit</th>

                    <th>Petugas</th>

                    <th>Keterangan</th>

                    <th>Aksi</th>

                </tr>

            </thead>


            <tbody>


                @foreach($barangMasuk as $index => $item)

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

                    @endphp


                    <tr>

                        <td>
                            {{ $index + 1 }}
                        </td>


                        <td>
                            {{ $item->tanggal->format('d/m/Y') }}
                        </td>


                        <td>

                            <span class="material-code">

                                {{ $item->barang->material_code }}

                            </span>

                        </td>


                        <td>

                            {{ $item->barang->nama_barang }}

                        </td>


                        <td class="number">

                            {{ $formatAngka($item->jumlah) }}

                        </td>


                        <td>

                            {{ $item->barang->unit }}

                        </td>


                        <td>

                            {{ $item->petugas->name ?? '-' }}

                        </td>


                        <td>

                            {{ $item->keterangan ?: '-' }}

                        </td>


                        <td>

                            <div class="action-wrapper">


                                <a href="{{ route('barang-masuk.show', $item) }}"
                                   class="action-btn btn-detail">

                                    <i class="fa-solid fa-eye"></i>

                                    Detail

                                </a>


                                <a href="{{ route('barang-masuk.edit', $item) }}"
                                   class="action-btn btn-edit">

                                    <i class="fa-solid fa-pen"></i>

                                    Edit

                                </a>


                                <form
                                    action="{{ route('barang-masuk.destroy', $item) }}"
                                    method="POST"
                                    style="display:inline;"
                                    onsubmit="return confirm('Yakin ingin menghapus data barang masuk ini?');">

                                    @csrf

                                    @method('DELETE')


                                    <button
                                        type="submit"
                                        class="action-btn btn-delete">

                                        <i class="fa-solid fa-trash"></i>

                                        Hapus

                                    </button>

                                </form>


                            </div>

                        </td>

                    </tr>


                @endforeach


            </tbody>

        </table>

    </div>

</div>


<!-- DATATABLES -->

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>


<script>

    $(document).ready(function () {

        $('#barangMasukTable').DataTable({

            dom: 'Bfrtip',

            pageLength: 10,

            language: {

                search: 'Cari:',

                lengthMenu: 'Tampilkan _MENU_ data',

                info: 'Menampilkan _START_ sampai _END_ dari _TOTAL_ data',

                infoEmpty: 'Tidak ada data',

                zeroRecords: 'Data tidak ditemukan',

                paginate: {

                    first: 'Pertama',

                    last: 'Terakhir',

                    next: 'Berikutnya',

                    previous: 'Sebelumnya'

                }

            },

            buttons: [

                {

                    extend: 'excelHtml5',

                    text: '<i class="fa-solid fa-file-excel"></i> Export Excel',

                    className: 'excel-button',

                    title: 'Data_Barang_Masuk',

                    filename: 'Data_Barang_Masuk',

                    exportOptions: {

                        columns: ':not(:last-child)'

                    }

                }

            ]

        });

    });

</script>

@endsection