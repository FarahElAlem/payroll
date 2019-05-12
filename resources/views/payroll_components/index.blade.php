
    @extends('layouts.master')

    @section('content')
        <div class="container">

            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Payroll Components list</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="dataTables_length" id="example1_length">
                                                <a href="{{ url('/payrollcomponents/create') }}" class="btn btn-success btn-sm" title="Add New Employee">
                                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <form method="GET" action="{{ url('/payrollcomponents') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                            <td>ID</td>
                                            <td>Employee</td>
                                            <td>Component type</td>
                                            <td>Amount</td>
                                            <td>Month</td>
                                            <td>Status</td>
                                            <td colspan="2">Action</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($payrollComponents as $pcomponent)
                                            <tr>
                                                <td>{{$pcomponent->id}}</td>
                                                <td>{{$pcomponent->payroll->employee->firstName.' '.$pcomponent->payroll->employee->lastName}}</td>
                                                <td>{{$pcomponent->component->componenttype->name}}</td>
                                                <td>{{$pcomponent->amount}}</td>
                                                <td>{{ Carbon\Carbon::parse($pcomponent->date)->format('M') }}</td>
                                                <td>{{$pcomponent->payroll->status}}</td>

                                                <td><a href="{{ route('payrollcomponents.edit',$pcomponent->id)}}" class="btn btn-primary">Edit</a></td>
                                                <td><a href="{{ URL::to('/payrollcomponents/pdf') }}">Export PDF</a></td>
                                                <td>
                                                    <form action="{{ route('payrollcomponents.destroy', $pcomponent->id)}}" method="post">
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

