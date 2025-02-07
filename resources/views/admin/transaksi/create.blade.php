@extends('admin.layout')

@section('content')
<form action="{{ route('transaksi.store') }}" method="POST">
    @csrf

    <div class="mt-4 mb-4">
        <label for="id_pustaka" class="block text-gray-700">Buku</label>
        <select name="id_pustaka" id="id_pustaka" required class="w-full p-2 border rounded form-control">
            <option value="">-- Pilih Buku --</option>
            @foreach ($pustakas as $pustaka)
                <option value="{{ $pustaka->id_pustaka }}" {{ old('id_pustaka') == $pustaka->id_pustaka ? 'selected' : '' }}>
                    {{ $pustaka->judul_pustaka }}
                </option>
            @endforeach
        </select>
        @error('id_pustaka')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="id_anggota" class="block text-gray-700">Anggota</label>
        <select name="id_anggota" id="id_anggota" required class="w-full p-2 border rounded form-control">
            <option value="">-- Pilih Anggota --</option>
            @foreach ($anggotas as $anggota)
                <option value="{{ $anggota->id_anggota }}" {{ old('id_anggota') == $anggota->id_anggota ? 'selected' : '' }}>
                    {{ $anggota->nama_anggota }}
                </option>
            @endforeach
        </select>
        @error('id_anggota')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="tgl_pinjam" class="block text-gray-700">Tanggal Pinjam</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam" required class="w-full p-2 border rounded form-control"
            value="{{ old('tgl_pinjam') }}">
        @error('tgl_pinjam')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="tgl_kembali" class="block text-gray-700">Tanggal Kembali</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali" required class="w-full p-2 border rounded form-control"
            value="{{ old('tgl_kembali') }}">
        @error('tgl_kembali')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="keterangan" class="block text-gray-700">Keterangan</label>
        <input type="text" name="keterangan" id="keterangan" class="w-full p-2 border rounded form-control"
            value="{{ old('keterangan') }}">
        @error('keterangan')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <label for="fp" class="block text-gray-700">Status Peminjaman</label>
        <select name="fp" id="fp" required class="w-full p-2 border rounded form-control">
            <option value="0" {{ old('fp') == '0' ? 'selected' : '' }}>Belum Selesai</option>
            <option value="1" {{ old('fp') == '1' ? 'selected' : '' }}>Selesai</option>
        </select>
        @error('fp')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-4">
        <a href="{{ route('transaksi.index') }}" class="btn btn-secondary me-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
</form>
<script>
    // Fungsi untuk mengupdate tanggal kembali otomatis setelah memilih tanggal pinjam
    document.getElementById('tgl_pinjam').addEventListener('change', function () {
        const tglPinjam = new Date(this.value);
        const tglKembali = new Date(tglPinjam);
        tglKembali.setDate(tglPinjam.getDate() + 7); // 7 hari setelah tanggal pinjam
        document.getElementById('tgl_kembali').value = tglKembali.toISOString().split('T')[0];
    });
</script>
@endsection