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
                        <h4>Role Management</h4>
                    </div>
                    <div class="col-md-4 text-right">
                        @can('role-create')
                            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">
                                <i class="fas fa-plus"></i> Create New Role
                            </a>
                        @endcan
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

                <table id="roles-table" class="table table-stripped" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th width="50px">No</th>
                            <th>Name</th>
                            <th>Permissions Count</th>
                            <th>Created At</th>
                            <th width="200px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr data-id="{{ $role->id }}">
                                <td>{{ ++$i }}</td>
                                <td>
                                    <strong>{{ $role->name }}</strong>
                                </td>
                                <td>
                                    <span class="badge badge-info">{{ $role->permissions->count() }}</span>
                                </td>
                                <td>{{ \Carbon\Carbon::parse($role->created_at)->format('d M Y H:i') }}</td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a class="btn btn-info btn-sm" href="{{ route('roles.show', $role->id) }}"
                                            data-toggle="tooltip" title="View Details">
                                            <i class="fas fa-eye"></i> Show
                                        </a>
                                        @can('role-edit')
                                            <a class="btn btn-primary btn-sm" href="{{ route('roles.edit', $role->id) }}"
                                                data-toggle="tooltip" title="Edit Role">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                        @endcan
                                        @can('role-delete')
                                            <button type="button" class="btn btn-danger btn-sm delete-role-btn"
                                                data-id="{{ $role->id }}" data-name="{{ $role->name }}"
                                                data-toggle="tooltip" title="Delete Role">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete role: <strong id="roleName"></strong>?</p>
                        <p class="text-danger"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                        <form id="deleteForm" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
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
                $('#roles-table').DataTable({
                    "paging": true,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "pageLength": 10,
                    "order": [
                        [0, 'asc']
                    ],
                    "language": {
                        "emptyTable": "No roles found",
                        "info": "Showing _START_ to _END_ of _TOTAL_ roles",
                        "infoEmpty": "Showing 0 to 0 of 0 roles",
                        "infoFiltered": "(filtered from _MAX_ total roles)",
                        "lengthMenu": "Show _MENU_ roles",
                        "search": "Search:",
                        "zeroRecords": "No matching roles found",
                        "paginate": {
                            "first": "First",
                            "last": "Last",
                            "next": "Next",
                            "previous": "Previous"
                        }
                    }
                });

                $('[data-toggle="tooltip"]').tooltip();

                $('.delete-role-btn').on('click', function() {
                    var roleId = $(this).data('id');
                    var roleName = $(this).data('name');

                    $('#roleName').text(roleName);
                    $('#deleteForm').attr('action', '{{ url('roles') }}/' + roleId);
                    $('#deleteModal').modal('show');
                });

                // Auto-hide success message after 3 seconds
                setTimeout(function() {
                    $('.alert-success').fadeOut('slow');
                }, 3000);
            });
        </script>
    </div>
@endsection
