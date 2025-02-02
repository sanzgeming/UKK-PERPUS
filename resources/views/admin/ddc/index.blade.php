@extends('admin.layout')

@section('content')
<h1>Data DDC</h1>
<a href="{{ route('ddc.create') }}" class="btn btn-primary">Tambah DDC</a>

<table class="table">
    <thead>
        <tr>
            <th>Kode DDC</th>
            <th>DDC</th>
            <th>Rak</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ddcs as $ddc)
            <tr>
                <td>{{ $ddc->kode_ddc }}</td>
                <td>{{ $ddc->ddc }}</td>
                <td>{{ $ddc->rak->rak }}</td>
                <td>{{ $ddc->keterangan }}</td>
                <td>
                    <a href="{{ route('ddc.edit', $ddc->id_ddc) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('ddc.destroy', $ddc->id_ddc) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection