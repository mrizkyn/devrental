@extends('customers.layouts.app')
@section('content')
<style>
    /* Your existing styles */
</style>
@include('layouts.alert')
<section class="py-0" id="payment">
    <div class="container">
        <div class="row align-items-center min-vh-md-75">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">

                <h2 class="text-center">Pengembalian</h2>
                <div class="row mt-6">
                    <div class="col">
                        <div class="payment-card text-center">                            <form action="{{ route('return.submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                <div>
                                    <div class="container mb-1 text-start">
                                        <p style="font-size:10px; color: rgb(180, 179, 179);">*Ukuran file tidak boleh lebih dari 2048KB</p>
                                    </div>
                                    <label for="back_img"></label>
                                    <input type="file" name="back_img" id="back_img" required>
                                </div>
                                <div class="container mt-6" style="text-align: center;">
                                    <button type="submit" class="btn btn-primary" style="padding: 10px 25px; border-radius:20px 20px; background-color: #102C42">Kirim</button>

                                </div>
                            </form>
                        </div>
                        <div class="container mt-6 text-center">
                            <p style="color: rgb(150, 150, 150);">*Upload bukti pengembalian berupa foto Mobil yang sudah berada di tempat Penyewaan  <br> tunggu hingga Admin melakukan
                                validasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
