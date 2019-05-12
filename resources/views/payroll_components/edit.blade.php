@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit payroll
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('payrolls.update', $payroll->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">status:</label>
          <input type="text" class="form-control" name="status" value={{ $payroll->status }} />
        </div>
        <select class="form-control" name="employee_id">
            @foreach($employees as $employee)
              <option value="{{ $employee->id }}">{{ $employee->firstName.' '.$employee->lastName }}</option>
            @endforeach
          </select>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
