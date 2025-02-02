@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Anggota</h1>
    <a href="{{ route('anggota.create') }}" class="btn btn-primary mb-3">Tambah Anggota</a>
    <table class="table">
        <thead>
            <tr>
                <th>Kode Anggota</th>
                <th>Nama Anggota</th>
                <th>Jenis Anggota</th>
                <th>Status Akun</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($anggota as $item)
                <tr>
                    <td>{{ $item->kode_anggota }}</td>
                    <td>{{ $item->nama_anggota }}</td>
                    <td>{{ $item->jenisAnggota->jenis_anggota }}</td>
                    <td>
                        @if($item->fa == 'Y')
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Non-Aktif</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('anggota.show', $item->id_anggota) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('anggota.edit', $item->id_anggota) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('anggota.destroy', $item->id_anggota) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection