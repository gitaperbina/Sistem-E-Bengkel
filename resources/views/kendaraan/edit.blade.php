<!-- resources/views/kendaraan/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Kendaraan</h2>

    <form action="{{ route('kendaraan.update', $kendaraan->id) }}" method="POST">
        @csrf
        @method('PUT')  {{-- Method Spoofing untuk PUT --}}

        <div class="mb-3">
            <label>Plat Nomor</label>
            <input type="text" name="plat_nomor" class="form-control" value="{{ old('plat_nomor', $kendaraan->plat_nomor) }}" required>
        </div>

        <div class="mb-3">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" value="{{ old('nama_pemilik', $kendaraan->nama_pemilik) }}" required>
        </div>

        <div class="mb-3">
            <label>Merk Kendaraan</label>
            <input type="text" name="merk_kendaraan" class="form-control" value="{{ old('merk_kendaraan', $kendaraan->merk_kendaraan) }}" required>
        </div>

        <div class="mb-3">
            <label>Keluhan</label>
            <textarea name="keluhan" class="form-control" rows="3" required>{{ old('keluhan', $kendaraan->keluhan) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('kendaraan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection