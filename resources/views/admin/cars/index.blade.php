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
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h4>Cars List</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        <a class="btn btn-success btn-sm" data-toggle="modal" data-target="#createModal">
                            <i class="fas fa-plus"></i> Create New Car
                        </a>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive" style="max-height: 500px; overflow-y: auto;">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p>{{ $message }}</p>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <table id="cars-table" class="table table-stripped" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cars as $index => $car)
                            <tr data-id="{{ $car->id }}">
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <strong>{{ $car->name }}</strong>
                                </td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#imageModal-{{ $car->id }}">
                                        <img src="{{ Storage::url($car->img) }}" alt="{{ $car->name }}"
                                            class="img-thumbnail"
                                            style="max-width: 100px; height: 60px; object-fit: cover;">
                                    </a>
                                </td>
                                <td>
                                    <span class="badge badge-success">
                                        Rp {{ number_format($car->price, 0, ',', '.') }}
                                    </span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($car->created_at)->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <button type="button" class="btn btn-primary btn-sm edit-car-btn"
                                            data-id="{{ $car->id }}" data-toggle="modal"
                                            data-target="#editModal{{ $car->id }}" data-toggle="tooltip"
                                            title="Edit Car">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm delete-car-btn"
                                            data-id="{{ $car->id }}" data-name="{{ $car->name }}"
                                            data-toggle="tooltip" title="Delete Car">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </div>

                                    <!-- Delete Form (hidden) -->
                                    <form id="deleteForm-{{ $car->id }}"
                                        action="{{ route('cars.destroy', $car->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>

                            <!-- Image Modal -->
                            <div class="modal fade" id="imageModal-{{ $car->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel-{{ $car->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="imageModalLabel-{{ $car->id }}">
                                                {{ $car->name }} Image</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <img src="{{ Storage::url($car->img) }}" alt="{{ $car->name }}"
                                                class="img-fluid" style="max-height: 500px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="editModal{{ $car->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="editModalLabel{{ $car->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title" id="editModalLabel{{ $car->id }}">Edit Car</h5>
                                            <button type="button" class="close text-white" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('cars.update', $car->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="name">Name:</label>
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $car->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="img">Current Image:</label><br>
                                                    <img src="{{ Storage::url($car->img) }}" width="150"
                                                        class="mb-2 img-thumbnail">
                                                    <label for="img">Update Image:</label>
                                                    <input type="file" class="form-control" name="img">
                                                    <small class="form-text text-muted">Leave empty to keep current
                                                        image</small>
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price:</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Rp</span>
                                                        </div>
                                                        <input type="number" class="form-control" name="price"
                                                            value="{{ $car->price }}" required min="0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary btn-sm"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-success text-white">
                        <h5 class="modal-title" id="createModalLabel">Create New Car</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input type="text" class="form-control" name="name" required
                                    placeholder="Enter car name">
                            </div>
                            <div class="form-group">
                                <label for="img">Image:</label>
                                <input type="file" class="form-control" name="img" required accept="image/*">
                                <small class="form-text text-muted">Supported formats: JPG, PNG, GIF, WebP. Max size:
                                    2MB</small>
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="number" class="form-control" name="price" required min="0"
                                        placeholder="Enter price">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success btn-sm">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="deleteCarModal" tabindex="-1" role="dialog" aria-labelledby="deleteCarModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteCarModalLabel">Confirm Delete</h5>
                        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete car: <strong id="carName"></strong>?</p>
                        <p class="text-danger"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger btn-sm" id="confirmDeleteCar">Delete</button>
                    </div>
                </div>
            </div>
        </div>

        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
        <script type="text/javascript" charset="utf8"
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#cars-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "pageLength": 10,
                    "order": [
                        [0, 'asc']
                    ],
                    "language": {
                        "emptyTable": "No cars found",
                        "info": "Showing _START_ to _END_ of _TOTAL_ cars",
                        "infoEmpty": "Showing 0 to 0 of 0 cars",
                        "infoFiltered": "(filtered from _MAX_ total cars)",
                        "lengthMenu": "Show _MENU_ cars",
                        "search": "Search:",
                        "zeroRecords": "No matching cars found",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Next",
                            "previous": "Previous"
                        }
                    }
                });

                $('[data-toggle="tooltip"]').tooltip();

                var carIdToDelete;
                var carNameToDelete;

                $('.delete-car-btn').on('click', function() {
                    carIdToDelete = $(this).data('id');
                    carNameToDelete = $(this).data('name');

                    $('#carName').text(carNameToDelete);
                    $('#deleteCarModal').modal('show');
                });

                $('#confirmDeleteCar').on('click', function() {
                    if (carIdToDelete) {
                        $('#deleteForm-' + carIdToDelete).submit();
                    }
                });

                setTimeout(function() {
                    $('.alert-success').fadeOut('slow');
                }, 3000);
            });
        </script>
    </div>
@endsection
