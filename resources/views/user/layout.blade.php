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
        html,
        body {
            height: 100%;
            margin: 0;
            /* display: flex; */
            flex-direction: column;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* Navbar Styling */
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
            background-image: url('https://source.unsplash.com/1600x900/?library,books');
            background-size: cover;
            background-position: center;
            color: #4CAF50;
            padding: 120px 0;
            border-bottom: 5px solid #fff;
        }

        .jumbotron h1 {
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .jumbotron p {
            font-size: 1.25rem;
        }

        .btn-theme {
            background-color: #ff8c00;
            color: white;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 30px;
            transition: background-color 0.3s;
        }

        .btn-theme:hover {
            background-color: #ff5722;
        }

        /* About Section */
        .about-section {
            padding: 80px 0;
            background-color: #f1f1f1;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 600;
            color: #4CAF50;
            text-transform: uppercase;
            margin-bottom: 40px;
        }

        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border: none;
            transition: transform 0.3s;
        }

        .card-custom:hover {
            transform: translateY(-10px);
        }

        .card-custom .card-body {
            padding: 40px;
            text-align: center;
        }

        .main-content {
            min-height: 100vh;
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
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.index') }}">Perpustakaan Sekolah</a>
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

    <!-- Main Content -->
    <div class="main-content mt-5">
        @yield('content')
    </div>

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
</body>

</html>