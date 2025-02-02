@extends('user.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">Daftar Transaksi</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Keterangan</th>
                    <th>Dikembalikan</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($transaksi as $index => $trans)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td>{{ $trans->pustaka->judul_pustaka }}</td>
                        <td class="text-center">{{ $trans->tgl_pinjam }}</td>
                        <td class="text-center">{{ $trans->tgl_kembali }}</td>
                        <td class="text-center">{{ $trans->tgl_pengembalian ?? '-' }}</td>
                        <td>{{ $trans->keterangan }}</td>
                        <td class="text-center">
                            <span class="badge bg-{{ $trans->fp == '0' ? 'danger' : 'success' }}">
                                {{ $trans->fp == '0' ? 'Belum Dikembalikan' : 'Sudah Dikembalikan' }}
                            </span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center text-muted">Anda belum memiliki transaksi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection