@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-semibold mb-4">Tambah Pengarang</h1>

    <form action="{{ route('pengarang.store') }}" method="POST">
        @csrf
        <!-- Kode Pengarang -->
        <div class="form-group mb-2">
            <label for="kode_pengarang" class="block text-sm font-medium text-gray-700 mb-2">Kode Pengarang</label>
            <input type="text" name="kode_pengarang" id="kode_pengarang" class="form-control w-full"
                placeholder="Contoh: PG001" value="{{ old('kode_pengarang') }}" required>
                <small class="text-muted">Kode harus diawali dengan "PG" diikuti angka.</small>
            @error('kode_pengarang')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <!-- Gelar Depan -->
        <div class="form-group mb-2">
            <label for="gelar_depan" class="block text-sm font-medium text-gray-700 mb-2">Gelar Depan</label>
            <input type="text" name="gelar_depan" id="gelar_depan" class="form-control w-full" placeholder="Contoh: Dr."
                value="{{ old('gelar_depan') }}">
        </div>

        <!-- Nama Pengarang -->
        <div class="form-group mb-2">
            <label for="nama_pengarang" class="block text-sm font-medium text-gray-700 mb-2">Nama Pengarang</label>
            <input type="text" name="nama_pengarang" id="nama_pengarang" class="form-control w-full"
                placeholder="Nama lengkap pengarang" value="{{ old('nama_pengarang') }}" required>
        </div>

        <!-- Gelar Belakang -->
        <div class="form-group mb-2">
            <label for="gelar_belakang" class="block text-sm font-medium text-gray-700 mb-2">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" id="gelar_belakang" class="form-control w-full"
                placeholder="Contoh: M.Sc." value="{{ old('gelar_belakang') }}">
        </div>

        <!-- No Telepon -->
        <div class="form-group mb-2">
            <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-2">No Telepon</label>
            <input type="text" name="no_telp" id="no_telp" class="form-control w-full"
                placeholder="Contoh: 081234567890" value="{{ old('no_telp') }}" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-2">
            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input type="email" name="email" id="email" class="form-control w-full"
                placeholder="Contoh: email@domain.com" value="{{ old('email') }}" required>
        </div>

        <!-- Website -->
        <div class="form-group mb-2">
            <label for="website" class="block text-sm font-medium text-gray-700 mb-2">Website</label>
            <input type="url" name="website" id="website" class="form-control w-full"
                placeholder="Contoh: https://website.com" value="{{ old('website') }}">
        </div>

        <!-- Biografi -->
        <div class="form-group mb-2">
            <label for="biografi" class="block text-sm font-medium text-gray-700 mb-2">Biografi</label>
            <textarea name="biografi" id="biografi" class="form-control w-full" rows="5"
                placeholder="Tuliskan biografi pengarang">{{ old('biografi') }}</textarea>
        </div>

        <!-- Keterangan -->
        <div class="form-group mb-2">
            <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control w-full" placeholder="Contoh: Aktif"
                value="{{ old('keterangan') }}">
        </div>

        <!-- Tombol Simpan -->
        <div class="form-group">
            <a href="{{ route('pengarang.index') }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection