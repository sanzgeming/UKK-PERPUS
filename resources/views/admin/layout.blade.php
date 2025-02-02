<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <!-- Menambahkan FontAwesome untuk ikon -->
    <style>
        /* Sidebar styling */
        .sidebar {
            background: linear-gradient(135deg, #6c5ce7, #00b894);
            height: 100vh;
            padding-top: 20px;
            position: fixed;
            padding-right: 25px;
            padding-left: 25px
        }

        .sidebar .list-unstyled li a {
            transition: all 0.3s ease-in-out;
            padding: 10px 15px;
            border-radius: 8px;
            color: white;
            font-size: 16px;
        }

        .sidebar .list-unstyled li a:hover {
            background-color: #ffffff;
            color: #000000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            color: #fff;
            font-size: 22px;
            margin-bottom: 20px;
        }

        .sidebar p {
            color: #fff;
            font-size: 14px;
        }

        .sidebar .list-unstyled li {
            margin-bottom: 10px;
        }

        .sidebar i {
            margin-right: 10px;
        }

        /* Hover effects */
        .sidebar .list-unstyled li a:hover {
            transform: scale(1.1);
        }
    </style>
</head>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 p-0">
                <div class="sidebar text-white">
                    <div class="mb-5">
                        <h4>Admin Dashboard</h4>
                        <p class="text-center">Welcome Admin</p>
                    </div>
                    <ul class="list-unstyled">
                        <!-- Menu Dashboard -->
                        <li><a href="{{ route('admin.dashboard') }}" class=" d-block"><i
                                    class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                        <li><a href="{{ route('transaksi.index') }}" class=" d-block"><i
                                    class="fas fa-tachometer-alt"></i> Transaksi</a></li>
                        <li><a href="{{ route('anggota.index') }}" class=" d-block"><i class="fas fa-users"></i>
                                Anggota</a></li>
                        <li><a href="{{ route('jenisanggota.index') }}" class=" d-block"><i
                                    class="fas fa-address-card"></i> Jenis Anggota</a></li>
                        <li><a href="{{ route('ddc.index') }}" class=" d-block"><i class="fas fa-sitemap"></i>
                                Ddc</a></li>
                        <li><a href="{{ route('formats.index') }}" class=" d-block"><i class="fas fa-cogs"></i>
                                Formats</a></li>
                        <li><a href="{{ route('rak.index') }}" class=" d-block"><i class="fas fa-box"></i>
                                Rak</a></li>
                        <li><a href="{{ route('penerbit.index') }}" class=" d-block"><i class="fas fa-print"></i>
                                Penerbit</a></li>
                        <li><a href="{{ route('pengarang.index') }}" class=" d-block"><i class="fas fa-pen"></i>
                                Pengarang</a></li>
                        <li><a href="{{ route('pustaka.index') }}" class=" d-block"><i class="fas fa-book"></i>
                                Pustaka</a></li>
                        <li>
                            <a href="{{ route('logout') }}" class="d-block btn btn-danger btn-sm">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 mt-3">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>