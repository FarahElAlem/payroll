@extends('layouts.master')

@section('content')
<div class="container">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Add new employee</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ url('/employees') }}" accept-charset="UTF-8" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="box-body">
                <div class="form-group">
                    <label for="firstName">First name</label>
                    <input class="form-control"  name="firstName" type="text" id="firstName" value="{{ isset($employee->firstName) ? $employee->firstName : ''}} " placeholder="Last name">
                </div>
                <div class="form-group">
                    <label for="lastName">Last name</label>
                    <input name="lastName" type="text" id="lastName" value="{{ isset($employee->lastName) ? $employee->lastName : ''}}" class="form-control"  placeholder="First name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="email" id="email" value="{{ isset($employee->email) ? $employee->email : ''}}" placeholder="Email" >
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input class="form-control" name="address" type="text" id="address" value="{{ isset($employee->address) ? $employee->address : ''}}" placeholder="Address" >
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
