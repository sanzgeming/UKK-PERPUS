@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Tambah Penerbit</h1>
    <form action="{{ route('penerbit.store') }}" method="POST">
        @csrf
        <div class="form-group mb-2">
            <label for="kode_penerbit" class="block text-sm font-medium text-gray-700">Kode Penerbit</label>
            <input type="text" name="kode_penerbit" id="kode_penerbit"
                value="{{ old('kode_penerbit', $penerbit->kode_penerbit ?? '') }}" placeholder="PN123"
                class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            @error('kode_penerbit')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-2">
            <label>Nama Penerbit</label>
            <input type="text" name="nama_penerbit" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Alamat</label>
            <input type="text" name="alamat_penerbit" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>No Telp</label>
            <input type="text" name="no_telp" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Fax</label>
            <input type="text" name="fax" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Website</label>
            <input type="text" name="website" class="form-control">
        </div>
        <div class="form-group mb-2">
            <label>Kontak</label>
            <input type="text" name="kontak" class="form-control" required>
        </div>
        <a href="{{ route('penerbit.index') }}" class="btn btn-secondary mt-3 me-2">Kembali</a>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
</div>
@endsection