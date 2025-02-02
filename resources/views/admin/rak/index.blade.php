@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Rak</h1>
    <a href="{{ route('rak.create') }}" class="btn btn-primary mb-3">Tambah Rak</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Rak</th>
                <th>Rak</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($raks as $rak)
                <tr>
                    <td>{{ $rak->kode_rak }}</td>
                    <td>{{ $rak->rak }}</td>
                    <td>{{ $rak->keterangan }}</td>
                    <td>
                        <a href="{{ route('rak.edit', $rak->id_rak) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('rak.destroy', $rak->id_rak) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus rak ini?');">
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