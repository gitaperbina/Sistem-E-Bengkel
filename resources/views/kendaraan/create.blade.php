@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">📝 Form Tambah Kendaraan</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ url('/kendaraan') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="plat_nomor" class="form-label">Plat Nomor <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('plat_nomor') is-invalid @enderror" 
                               id="plat_nomor" 
                               name="plat_nomor" 
                               value="{{ old('plat_nomor') }}"
                               placeholder="Contoh: BK 1234 XX" 
                               required>
                        @error('plat_nomor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_pemilik" class="form-label">Nama Pemilik <span class="text-danger">*</span></label>
                        <input type="text" 
                               class="form-control @error('nama_pemilik') is-invalid @enderror" 
                               id="nama_pemilik" 
                               name="nama_pemilik" 
                               value="{{ old('nama_pemilik') }}"
                               placeholder="Masukkan nama pemilik" 
                               required>
                        @error('nama_pemilik')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="merk_kendaraan" class="form-label">Merk Kendaraan <span class="text-danger">*</span></label>
                        <select class="form-select @error('merk_kendaraan') is-invalid @enderror" 
                                id="merk_kendaraan" 
                                name="merk_kendaraan" 
                                required>
                            <option value="">Pilih Merk Kendaraan</option>
                            <option value="Honda" {{ old('merk_kendaraan') == 'Honda' ? 'selected' : '' }}>Honda</option>
                            <option value="Yamaha" {{ old('merk_kendaraan') == 'Yamaha' ? 'selected' : '' }}>Yamaha</option>
                            <option value="Suzuki" {{ old('merk_kendaraan') == 'Suzuki' ? 'selected' : '' }}>Suzuki</option>
                            <option value="Kawasaki" {{ old('merk_kendaraan') == 'Kawasaki' ? 'selected' : '' }}>Kawasaki</option>
                            <option value="Toyota" {{ old('merk_kendaraan') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                            <option value="Daihatsu" {{ old('merk_kendaraan') == 'Daihatsu' ? 'selected' : '' }}>Daihatsu</option>
                            <option value="Mitsubishi" {{ old('merk_kendaraan') == 'Mitsubishi' ? 'selected' : '' }}>Mitsubishi</option>
                        </select>
                        @error('merk_kendaraan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan <span class="text-danger">*</span></label>
                        <textarea class="form-control @error('keluhan') is-invalid @enderror" 
                                  id="keluhan" 
                                  name="keluhan" 
                                  rows="4" 
                                  placeholder="Jelaskan kerusakan/keluhan kendaraan" 
                                  required>{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="{{ url('/kendaraan') }}" class="btn btn-secondary">❌ Batal</a>
                        <button type="submit" class="btn btn-success">💾 Simpan Kendaraan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection