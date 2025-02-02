@extends('admin.layout')

@section('content')
<div class="container">
    <h1>Daftar Penerbit</h1>
    <a href="{{ route('penerbit.create') }}" class="btn btn-primary mb-3">Tambah Penerbit</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Kode Penerbit</th>
                <th>Nama Penerbit</th>
                <th>Email</th>
                <th>No Telp</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penerbit as $item)
                <tr>
                    <td>{{ $item->kode_penerbit }}</td>
                    <td>{{ $item->nama_penerbit }}</td>
                    <td>{{ $item->email }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>
                        <a href="{{ route('penerbit.edit', $item->id_penerbit) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('penerbit.show', $item->id_penerbit) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('penerbit.destroy', $item->id_penerbit) }}" method="POST"
                            style="display:inline-block;">
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