@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
      <table class="table table-striped">
          <thead>
          <tr>
              <td>ID</td>
              <td>Status</td>
              <td>Employee</td>
              <td colspan="2">Action</td>
          </tr>
          </thead>
          <tbody>
          @foreach($payrolls as $payroll)
              <tr>
                  <td>{{$payroll->id}}</td>
                  <td>{{$payroll->status}}</td>
                  <td>{{$payroll->employee->firstName.' '.$payroll->employee->lastName}}</td>
                  <td><td><a href="{{ url('/payrollcomponents/' . $payroll->employee->id . '/edit') }}" title="Payroll"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Payroll</button></a></td></td>
                  <td>
                      <a href="{{ route('payrollcomponents.create',$payroll->id)}}" title="View Employee"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                  </td>
                  <td><a href="{{ route('payrolls.edit',$payroll->id)}}" class="btn btn-primary">Edit</a></td>
                  <a href="{{ route('payrollcomponents.create', ['id' => $payroll->employee->id]) }}" class="btn btn-info">Payroll</a>
                  <td>
                      <form action="{{ route('payrolls.destroy', $payroll->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit" onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
          </tbody>
      </table>
<div>
@endsection
