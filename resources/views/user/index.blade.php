<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Tema Modern */
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

        /* Jumbotron Modern */
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

        /* Horizontal Line */
        hr.custom-line {
            border-top: 3px solid #444;
            margin: 40px 0;
        }

        /* About Section */


        .card-custom:hover {
            transform: translateY(-10px);
        }

        .card-custom .card-body {
            padding: 40px;
            text-align: center;
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

        /* Responsive Cards */
        @media (max-width: 768px) {
            .card-custom {
                margin-bottom: 20px;
            }
        }

        /* Scroll Effect */
        .hidden {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.5s ease-out, transform 0.5s ease-out;
        }

        .visible {
            opacity: 1;
            transform: translateY(0);

            /* Style khusus untuk card */
            .card {
                border-radius: 1rem;
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.2);
            }

            .icon-wrapper {
                width: 80px;
                height: 80px;
                margin: 0 auto;
            }

            .icon-image {
                width: 100%;
                height: 100%;
                object-fit: contain;
            }

            .card-title {
                font-size: 1.5rem;
            }

            .card-text {
                font-size: 1rem;
            }

        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-10px);
            /* Efek mengangkat kartu */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Efek bayangan */
        }

        .card-hover:hover .card-title {
            color: #ffffff;
            /* Ganti warna judul saat hover */
        }

        .card-hover:hover .card-text {
            color: #ffffff;
            /* Ganti warna teks deskripsi saat hover */
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="">Perpustakaan Sekolah</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger me-2" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Jumbotron Section -->
    <section id="home" class="jumbotron">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="left-content">
                @if(Auth::check()) <!-- Memastikan pengguna sudah login -->
                    <h1>Selamat Datang di Perpustakaan Sekolah, {{ Auth::user()->nama_anggota }}</h1>
                @else
                          @endif
                <p class="lead">Temukan buku favoritmu dan lakukan peminjaman dengan cepat dan mudah.</p>
                <a href="#about" class="btn btn-success mt-3">Pelajari Lebih Lanjut</a>
            </div>
            <div class="right-content">
                <img src="{{ asset('storage/images/lovepik.png') }}" alt="Library Image" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <!-- Horizontal Line -->
    <hr class="custom-line">

    <section id="about" class="container py-5 mb-5">
        <div class="row g-4">
            <!-- Card 1 - Koleksi Buku -->
            <div class="col-md-6">
                <a href="{{ route('user.buku.index') }}" class="card-custom h-100 text-decoration-none">
                    <div class="card h-100 shadow-lg border-0 text-light card-hover"
                        style="background-color: #1f1f1f;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body text-center">
                            <div class="icon-wrapper mb-3">
                                <i class="bi bi-book text-light" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="card-title text-white fw-bold">Daftar Buku</h3>
                            <p class="card-text mt-2">
                                Daftar buku yang tersedia untuk dipinjam, mulai dari buku pelajaran hingga novel
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Card 2 - Sistem Peminjaman -->
            <div class="col-md-6">
                <a href="{{ route('buku.transaksi') }}" class="card-custom h-100 text-decoration-none">
                    <div class="card h-100 shadow-lg border-0 text-light card-hover"
                        style="background-color: #1f1f1f;box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);">
                        <div class="card-body text-center">
                            <div class="icon-wrapper mb-3">
                                <i class="bi bi-journal-check text-light" style="font-size: 3rem;"></i>
                            </div>
                            <h3 class="card-title text-white fw-bold">Riwayat Transaksi</h3>
                            <p class="card-text mt-2">
                                Lihat riwayat peminjaman buku yang telah dilakukan atau sedang berlangsung.
                            </p>
                        </div>
                    </div>
                </a>
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
                            <a href="https://www.instagram.com/smkantartika1sda?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw=="
                                class="text-light"><i class="bi bi-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-light"><i class="bi bi-linkedin"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://youtube.com/@smkantartika1sidoarjo726?si=HVdGlSohXCPsBSlK"
                                class="text-light"><i class="bi bi-youtube"></i></a>
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
    <script>
        // Efek scroll untuk menampilkan elemen saat scroll
        window.addEventListener('scroll', function () {
            const elements = document.querySelectorAll('.hidden');
            elements.forEach(element => {
                const position = element.getBoundingClientRect();
                if (position.top < window.innerHeight && position.bottom >= 0) {
                    element.classList.add('visible');
                }
            });
        });
    </script>
</body>

</html>