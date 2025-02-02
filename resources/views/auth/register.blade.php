<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header bg-primary text-white text-center">
                        <h3>Registrasi Anggota</h3>
                    </div>
                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_anggota" class="form-label">Nama Lengkap</label>
                                <input type="text" name="nama_anggota" id="nama_anggota" class="form-control"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>
                            <div class="mb-4">
                                <label for="id_jenis_anggota" class="block text-gray-700">Jenis Anggota</label>
                                <select name="id_jenis_anggota" id="id_jenis_anggota"
                                    class="w-full p-2 border rounded form-control" required>
                                    @foreach ($jenisAnggota as $jenis)
                                        @if ($jenis->id_jenis_anggota != 3)
                                            <!-- Exclude Pustakawan with id_jenis_anggota == 3 -->
                                            <option value="{{ $jenis->id_jenis_anggota }}">{{ $jenis->jenis_anggota }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tempat" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat" id="tempat" class="form-control"
                                    placeholder="Masukkan tempat lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    placeholder="Masukkan alamat" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp" class="form-label">No. Telepon</label>
                                <input type="text" name="no_telp" id="no_telp" class="form-control"
                                    placeholder="Masukkan nomor telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Masukkan email" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <input type="file" name="foto" id="foto" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" id="username" class="form-control"
                                    placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Masukkan password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control" placeholder="Konfirmasi password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">Sudah punya akun? <a href="/login" class="text-primary">Masuk di
                                sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>