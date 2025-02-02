@extends('admin.layout')

@section('content')
<h1 class="text-2xl font-bold mb-4">Daftar Transaksi</h1>

<div class="mb-4">
    <a href="{{ route('transaksi.create') }}" class="btn btn-primary">Tambah Transaksi</a>
</div>

@if(session('success'))
    <div class="alert alert-success mb-4">
        {{ session('success') }}
    </div>
@endif

<table class="table-auto min-w-full bg-white shadow-md rounded-lg">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-4 py-2 text-center">ID</th>
            <th class="border px-4 py-2 text-center">Buku</th>
            <th class="border px-4 py-2 text-center">Anggota</th>
            <th class="border px-4 py-2 text-center">Tanggal Pinjam</th>
            <th class="border px-4 py-2 text-center">Tanggal Kembali</th>
            <th class="border px-4 py-2 text-center">Tanggal Pengembalian</th>
            <th class="border px-4 py-2 text-center">Status</th>
            <th class="border px-4 py-2 text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transaksis as $transaksi)
            <tr class="hover:bg-gray-100">
                <td class="border px-4 py-2">{{ $transaksi->id_transaksi }}</td>
                <td class="border px-4 py-2">{{ $transaksi->pustaka->judul_pustaka }}</td>
                <td class="border px-4 py-2">{{ $transaksi->anggota->nama_anggota }}</td>
                <td class="border px-4 py-2">{{ $transaksi->tgl_pinjam }}</td>
                <td class="border px-4 py-2">{{ $transaksi->tgl_kembali }}</td>
                <td class="border px-4 py-2">{{ $transaksi->tgl_pengembalian ?? '-' }}</td>
                <td class="border px-4 py-2">
                    <span class="{{ $transaksi->fp == '0' ? 'text-red-500' : 'text-green-500' }}">
                        {{ $transaksi->fp == '0' ? 'Dipinjam' : 'Selesai' }}
                    </span>
                </td>
                <td class="border px-4 py-2">
                    <a href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}"
                        class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST" class="d-inline"
                        onsubmit="return confirm('Apakah anda yakin ingin menghapus transaksi ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection