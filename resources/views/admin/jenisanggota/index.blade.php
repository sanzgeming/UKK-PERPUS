@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Jenis Anggota</h1>
    <a href="{{ route('jenisanggota.create') }}" class="btn btn-primary">Tambah Jenis Anggota</a>
    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Jenis Anggota</th>
                <th>Maksimal Pinjam</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisAnggota as $item)
                <tr>
                    <td>{{ $item->kode_jenis_anggota }}</td>
                    <td>{{ $item->jenis_anggota }}</td>
                    <td>{{ $item->max_pinjam }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>
                        <a href="{{ route('jenisanggota.edit', $item->id_jenis_anggota) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('jenisanggota.destroy', $item->id_jenis_anggota) }}" method="POST"
                            class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Hapus jenis anggota ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection