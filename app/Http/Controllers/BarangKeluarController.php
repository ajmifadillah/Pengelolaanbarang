<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluar = BarangKeluar::with(['barang', 'petugas'])
            ->latest('tanggal')
            ->latest('id')
            ->get();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    public function create()
    {
        $barangs = Barang::withSum('barangMasuk', 'jumlah')
            ->withSum('barangKeluar', 'jumlah')
            ->orderBy('nama_barang')
            ->get();

        return view('barang_keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => ['required', 'exists:barang,id'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'numeric', 'min:0.01'],
            'keterangan' => ['nullable', 'string'],
        ]);

        $barang = Barang::withSum('barangMasuk', 'jumlah')
            ->withSum('barangKeluar', 'jumlah')
            ->findOrFail($validated['barang_id']);

        $totalMasuk = (float) ($barang->barang_masuk_sum_jumlah ?? 0);
        $totalKeluar = (float) ($barang->barang_keluar_sum_jumlah ?? 0);
        $stockAwal = (float) $barang->stock_awal;

        $available = $stockAwal + $totalMasuk - $totalKeluar;

        if ((float) $validated['jumlah'] > $available) {
            return back()
                ->withErrors([
                    'jumlah' => 'Jumlah barang keluar melebihi stok tersedia. Stok saat ini: ' . $available . ' ' . $barang->unit,
                ])
                ->withInput();
        }

        $validated['id_petugas'] = auth()->id();

        BarangKeluar::create($validated);

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Barang keluar berhasil ditambahkan.');
    }

    public function show(BarangKeluar $barangKeluar)
    {
        $barangKeluar->load(['barang', 'petugas']);

        return view('barang_keluar.show', compact('barangKeluar'));
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::withSum('barangMasuk', 'jumlah')
            ->withSum('barangKeluar', 'jumlah')
            ->orderBy('nama_barang')
            ->get();

        return view('barang_keluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $validated = $request->validate([
            'barang_id' => ['required', 'exists:barang,id'],
            'tanggal' => ['required', 'date'],
            'jumlah' => ['required', 'numeric', 'min:0.01'],
            'keterangan' => ['nullable', 'string'],
        ]);

        $barang = Barang::withSum('barangMasuk', 'jumlah')
            ->withSum('barangKeluar', 'jumlah')
            ->findOrFail($validated['barang_id']);

        $totalMasuk = (float) ($barang->barang_masuk_sum_jumlah ?? 0);
        $totalKeluar = (float) ($barang->barang_keluar_sum_jumlah ?? 0);
        $stockAwal = (float) $barang->stock_awal;

        /*
        Jika barang yang sedang diedit adalah barang yang sama,
        jumlah transaksi lama harus dikembalikan ke stok sementara.
        */

        if ($barangKeluar->barang_id == $barang->id) {
            $totalKeluar -= (float) $barangKeluar->jumlah;
        }

        $available = $stockAwal + $totalMasuk - $totalKeluar;

        if ((float) $validated['jumlah'] > $available) {
            return back()
                ->withErrors([
                    'jumlah' => 'Jumlah barang keluar melebihi stok tersedia. Stok yang dapat digunakan: ' . $available . ' ' . $barang->unit,
                ])
                ->withInput();
        }

        $barangKeluar->update($validated);

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data barang keluar berhasil diperbarui.');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        $barangKeluar->delete();

        return redirect()
            ->route('barang-keluar.index')
            ->with('success', 'Data barang keluar berhasil dihapus.');
    }
}