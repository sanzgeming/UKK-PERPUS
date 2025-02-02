@extends('admin.layout')

@section('content')
<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-semibold">Daftar Pengarang</h1>
        <a href="{{ route('pengarang.create') }}" class="btn btn-primary">Tambah Pengarang</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th class="px-4 py-2">Kode Pengarang</th>
                <th class="px-4 py-2">Nama Pengarang</th>
                <th class="px-4 py-2">No Telp</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengarangs as $pengarang)
                <tr>
                    <td class="px-4 py-2">{{ $pengarang->kode_pengarang }}</td>
                    <td class="px-4 py-2">{{ $pengarang->nama_pengarang }}</td>
                    <td class="px-4 py-2">{{ $pengarang->no_telp }}</td>
                    <td class="px-4 py-2">{{ $pengarang->email }}</td>
                    <td class="px-4 py-2">
                    <a href="{{ route('pengarang.edit', $pengarang->id_pengarang) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('pengarang.show', $pengarang->id_pengarang) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('pengarang.destroy', $pengarang->id_pengarang) }}" method="POST"
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