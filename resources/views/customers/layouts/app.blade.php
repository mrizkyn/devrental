<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>DevRental</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('executive/public/assets/img/favicons/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('executive/public/assets/img/favicons/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('executive/public/assets/img/favicons/favicon-16x16.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('executive/public/assets/img/favicons/favicon.ico') }}">
    <link rel="manifest" href="{{ asset('executive/public/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('executive/public/assets/img/favicons/mstile-150x150.png') }}">
    <meta name="theme-color" content="#ffffff">

    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('executive/public/assets/css/theme.css') }}" rel="stylesheet" />
    <link href="{{ asset('executive/public/assets/css/footer.css') }}" rel="stylesheet" />

    <style>
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        main {
            flex: 1;
        }

        #home {
            background: #f8f9fa;
        }

        #home h1 span.text-primary {
            color: #102C42;
        }

        #home .btn-primary {
            background-color: #102C42;
            border: none;
        }

        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 387px;
            margin: auto;
        }

        .search-input {
            width: 100%;
            padding: 12px 20px;
            border: 1px solid #102C42;
            border-radius: 25px 0 0 25px;
            font-size: 16px;
            outline: none;
        }

        .search-button {
            padding: 12px 20px;
            background-color: #102C42;
            border: 1px solid #102C42;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            color: #102C42;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-button svg {
            fill: white;
        }

        .search-button:hover {
            background-color: #173f5e;
        }

        .img-container {
            width: 150px;
            height: 100px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-image {
            width: 100%;
            height: auto;
        }

        .img-container img {
            width: auto;
            height: 100%;
        }

        #footer {
            background-color: #102C42;
            margin-top: auto;
        }
    </style>
</head>

<body>

    @include('customers.layouts.nav')

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @yield('content')
    </main>

    <!-- ============================================-->
    <!--    Footer-->
    <!-- ============================================-->
    <section class="py-5 text-white" id="footer">
        <div class="container">
            <div class="row justify-content-between pb-2 pt-8">
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <h6 class="text-uppercase fw-bold" style="color: white;">Alamat</h6>
                    <p class="my-3 text-100 fw-light">Jl. Batununggal 53 Kecamatan<br />Batununggal 48435</p>
                </div>
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <h6 class="text-uppercase fw-bold " style="color: white;">Kontak</h6>
                    <p class="my-3 text-100 fw-light">+62 328478234<br />+62 328478237<br />DEVRental@gmail.com</p>
                </div>
                <div class="col-12 col-lg-4 mb-5 mb-lg-0">
                    <h6 class="text-uppercase fw-bold" style="color: white;">Sosial Media</h6>
                    <ul class="list-unstyled d-flex">
                        <li class="me-3"><a class="text-white" href="#!">
                                <img src="{{ asset('executive/public/assets/img/icons/facebook.svg') }}" alt="Facebook" width="24">
                            </a></li>
                        <li class="me-3"><a class="text-white" href="#!">
                                <img src=" {{ asset('executive/public/assets/img/icons/twitter.svg') }}" alt="Twitter" width="24">
                            </a></li>
                        <li class="me-3"><a class="text-white" href="#!">
                                <img src="{{ asset('executive/public/assets/img/icons/instagram.svg') }}" alt="Instagram" width="24">
                            </a></li>
                        <li class="me-3"><a class="text-white" href="#!">
                                <img src="{{ asset('executive/public/assets/img/icons/linkedin.svg') }}" alt="LinkedIn" width="24">
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('executive/public/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('executive/public/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('executive/public/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('executive/public/assets/js/theme.js') }}"></script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">
</body>

</html>
