<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Menampilkan semua barang masuk.
     */
    public function index()
    {
        $barangMasuk = BarangMasuk::with(['barang', 'petugas'])
            ->latest('tanggal')
            ->latest('id')
            ->get();

        return view('barang_masuk.index', compact('barangMasuk'));
    }

    /**
     * Menampilkan form tambah barang masuk.
     */
    public function create()
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('barang_masuk.create', compact('barangs'));
    }

    /**
     * Menyimpan data barang masuk.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => [
                'required',
                'exists:barang,id',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'jumlah' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        $validated['id_petugas'] = auth()->id();

        BarangMasuk::create($validated);

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail barang masuk.
     */
    public function show(BarangMasuk $barangMasuk)
    {
        $barangMasuk->load(['barang', 'petugas']);

        return view('barang_masuk.show', compact('barangMasuk'));
    }

    /**
     * Menampilkan form edit barang masuk.
     */
    public function edit(BarangMasuk $barangMasuk)
    {
        $barangs = Barang::orderBy('nama_barang')->get();

        return view('barang_masuk.edit', compact(
            'barangMasuk',
            'barangs'
        ));
    }

    /**
     * Memperbarui data barang masuk.
     */
    public function update(Request $request, BarangMasuk $barangMasuk)
    {
        $validated = $request->validate([
            'barang_id' => [
                'required',
                'exists:barang,id',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'jumlah' => [
                'required',
                'numeric',
                'min:0.01',
            ],
            'keterangan' => [
                'nullable',
                'string',
            ],
        ]);

        $barangMasuk->update($validated);

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil diperbarui.');
    }

    /**
     * Menghapus data barang masuk.
     */
    public function destroy(BarangMasuk $barangMasuk)
    {
        $barangMasuk->delete();

        return redirect()
            ->route('barang-masuk.index')
            ->with('success', 'Data barang masuk berhasil dihapus.');
    }
}