@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Add 
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
      <form method="post" action="{{ route('payrollcomponents.store') }}">
          <div class="form-group">
              @csrf
              <label for="amount">Amount</label>
              <input type="text" class="form-control" name="amount"/>
          </div>



          <select class="form-control" name="component_id">
            @foreach($components as $component)
              <option value="{{ $component->id }}">{{ $component->name }}</option>
            @endforeach
          </select>

          <select class="form-control" name="payroll_id">
            @foreach($payrolls as $payroll)
              <option value="{{ $payroll->id }}">{{ $payroll->status }}</option>
            @endforeach
          </select>

          {{-- <div class="form-group">
              @csrf
              <label for="date">Date</label>
              <input type="text" class="form-control" name="date"/>
          </div> --}}

          <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="date" class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
          <button type="submit" class="btn btn-primary">Add</button>
      </form>
  </div>
</div>
<script type="text/javascript">

     $('.date').datepicker({
                format: 'yy/mm/dd',
                autoclose: true,
                todayHighlight: true
            });

</script>  

@endsection
