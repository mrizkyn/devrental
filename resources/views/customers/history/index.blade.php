@extends('customers.layouts.app')

@section('content')
<style>
    .detail-card .backs.pending {
        background-color: #ffc107;
    }

    .detail-card .backs.completed {
        background-color: #28a745;
    }
</style>
<section id="payment" class="py-0">
    <div class="container">
        <div class="row align-items-center min-vh-md">
            <div class="col-md-12 col-lg-12 py-6 text-sm-start text-center">
                <h2 class="text-center mb-6">Riwayat Sewa</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover rounded mb-3">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Mobil</th>
                                        <th scope="col">Periode Sewa</th>
                                        <th scope="col">Status Pengembalian</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>
                                                <img src="{{ asset('storage/' . $transaction->car->img) }}" alt="Car Image" class="img-fluid rounded" style="width: 100px; height: auto;">
                                            </td>
                                            <td>{{ $transaction->car->name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($transaction->start)->format('d F Y') }} s.d {{ \Carbon\Carbon::parse($transaction->end)->format('d F Y') }} - 21:00 WIB</td>
                                            <td>
                                                <span class="badge {{ $transaction->backs === 'Belum Dikembalikan' ? 'bg-danger' : 'bg-success' }}">
                                                    {{ $transaction->backs }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('confirmation', ['transaction_id' => $transaction->id]) }}" class="btn btn-primary btn-sm">
                                                    Detail
                                                </a>

                                                @if ($transaction->backs === 'Sudah Dikembalikan')
                                                    <button class="btn btn-success btn-sm" disabled>
                                                        Pengembalian
                                                    </button>
                                                @else
                                                    <a href="{{ route('return.form', $transaction->id) }}" class="btn btn-success btn-sm">
                                                        Pengembalian
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
