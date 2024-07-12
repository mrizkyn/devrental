@extends('customers.layouts.app')

@section('content')

<form action="{{ route('form.step2.post') }}" method="POST">
    @csrf
    <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
    <div>
        <label for="start">Tanggal & Waktu Sewa</label>
        <input type="date" name="start" id="start" required>
    </div>
    <div>
        <label for="end">Lama Sewa</label>
        <input type="date" name="end" id="end" required>
    </div>
    <div>
        <label for="price">Kalkulasi Harga</label>
        <input type="text" name="price" id="price" value="{{ number_format($transaction->price, 0, ',', '.') }}" readonly required>
    </div>
    <div>
        <label for="address">Alamat</label>
        <input type="text" name="address" id="address" required>
    </div>
    <button type="submit">Pembayaran</button>
</form>

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
