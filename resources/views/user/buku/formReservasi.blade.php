@extends('user.layout')

@section('content')
<div class="container py-5">
    <form action="{{ route('buku.storeReservasi') }}" method="POST" class="bg-light p-4 rounded shadow-sm">
        @csrf
        <input type="hidden" name="id_pustaka" value="{{ $buku->id_pustaka }}">
        <input type="hidden" id="id_anggota" name="id_anggota" value="{{ auth()->user()->id_anggota }}">

        <!-- Tanggal Pinjam -->
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label fw-bold">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam"
                class="form-control @error('tgl_pinjam') is-invalid @enderror" value="{{ old('tgl_pinjam') }}" required>
            @error('tgl_pinjam')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Tanggal Kembali -->
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label fw-bold">Tanggal Kembali</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali"
                class="form-control @error('tgl_kembali') is-invalid @enderror" value="{{ old('tgl_kembali') }}"
                required>
            @error('tgl_kembali')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label for="keterangan" class="form-label fw-bold">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan"
                class="form-control @error('keterangan') is-invalid @enderror" maxlength="50"
                value="{{ old('keterangan') }}" required>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="d-flex justify-content-end">
        <a href="{{ route('buku.detail', ['id' => $buku->id_pustaka]) }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Buat Reservasi</button>
        </div>
    </form>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

</div>
@endsection