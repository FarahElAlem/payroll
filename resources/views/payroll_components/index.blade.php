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
          <td>Employee</td>
            <td>Component type</td>
          <td>Amount</td>
          <td>Month</td>
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

            <td><a href="{{ route('payrolls.edit',$pcomponent->id)}}" class="btn btn-primary">Edit</a></td>
            <td><a href="{{ URL::to('/payrollcomponents/pdf') }}">Export PDF</a></td>
            <td>
                <form action="{{ route('payrolls.destroy', $pcomponent->id)}}" method="post">
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
