@extends('customers.layouts.app')
@section('content')
<style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .detail-card {
        margin: 50px auto;
        max-width: 600px;
        border: 1px solid #ddd;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        background-color: #fff;
    }

    .detail-card h2 {
        font-size: 1.5rem;
        margin-bottom: 20px;
        color: #000;
    }

    .detail-card table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    .detail-card table th,
    .detail-card table td {
        text-align: left;
        padding: 8px;
        border-bottom: 1px solid #ddd;
    }

    .detail-card table th {
        background-color: #f2f2f2;
    }

    .detail-card .status {
        display: inline-block;
        padding: 5px 10px;
        border-radius: 5px;
        color: white;
    }

    .detail-card .status.pending {
        background-color: #ffc107; /* Warna kuning untuk status pending */
    }

    .detail-card .status.completed {
        background-color: #28a745; /* Warna hijau untuk status completed */
    }

    .note {
        font-size: 0.8rem;
        color: #999;
        margin-top: 20px;
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

<section class="py-0" id="payment">
    <div class="container">
        <div class="row align-items-center min-vh-md-75">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                <div class="detail-card">
                    <h2 class="text-center">Detail Pembayaran</h2>
                    <table>
                        <tr>
                            <th>Nama Lengkap</th>
                            <td>{{ $transaction->name }}</td>
                        </tr>
                        <tr>
                            <th>Mobil</th>
                            <td>{{ $transaction->car->name }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal & Waktu Sewa</th>
                            <td>{{ \Carbon\Carbon::parse($transaction->start)->format('d F Y ') }} WIB</td>
                        </tr>
                        <tr>
                            <th>Lama Sewa</th>
                            <td>{{ \Carbon\Carbon::parse($transaction->end)->format('d F Y ') }} WIB</td>
                        </tr>
                        <tr>
                            <th>Status Pembayaran</th>
                            <td><span class="status {{ $transaction->status === 'pending' ? 'pending' : 'completed' }}">{{ $transaction->status }}</span></td>
                        </tr>
                    </table>
                    <p class="note text-center">*Tunggu hingga admin melakukan validasi</p>
                    <p class="note text-center">*Jika Status Pembayaran Complete, Perlihatkan Detail Pembayaran ini Kepada <br> Resepsionis Sebagai Bukti Pengambilan Mobil</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
