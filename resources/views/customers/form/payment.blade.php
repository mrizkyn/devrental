@extends('customers.layouts.app')

@section('content')

<div style="text-align: center;">
    <h2>Pembayaran</h2>
    <p>Pembayaran Melalui Nomor Rekening BCA Berikut: 8100691923<br>A/N Dadang Suprianta.</p>
    <form action="{{ route('payment.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="transaction_id" value="{{ $transaction->id }}">
        <div>
            <label for="img">Upload Bukti Transfer</label>
            <input type="file" name="img" id="img" required>
        </div>
        <button type="submit">Kirim</button>
    </form>
</div>
@endsection
