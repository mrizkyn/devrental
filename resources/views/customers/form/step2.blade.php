@extends('customers.layouts.app')
@section('content')
<form action="{{ route('form.step3.post') }}" method="POST">
    @csrf
    <input type="hidden" name="transaction_id" value="{{ $transaction_id }}">
    <div>
        <label for="start">Tanggal & Waktu Sewa</label>
        <input type="date" name="start" id="start" required>
    </div>
    <div>
        <label for="end">Lama Sewa</label>
        <input type="date" name="end" id="end" required>
    </div>
    <div>
        <label for="transfer">Kalkulasi Harga</label>
        <input type="text" name="transfer" id="transfer" required>
    </div>
    <div>
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" required>
    </div>
    <button type="submit">Pembayaran</button>
</form>
@endsection
