@extends('customers.layouts.app')
@section('content')
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
        padding-top: 100px;
        /* Menambahkan padding atas untuk menghindari tumpang tindih dengan navbar */
    }

    .detail-card {
        margin: 50px auto;
        max-width: 400px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center;
    }

    .detail-card img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .detail-card h5 {
        font-size: 1.5rem;
        margin: 15px 0;
        color: #000;
    }

    .detail-card p {
        font-size: 1rem;
        color: #666;
    }

    .detail-card .btn {
        background-color: #102C42;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 1rem;
        margin-top: 20px;
    }

    .detail-card .btn:hover {
        background-color: #0056b3;
    }

    footer {
        background-color: #102C42;
        color: white;
        padding: 40px 0;
    }

    footer h6 {
        font-size: 1.2rem;
        margin-bottom: 15px;
    }

    footer p {
        font-size: 1rem;
        margin-bottom: 10px;
    }

    footer a {
        color: white;
    }

    footer a:hover {
        text-decoration: underline;
    }

    footer .list-unstyled {
        list-style-type: none;
        padding: 0;
    }

    footer .list-unstyled li {
        display: inline;
        margin-right: 10px;
    }
</style>
<section class="py-0 mt-6" id="payment">
    <div class="container">
        <div class="row align-items-center min-vh-md-75">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                <h2 class="text-center">Form Pengembalian</h2>
                <div class="row mt-6">
                    <div class="col">
                        <div class="payment-card text-center">
                            <form action="{{ route('return.submit', $transaction->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input class="upload" type="file" id="back_img" name="back_img" required>
                                <div class="container mt-6" style="text-align: center;">
                                    <button class="btn btn-primary" type="submit">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
