<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Sekolah</title>
    <script src="https://kit.fontawesome.com/1165876da6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Tema Gelap Modern */
        body {
            font-family: 'Poppins', sans-serif;
            color: #ddd;
            background-color: #333;
        }

        .navbar-brand {
            font-weight: 600;
            font-size: 1.5rem;
            color: white !important;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 1.1rem;
        }

        /* Jumbotron */
        .jumbotron {
            padding: 150px 0;
            background-color: #333;
        }

        .jumbotron .left-content {
            text-align: left;
        }

        .jumbotron h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: #fff;
        }

        .jumbotron p {
            font-size: 1.25rem;
            color: #bbb;
        }

        .right-content img {
            width: 100%;
            max-width: 450px;
            height: auto;
            border-radius: 20px;
        }

        /* Tombol */
        .btn {
            transition: all 0.3s ease-in-out;
        }

        .btn:hover {
            transform: translateY(-3px);
        }

        /* Card Styling */
        .card-custom {
            background-color: #1f1f1f;
            color: #ddd;
            text-align: center;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Footer Styling */
        footer {
            background-color: #000;
            color: white;
            padding: 30px 0;
        }

        footer ul {
            padding: 0;
            list-style: none;
        }

        footer .contact-item {
            display: flex;
            align-items: flex-start;
            /* Supaya ikon sejajar dengan awal teks */
            margin-bottom: 12px;
        }

        footer .contact-item i {
            margin-right: 10px;
            font-size: 1.2rem;
            min-width: 20px;
            /* Ikon memiliki lebar tetap untuk menjaga keselarasan */
        }

        footer .list-inline-item a {
            margin-right: 10px;
            font-size: 1.5rem;
        }

        /* Horizontal Line */
        hr.custom-line {
            border-top: 3px solid #444;
            margin: 40px 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Perpustakaan Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary me-2" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron Section -->
    <section id="home" class="jumbotron">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="left-content">
                <h1>Selamat Datang di Perpustakaan Sekolah</h1>
                <p class="lead">Temukan buku favoritmu dan kelola keanggotaan perpustakaan dengan mudah dan cepat.</p>
                <a href="#about" class="btn btn-success mt-3">Pelajari Lebih Lanjut</a>
            </div>
            <div class="right-content">
                <img src="{{ asset('storage/images/lovepik.png') }}" alt="Library Image" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <!-- Horizontal Line -->
    <hr class="custom-line">

    <!-- Informasi Statistik -->
    <section id="about" class="container py-5">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-custom">
                    <i class="bi bi-people text-primary" style="font-size: 3rem;"></i>
                    <h3 class="mt-3">Total Anggota</h3>
                    <h2 class="card-text">{{ $totalAnggota }}</h2>
                    <p class="mt-2">Jumlah anggota aktif yang terdaftar.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom">
                    <i class="bi bi-book text-success" style="font-size: 3rem;"></i>
                    <h3 class="mt-3">Total Buku</h3>
                    <h2 class="card-text">{{ $totalBuku }}</h2>
                    <p class="mt-2">Jumlah buku yang tersedia.</p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card-custom">
                    <i class="bi bi-journal-check text-warning" style="font-size: 3rem;"></i>
                    <h3 class="mt-3">Total Transaksi</h3>
                    <h2 class="card-text">{{ $totalTransaksi }}</h2>
                    <p class="mt-2">Total peminjaman dan pengembalian buku.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5">
        <div class="container">
            <div class="row">
                <!-- Follow Us Section -->
                <div class="col-md-4 mb-4 text-md-start text-center">
                    <h4>Follow Us</h4>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="text-light"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-light"><i class="bi bi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.instagram.com/smkantartika1sda?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" class="text-light"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://youtube.com/@smkantartika1sidoarjo726?si=HVdGlSohXCPsBSlK" class="text-light"><i class="bi bi-youtube"></i></a>
                        </li>
                    </ul>
                </div>

                <!-- Logo Sekolah Section -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="{{ asset('storage/images/antartika.png') }}" alt="Logo Sekolah Antartika"
                        class="img-fluid" style="max-width: 200px;">
                </div>

                <!-- Contact Us Section -->
                <div class="col-md-4 mb-4 text-md-start text-center">
                    <h4>Contact Us</h4>
                    <ul class="list-unstyled">
                        <li class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <span>Email: smkantartika1@example.com</span>
                        </li>
                        <li class="contact-item">
                            <i class="bi bi-telephone-fill"></i>
                            <span>Telepon: (031) 8962851</span>
                        </li>
                        <li class="contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Alamat: Jalan Raya Siwalan Panji, Bedrek, Siwalanpanji, Kec. Sidoarjo, Kabupaten
                                Sidoarjo, Jawa Timur 61252</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="text-center py-3 border-top mt-4">
                <p class="mb-0">&copy; 2023 Your Company. All Rights Reserved.</p>
            </div>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>