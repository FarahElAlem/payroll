@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Component Type</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('/componenttypes/' . $componenttype->id) }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control"  name="name" type="text" id="name" value="{{ isset($componenttype->name) ? $componenttype->name : ''}} " placeholder="Name">
                    </div>
                    <select class="form-control" name="operation_id">
                        @foreach($operations as $operation)
                            <option value="{{ $operation->id }}">{{ $operation->name }}</option>
                        @endforeach
                    </select>
                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>

@endsection
