@extends('layouts.app')

@section('content')

<style>
    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
</style>
<div class="container">
    <table id="transactions-table" class="table table-bordered">
        <thead>
            <tr>
                <td>#</td>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>E-Mail</th>
                <th>KTP</th>
                <th>Tanggal & Waktu Sewa</th>
                <th>Lama Sewa</th>
                <th>Harga</th>
                <th>Alamat</th>
                <th>Mobil</th>
                <th>Bukti Pengembalian</th>
                <th>Status Pengembalian</th>
                <th width="280px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $transaction)
            <tr data-id="{{ $transaction->id }}">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->name }}</td>
                <td>{{ $transaction->telp }}</td>
                <td>{{ $transaction->email }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#ktpModal-{{ $transaction->id }}">
                        <img src="{{ asset('storage/' . $transaction->ktp) }}" alt="KTP Image" class="img-thumbnail" style="max-width: 100px;">
                    </a>
                </td>
                <td>{{ \Carbon\Carbon::parse($transaction->start)->format('d F Y – H:i') }}</td>
                <td>{{ \Carbon\Carbon::parse($transaction->end)->format('d F Y – H:i') }}</td>
                <td>{{ number_format($transaction->price, 0, ',', '.') }}</td>
                <td>{{ $transaction->address }}</td>
                <td>{{ $transaction->car->name }}</td>
                <td>
                    <a href="#" data-toggle="modal" data-target="#paymentModal-{{ $transaction->id }}">
                        <img src="{{ asset('storage/' . $transaction->back_img) }}" alt="Payment Image" class="img-thumbnail" style="max-width: 100px;">
                    </a>
                </td>
                <td class="status-cell">{{ $transaction->backs }}</td>
                <td>
                    <a class="btn btn-success validate-btn {{ $transaction->backs === 'Sudah Dikembalikan' ? 'disabled' : '' }}" href="#" {{ $transaction->backs === 'Sudah Dikembalikan' ? 'disabled' : '' }}>Validasi</a>
                </td>
            </tr>

            <!-- KTP Modal -->
            <div class="modal fade" id="ktpModal-{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="ktpModalLabel-{{ $transaction->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="ktpModalLabel-{{ $transaction->id }}">KTP Image</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $transaction->ktp) }}" alt="KTP Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Modal -->
            <div class="modal fade" id="paymentModal-{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel-{{ $transaction->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel-{{ $transaction->id }}">Gambar Pengembalian</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('storage/' . $transaction->back_img) }}" alt="Return Image" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal Validasi -->
<div class="modal fade" id="validationModal" tabindex="-1" role="dialog" aria-labelledby="validationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="validationModalLabel">Validasi Transaksi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin memvalidasi pengembalian ini?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger" id="reject-button">Tolak</button>
                <button type="button" class="btn btn-success" id="approve-button">Setujui</button>
            </div>
        </div>
    </div>
</div>

<!-- DataTables Scripts -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    $('#transactions-table').DataTable();

    var transactionId;

    $('.validate-btn').on('click', function(event) {
        if ($(this).hasClass('disabled')) {
            event.preventDefault();
            return false;
        }
        transactionId = $(this).closest('tr').data('id');
        $('#validationModal').modal('show');
    });

    $('#approve-button').on('click', function() {
        updateTransactionStatus(transactionId, 'Sudah Dikembalikan');
    });

    $('#reject-button').on('click', function() {
        updateTransactionStatus(transactionId, 'Gagal');
    });

    function updateTransactionStatus(id, status) {
        $.ajax({
            url: '/return/' + id + '/update-return',
            type: 'PATCH',
            data: {
                backs: status,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                $('#validationModal').modal('hide');
                var row = $('#transactions-table').find('tr[data-id="' + id + '"]');
                row.find('td.status-cell').html('<span class="badge badge-' + (status === 'Sudah Dikembalikan' ? 'success' : 'danger') + '">' + status + '</span>');

                var validateBtn = row.find('.validate-btn');
                if (status === 'Sudah Dikembalikan') {
                    validateBtn.addClass('disabled').attr('disabled', 'disabled');
                }
            },
            error: function(xhr) {
                alert('Error: ' + xhr.responseText);
            }
        });
    }
});
</script>
@endsection
