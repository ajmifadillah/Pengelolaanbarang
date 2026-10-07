@extends('layouts.master')

@section('title', 'Barang Keluar - Pengelolaan Barang')
@section('page-title', 'Barang Keluar')

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

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        min-height: 37px;
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

    .table-card {
        background: #ffffff;
        border: 1px solid #e2e9e5;
        border-radius: 9px;
        overflow: hidden;
    }

    .table-header {
        padding: 18px 20px;
        border-bottom: 1px solid #edf1ee;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
    }

    .table-title {
        font-size: 14px;
        font-weight: 700;
        color: #17231d;
    }

    .table-subtitle {
        font-size: 10px;
        color: #7a8781;
        margin-top: 4px;
    }

    .table-wrapper {
        width: 100%;
        overflow-x: auto;
    }

    table.dataTable {
        width: 100% !important;
        border-collapse: collapse !important;
        margin: 0 !important;
    }

    table.dataTable thead th {
        background: #f6f8f7;
        color: #52615a;
        font-size: 10px;
        font-weight: 700;
        padding: 12px 11px;
        border-bottom: 1px solid #dfe7e2 !important;
        white-space: nowrap;
    }

    table.dataTable tbody td {
        padding: 12px 11px;
        font-size: 11px;
        color: #3d4a43;
        border-bottom: 1px solid #edf1ee;
        vertical-align: middle;
    }

    table.dataTable tbody tr:hover {
        background: #fafcfb;
    }

    .material-code {
        color: #2f7d55;
        font-weight: 700;
    }

    .quantity {
        color: #b42318;
        font-weight: 700;
    }

    .petugas {
        font-weight: 600;
        color: #52615a;
    }

    .empty-data {
        padding: 40px !important;
        text-align: center;
        color: #9aa59f !important;
    }

    .action-buttons {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .action-btn {
        width: 30px;
        height: 30px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 5px;
        text-decoration: none;
        border: 1px solid transparent;
        font-size: 11px;
        cursor: pointer;
        transition: .15s;
    }

    .action-view {
        background: #edf6f1;
        color: #2f7d55;
        border-color: #d9ebe1;
    }

    .action-view:hover {
        background: #dceee4;
    }

    .action-edit {
        background: #f3f5f4;
        color: #52615a;
        border-color: #e0e6e2;
    }

    .action-edit:hover {
        background: #e8ecea;
    }

    .action-delete {
        background: #fcebea;
        color: #b42318;
        border-color: #f3d1ce;
    }

    .action-delete:hover {
        background: #f8dedd;
    }

    .alert-success {
        background: #edf6f1;
        border: 1px solid #d7eade;
        color: #23613e;
        padding: 11px 14px;
        border-radius: 6px;
        margin-bottom: 18px;
        font-size: 11px;
    }

    .dataTables_wrapper {
        padding: 18px 20px 20px;
    }

    .dataTables_wrapper .dataTables_filter {
        margin-bottom: 15px;
    }

    .dataTables_wrapper .dataTables_filter label,
    .dataTables_wrapper .dataTables_length label {
        font-size: 11px;
        color: #68756e;
    }

    .dataTables_wrapper .dataTables_filter input {
        margin-left: 7px;
        height: 32px;
        border: 1px solid #d6dfda;
        border-radius: 5px;
        padding: 0 9px;
        font-size: 11px;
        outline: none;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #2f7d55;
    }

    .dataTables_wrapper .dataTables_length select {
        height: 31px;
        border: 1px solid #d6dfda;
        border-radius: 5px;
        padding: 0 7px;
        font-size: 11px;
        outline: none;
    }

    .dataTables_wrapper .dataTables_info {
        font-size: 10px;
        color: #7a8781;
        padding-top: 18px;
    }

    .dataTables_wrapper .dataTables_paginate {
        padding-top: 14px;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button {
        font-size: 10px !important;
        border-radius: 4px !important;
        border: 1px solid transparent !important;
        padding: 5px 9px !important;
        color: #52615a !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background: #edf6f1 !important;
        color: #2f7d55 !important;
        border-color: #d9ebe1 !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background: #2f7d55 !important;
        color: #ffffff !important;
        border-color: #2f7d55 !important;
    }

    .dt-buttons {
        margin-bottom: 15px;
    }

    .excel-button {
        background: #2f7d55 !important;
        color: #ffffff !important;
        border: none !important;
        border-radius: 5px !important;
        font-family: 'Inter', sans-serif !important;
        font-size: 10px !important;
        font-weight: 600 !important;
        padding: 7px 11px !important;
    }

    .excel-button:hover {
        background: #256644 !important;
    }

    @media (max-width: 650px) {

        .page-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-header h1 {
            font-size: 21px;
        }

        .table-header {
            padding: 15px;
        }

        .dataTables_wrapper {
            padding: 15px;
        }

    }

</style>


<div class="page-header">

    <div>

        <h1>
            Barang Keluar
        </h1>

        <p>
            Kelola dan pantau seluruh transaksi barang yang keluar.
        </p>

    </div>


    <a
        href="{{ route('barang-keluar.create') }}"
        class="btn btn-primary"
    >

        <i class="fa-solid fa-plus"></i>

        Tambah Barang Keluar

    </a>

</div>


@if(session('success'))

    <div class="alert-success">

        <i class="fa-solid fa-circle-check"></i>

        {{ session('success') }}

    </div>

@endif


<div class="table-card">

    <div class="table-header">

        <div>

            <div class="table-title">
                Data Barang Keluar
            </div>

            <div class="table-subtitle">
                Riwayat transaksi barang yang keluar dari persediaan.
            </div>

        </div>

    </div>


    <div class="table-wrapper">

        <table
            id="barangKeluarTable"
            class="display"
        >

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

                @forelse($barangKeluar as $index => $item)

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

                        <td>

                            <span class="quantity">

                                -{{ rtrim(rtrim(number_format((float) $item->jumlah, 2, ',', '.'), '0'), ',') }}

                            </span>

                        </td>

                        <td>
                            {{ $item->barang->unit }}
                        </td>

                        <td>

                            <span class="petugas">

                                {{ $item->petugas->name ?? '-' }}

                            </span>

                        </td>

                        <td>

                            {{ $item->keterangan ?: '-' }}

                        </td>

                        <td>

                            <div class="action-buttons">

                                <a
                                    href="{{ route('barang-keluar.show', $item) }}"
                                    class="action-btn action-view"
                                    title="Detail"
                                >

                                    <i class="fa-solid fa-eye"></i>

                                </a>


                                <a
                                    href="{{ route('barang-keluar.edit', $item) }}"
                                    class="action-btn action-edit"
                                    title="Edit"
                                >

                                    <i class="fa-solid fa-pen"></i>

                                </a>


                                <form
                                    action="{{ route('barang-keluar.destroy', $item) }}"
                                    method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')"
                                    style="display:inline;"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="action-btn action-delete"
                                        title="Hapus"
                                    >

                                        <i class="fa-solid fa-trash"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="9"
                            class="empty-data"
                        >

                            Belum ada data barang keluar.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection


@push('styles')

    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css"
    >

    <link
        rel="stylesheet"
        href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css"
    >

@endpush


@push('scripts')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>


    <script>

        $(document).ready(function () {

            $('#barangKeluarTable').DataTable({

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

                        text: 'Export Excel',

                        className: 'excel-button',

                        title: 'Data_Barang_Keluar',

                        filename: 'Data_Barang_Keluar',

                        exportOptions: {

                            columns: ':not(:last-child)'

                        }

                    }

                ]

            });

        });

    </script>

@endpush