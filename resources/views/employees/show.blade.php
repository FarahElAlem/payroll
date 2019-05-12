@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Employee {{ $employee->id }}</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $employee->id }}</td>
                            </tr>
                            <tr>
                                <th> First Name </th>
                                <td> {{ $employee->firstName }} </td>
                            </tr>
                            <tr>
                                <th> Last Name </th>
                                <td> {{ $employee->lastName }} </td>
                            </tr>
                            <tr>
                                <th> Email </th>
                                <td> {{ $employee->email }} </td>
                            </tr>
                            <tr>
                                <th> Address </th>
                                <td> {{ $employee->address }} </td>
                            </tr>
                            <tr>
                                <th> Action </th>
                                <td> <a href="{{ url('/employees') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                                    <a href="{{ url('/employees/' . $employee->id . '/edit') }}" title="Edit Employee"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                    <form method="POST" action="{{ url('employees' . '/' . $employee->id) }}" accept-charset="UTF-8" style="display:inline">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Employee" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                    </form> </td>
                            </tr>
                            </tbody></table>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>
@endsection
