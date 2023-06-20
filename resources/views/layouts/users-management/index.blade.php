@extends('layouts.app')

@section('content_header')
    <h1>Users Management</h1>
@stop
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Users</h3>
        </div>

        <div class="card-body">
            <table id="tableusers" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#"><i class="fas fa-user-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" style="color:#ff0000;" href="#"><i class="fas fa-trash-alt" style="color:#ff0000;"></i> Delete</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@stop
@section('plugins.Datatables', true)
@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script>
        $(function() {
            $("#tableusers").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#tableusers_wrapper .col-md-6:eq(0)');
        });
    </script>
@stop
