@extends('layouts.master')

@section('content')
    <div class="container">

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Components list</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="dataTables_length" id="example1_length">
                                            <a href="{{ url('/components/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <form method="GET" action="{{ url('/components') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                                            <div class="input-group" style="display: flex;">
                                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                                <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                                            </div>
                                        </form>
                                    </div>
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Name</th>
                                        <td>Operation</td>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($components as $component)
                                        <tr>
                                            <td>{{$component->id}}</td>
                                            <td>{{$component->name}}</td>
                                            <td>{{$component->description}}</td>
                                            <td><a href="{{ route('components.edit',$component->id)}}" class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('components.destroy', $component->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </div>
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging'      : true,
                'lengthChange': false,
                'searching'   : false,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : false
            })
        })
    </script>
@endsection
