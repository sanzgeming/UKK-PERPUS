@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Pustaka</h1>
    <a href="{{ route('pustaka.create') }}" class="btn btn-primary mb-3">Tambah Pustaka</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pustaka</th>
                <th>Judul</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pustakas as $pustaka)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pustaka->kode_pustaka }}</td>
                    <td>{{ $pustaka->judul_pustaka }}</td>
                    <td>{{ $pustaka->tahun_terbit }}</td>
                    <td>
                        <a href="{{ route('pustaka.show', $pustaka->id_pustaka) }}" class="btn btn-info">Lihat</a>
                        <a href="{{ route('pustaka.edit', $pustaka->id_pustaka) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pustaka.destroy', $pustaka->id_pustaka) }}" method="POST"
                            style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection