@extends('layouts.app')

@section('content_header')
    <h1>Items Management</h1>
@stop
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Item</h3>
            {{-- <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-newitem"><i
                    class="fas fa-plus"></i> Edit item</button> --}}
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('Item.update', $items->id) }}">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Item Name" value="{{ $items->name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity" value="{{ $items->quantity }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ $items->price }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <a href="{{ route('Item.index') }}"><button type="button" class="btn btn-default" data-dismiss="modal">cancel</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>

    </div>
@stop
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
