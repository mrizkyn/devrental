@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Main content -->
        <main role="main" class="col-md-12 ml-sm-auto">
            <!-- Main Card -->
            <div class="card shadow-lg mb-4">
                {{-- <div class="card-header bg-dark text-white">
                    <h4 class="mb-0">Dashboard</h4>
                </div> --}}
                <div class="card-body">
                    <!-- Summary Section -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="card text-white bg-primary mb-3 shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title">Total Transaksi</h5>
                                            <p class="card-text">{{ 'Rp ' . number_format($totalTransactions, 0, ',', '.') }}</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-exchange-alt fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card text-white bg-success mb-3 shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h5 class="card-title">Jumlah Mobil</h5>
                                            <p class="card-text">{{ $totalCars }}</p>
                                        </div>
                                        <div>
                                            <i class="fas fa-car fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cars Table -->
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create New Car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="img">Image:</label>
                        <input type="file" class="form-control" name="img" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" name="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
