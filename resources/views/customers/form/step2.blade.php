@extends('customers.layouts.app')

@section('content')
@include('layouts.alert')
    <section class="py-0" id="form1">
        <div class="container">
            <div class="row align-items-center min-vh-md-75">
                <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                    <h2 class="form-title" style="text-align: center;">Form Penyewaan</h2>
                    <div class="row">
                        <div class="col">
                            <div class="form mb-3">
                                <form action="{{ route('form.step2.post') }}" method="POST" style="text-align: start">
                                    @csrf
                                    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
                                    <div class="mb-3">
                                        <label for="start">Tanggal & Waktu Sewa</label>
                                        <input type="date" class="form-control" name="start" id="start" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="end">Lama Sewa</label>
                                        <input type="date" class="form-control" name="end" id="end" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="price">Kalkulasi Harga</label>
                                        <input type="text" class="form-control" name="price" id="price"
                                            value="{{ number_format($transaction->price, 0, ',', '.') }}" readonly required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address">Alamat</label>
                                        <input type="text" class="form-control" name="address" id="address" required>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary" style="padding: 10px 25px; border-radius:20px 20px; background-color: #102C42">Pembayaran</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startInput = document.getElementById('start');
            const endInput = document.getElementById('end');
            const priceInput = document.getElementById('price');
            const carPrice = {{ $transaction->car->price }};

            function calculatePrice() {
                const startDate = new Date(startInput.value);
                const endDate = new Date(endInput.value);

                if (startDate && endDate && startDate <= endDate) {
                    const timeDiff = endDate.getTime() - startDate.getTime();
                    const daysDiff = Math.ceil(timeDiff / (1000 * 3600 * 24));
                    const totalPrice = carPrice * daysDiff;
                    priceInput.value = totalPrice.toLocaleString('id-ID');
                } else {
                    priceInput.value = '';
                }
            }

            startInput.addEventListener('change', calculatePrice);
            endInput.addEventListener('change', calculatePrice);
        });
    </script>
@endsection
