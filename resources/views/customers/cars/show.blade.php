@extends('customers.layouts.app')

@section('content')
<style>
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
</style>

<section class="py-0 mt-6" id="home">
    <div class="container">
        <div class="row align-items-center min-vh-md-75">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                <h2 class="text-center">Detail Mobil</h2>
                <div class="row">
                    <div class="col">
                        <div class="detail-card">
                            <img src="{{ Storage::url($car->img) }}" alt="{{ $car->name }}">
                            <h5>{{ $car->name }}</h5>
                        </div>
                    </div>
                    <div class="container" style="text-align: center;">
                        <p>Harga Mulai Dari Rp. {{ number_format($car->price, 0, ',', '.') }},-<br>Durasi sewa : Harian/Mingguan/Bulanan</p>
                        <button class="btn btn-primary">Sewa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
