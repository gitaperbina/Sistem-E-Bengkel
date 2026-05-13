@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>📋 Daftar Antrean Servis</h2>
    <a href="{{ url('/kendaraan/create') }}" class="btn btn-primary">➕ Tambah Kendaraan</a>
</div>

<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Plat Nomor</th>
                <th>Nama Pemilik</th>
                <th>Merk Kendaraan</th>
                <th>Keluhan</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kendaraans as $index => $kendaraan)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $kendaraan->plat_nomor }}</strong></td>
                <td>{{ $kendaraan->nama_pemilik }}</td>
                <td>{{ $kendaraan->merk_kendaraan }}</td>
                <td>{{ $kendaraan->keluhan }}</td>
                <td>
                    <a href="{{ url('/kendaraan/'.$kendaraan->id.'/edit') }}" class="btn btn-warning btn-sm">✏️ Edit</a>
                    <form action="{{ url('/kendaraan/'.$kendaraan->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus kendaraan ini?')">
                            🗑️ Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center py-4">
                    <div class="alert alert-info mb-0">
                        Belum ada data kendaraan. Silakan tambah data!
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection