@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add new employee</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form method="POST" action="{{ url('/$operations/' . $operation->id) }}" accept-charset="UTF-8" enctype="multipart/form-data" >
                {{ method_field('PATCH') }}
                {{ csrf_field() }}
                <div class="box-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input class="form-control"  name="name" type="text" id="name" value="{{ isset($operation->name) ? $operation->name : ''}} " placeholder="Name">
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>

@endsection
