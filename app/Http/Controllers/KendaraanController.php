<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    // Menampilkan semua data (READ)
    public function index()
    {
        // Ambil semua data dari model Kendaraan
        $kendaraans = Kendaraan::latest()->get();
        
        // Kirim ke view
        return view('kendaraan.index', compact('kendaraans'));
    }

    // Menampilkan form tambah (CREATE form)
    public function create()
    {
        return view('kendaraan.create');
    }

    // Menyimpan data baru (CREATE action)
    public function store(Request $request)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20',
            'nama_pemilik' => 'required|string|max:100',
            'merk_kendaraan' => 'required|string|max:50',
            'keluhan' => 'required|string',
        ]);

        Kendaraan::create($request->all());

        return redirect()->route('kendaraan.index')
                         ->with('success', 'Kendaraan berhasil ditambahkan!');
    }

    // Menampilkan form edit (UPDATE form)
    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        return view('kendaraan.edit', compact('kendaraan'));
    }

    // Menyimpan perubahan (UPDATE action)
    public function update(Request $request, $id)
    {
        $request->validate([
            'plat_nomor' => 'required|string|max:20',
            'nama_pemilik' => 'required|string|max:100',
            'merk_kendaraan' => 'required|string|max:50',
            'keluhan' => 'required|string',
        ]);

        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->update($request->all());

        return redirect()->route('kendaraan.index')
                         ->with('success', 'Kendaraan berhasil diupdate!');
    }

    // Menghapus data (DELETE)
    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect()->route('kendaraan.index')
                         ->with('success', 'Kendaraan berhasil dihapus!');
    }
}