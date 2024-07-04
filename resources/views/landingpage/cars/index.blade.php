@extends('landingpage.layouts.app')
@section('content')

<header>
<style>
    body {
        font-family: 'Poppins', sans-serif;
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
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-button:hover {
        background-color: #0056b3;
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

    .carousel-item {
        display: flex;
        justify-content: center;
    }

    .card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s;
        text-decoration: none;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        border-bottom: 1px solid #ddd;
    }

    .card-body {
        background-color: #fff;
        padding: 1rem;
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: bold;
        color: #000;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000;
        border-radius: 50%;
    }

    section.listcar {
        padding-top: 100px; /* Menambahkan padding atas untuk menghindari tumpang tindih dengan navbar */
    }
</style>
</head>
<body>
    
    <section class="py-0" id="listcar">
        <div class="container">
          <div class="row align-items-center min-vh-md-75">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                <h2 class="text-center">Daftar Mobil</h2>
                <p class="text-center">Tersedia jenis mobil baik transmisi manual maupun matic sesuai dengan <br> kebutuhan. Yang dirancang untuk memenuhi standar mutu</p>
                <div class="row mt-6">
                    <div class="col">
                        <div id="listCarCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <a href="/login" class="card">
                                                <img src="assets/img/cars/fortuner.jpg" class="card-img-top" alt="Fortuner">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">FORTUNER</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="/login" class="card">
                                                <img src="assets/img/cars/avanza.jpg" class="card-img-top" alt="Avanza">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">AVANZA</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="/login" class="card">
                                                <img src="assets/img/cars/kijang.jpg" class="card-img-top" alt="Kijang">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">KIJANG</h5>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-3">
                                            <a href="/login" class="card">
                                                <img src="assets/img/cars/sigra.jpg" class="card-img-top" alt="Sigra">
                                                <div class="card-body text-center">
                                                    <h5 class="card-title">SIGRA</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

 
</body>
    
@endsection