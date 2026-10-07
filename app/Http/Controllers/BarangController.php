<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BarangController extends Controller
{
    /**
     * Menampilkan semua data barang.
     */
    public function index()
    {
        $barangs = Barang::withSum('barangMasuk', 'jumlah')
            ->withSum('barangKeluar', 'jumlah')
            ->latest()
            ->get();

        return view('barang.index', compact('barangs'));
    }

    /**
     * Menampilkan form tambah barang.
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Menyimpan barang baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'material_code' => [
                'required',
                'string',
                'max:255',
                'unique:barang,material_code',
            ],
            'nama_barang' => [
                'required',
                'string',
                'max:255',
            ],
            'stock_awal' => [
                'required',
                'numeric',
                'min:0',
            ],
            'unit' => [
                'required',
                'string',
                'max:50',
            ],
            'min' => [
                'required',
                'numeric',
                'min:0',
            ],
            'max' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        Barang::create($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail barang.
     */
    public function show(Barang $barang)
    {
        $barang->load([
            'barangMasuk' => function ($query) {
                $query->latest('tanggal');
            },
            'barangKeluar' => function ($query) {
                $query->latest('tanggal');
            },
        ]);

        $totalMasuk = $barang->barangMasuk->sum('jumlah');
        $totalKeluar = $barang->barangKeluar->sum('jumlah');

        $available = $barang->stock_awal + $totalMasuk - $totalKeluar;

        return view('barang.show', compact(
            'barang',
            'totalMasuk',
            'totalKeluar',
            'available'
        ));
    }

    /**
     * Menampilkan form edit barang.
     */
    public function edit(Barang $barang)
    {
        return view('barang.edit', compact('barang'));
    }

    /**
     * Memperbarui data barang.
     */
    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'material_code' => [
                'required',
                'string',
                'max:255',
                Rule::unique('barang', 'material_code')
                    ->ignore($barang->id),
            ],
            'nama_barang' => [
                'required',
                'string',
                'max:255',
            ],
            'stock_awal' => [
                'required',
                'numeric',
                'min:0',
            ],
            'unit' => [
                'required',
                'string',
                'max:50',
            ],
            'min' => [
                'required',
                'numeric',
                'min:0',
            ],
            'max' => [
                'required',
                'numeric',
                'min:0',
            ],
        ]);

        $barang->update($validated);

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil diperbarui.');
    }

    /**
     * Menghapus barang.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()
            ->route('barang.index')
            ->with('success', 'Data barang berhasil dihapus.');
    }
}