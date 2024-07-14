@extends('customers.layouts.app')

@section('content')
    <section class="py-0" id="payment">
        <div class="container">
            <div class="row align-items-center min-vh-md-75">
                <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">

                    <h2 class="text-center">Pembayaran</h2>
                    <p class="text-center mt-5">Pembayaran Melalui Nomor Rekening BCA Berikut: 8100691923 <br> A.N Dadang
                        Supriatna.</p>
                    <div class="row mt-6">
                        <div class="col">
                            <div class="payment-card text-center">
                                <form action="{{ route('payment.post') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                    <div>
                                        <label for="img"></label>
                                        <input type="file" name="img" id="img" required>
                                    </div>
                                    <div class="container mt-6" style="text-align: center;">
                                        <button type="submit" class="btn btn-primary" style="padding: 10px 25px; border-radius:20px 20px; background-color: #102C42">Kirim</button>

                                    </div>
                                </form>
                            </div>
                            <div class="container mt-6 text-center">
                                <p style="color: rgb(150, 150, 150);">*Upload Bukti Transfer Tunggu Hingga Admin Melakukan
                                    Validasi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
