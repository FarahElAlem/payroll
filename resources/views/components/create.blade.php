@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add new Component Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('/components') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        @csrf
                        <label for="name">Component Name:</label>
                        <input type="text" class="form-control" name="name"/>
                    </div>
                    <div class="form-group">
                        @csrf
                        <label for="description">Component description:</label>
                        <input type="text" class="form-control" name="description"/>
                    </div>
                    <select class="form-control" name="component_type_id">
                        @foreach($componenttypes as $componenttype)
                            <option value="{{ $componenttype->id }}">{{ $componenttype->name }}</option>
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
