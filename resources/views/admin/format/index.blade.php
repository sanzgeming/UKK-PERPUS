@extends('admin.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Format</h1>
    <a href="{{ route('formats.create') }}" class="btn btn-primary mb-3">Tambah Format</a>
    <table class="table table-boardered">
        <thead>
            <tr>
                <th>Kode Format</th>
                <th>Format</th>
                <th>Keterangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($formats as $format)
                <tr>
                    <td>{{ $format->kode_format }}</td>
                    <td>{{ $format->format }}</td>
                    <td>{{ $format->keterangan }}</td>
                    <td>
                        <a href="{{ route('formats.edit', $format->id_format) }}"
                            class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('formats.destroy', $format->id_format) }}" method="POST"
                            style="display:inline;">
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