@extends('layouts.app')

@section('content_header')
    <h1>Rentals</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rentals</h3>
            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-newitem"><i
                    class="fas fa-plus"></i> New Rental</button>
        </div>
        <div class="card-body">
            <table id="tableusers" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Created at</th>
                        <th>updated at</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rentals as $index => $rental)
                        <tr>
                            <td>{{ $index+1 }}</td>
                            <td>{{ $rental->name }}</td>
                            <td>{{ $rental->quantity }}</td>
                            <td>{{ $rental->price }}</td>
                            <td>{{ $rental->created_at }}</td>
                            <td>{{ $rental->updated_at }}</td>
                            <td>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                    Action
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('Rentals.edit', $rental->id) }}"><i
                                            class="fas fa-user-edit"></i> Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <form action="{{ route('Rentals.destroy', $rental->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item" style="color:#ff0000;">
                                            <i class="fas fa-trash-alt" style="color:#ff0000;"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <div class="modal fade" id="modal-newitem">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <form method="POST" action="{{ route('Rentals.store') }}">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">New Rental</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{ $username->name }}" placeholder="Name" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="itemName" class="col-sm-2 col-form-label">Item Name</label>
                                <div class="col-sm-10">
                                    <select class="select2 form-control"   name="itemName" id="itemName" data-placeholder="Select a Item">
                                        <option value="" selected>Please select</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder="Quantity">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder="price">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
@section('plugins.Select2', true)
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

            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
@stop
