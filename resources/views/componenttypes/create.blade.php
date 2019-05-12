@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add new Component Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('/componenttypes') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        @csrf
                        <label for="name">Component Type Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <select class="form-control" name="operation_id">
                        @foreach($operations as $operation)
                            <option value="{{ $operation->id }}">{{ $operation->name }}</option>
                        @endforeach
                    </select>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection
