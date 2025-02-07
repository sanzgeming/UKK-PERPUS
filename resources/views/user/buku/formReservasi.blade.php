@extends('user.layout')

@section('content')
<div class="container py-5">
    <form action="{{ route('buku.storeReservasi', ['id' => $buku->id_pustaka]) }}" method="POST"
        class="bg-light p-4 rounded shadow-sm">
        @csrf
        <input type="hidden" name="id_pustaka" value="{{ $buku->id_pustaka }}">
        <input type="hidden" name="id_anggota" value="{{ auth()->user()->id_anggota }}">

        <!-- Tanggal Pinjam -->
        <div class="mb-3">
            <label for="tgl_pinjam" class="form-label fw-bold">Tanggal Pinjam</label>
            <input type="date" id="tgl_pinjam" name="tgl_pinjam" class="form-control" min="{{ now()->format('Y-m-d') }}"
                value="{{ now()->format('Y-m-d') }}" required onchange="updateTanggalKembali()">
        </div>

        <!-- Tanggal Kembali (Read-Only) -->
        <div class="mb-3">
            <label for="tgl_kembali" class="form-label fw-bold">Tanggal Kembali</label>
            <input type="date" id="tgl_kembali" name="tgl_kembali" class="form-control"
                value="{{ now()->addDays(7)->format('Y-m-d') }}" readonly>
        </div>

        <!-- Keterangan -->
        <div class="mb-3">
            <label for="keterangan" class="form-label fw-bold">Keterangan</label>
            <input type="text" id="keterangan" name="keterangan"
                class="form-control @error('keterangan') is-invalid @enderror" maxlength="50" required>
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Informasi Denda -->
        <div class="alert alert-info">
            <p>Denda Keterlambatan: Rp {{ number_format($buku->denda_terlambat, 0, ',', '.') }}</p>
            <p>Denda Kehilangan: Rp {{ number_format($buku->denda_hilang, 0, ',', '.') }}</p>
            <p><strong>Note:</strong></p>
            <ul>
                <li>Keterlambatan kurang dari 4 hari akan dikenakan <strong>denda keterlambatan</strong>.</li>
                <li>Keterlambatan 5 hari atau lebih akan dikenakan <strong>denda kehilangan</strong>.</li>
            </ul>
        </div>

        <!-- Tombol Submit -->
        <div class="d-flex justify-content-end">
            <a href="{{ route('buku.detail', ['id' => $buku->id_pustaka]) }}" class="btn btn-secondary me-2">Kembali</a>
            <button type="submit" class="btn btn-primary">Buat Reservasi</button>
        </div>
    </form>

    <script>
        function updateTanggalKembali() {
            const tglPinjamInput = document.getElementById('tgl_pinjam');
            const tglKembaliInput = document.getElementById('tgl_kembali');

            if (tglPinjamInput.value) {
                const tglPinjam = new Date(tglPinjamInput.value);
                tglPinjam.setDate(tglPinjam.getDate() + 7); // Menambahkan 7 hari ke tanggal pinjam
                tglKembaliInput.value = tglPinjam.toISOString().split('T')[0]; // Memperbarui tanggal kembali
            }
        }

        // Memanggil fungsi pertama kali untuk mengatur tanggal kembali berdasarkan default tanggal pinjam
        updateTanggalKembali();
    </script>

    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection