@extends('layouts.master')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit
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
      <form method="post" action="{{ route('components.update', $component->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" name="name" value={{ $component->name }} />
        </div>
        <div class="form-group">
          <label for="name">Description:</label>
          <input type="text" class="form-control" name="name" value={{ $component->description }} />
        </div>
        <select class="form-control" name="component_type_id">
            @foreach($componenttypes as $componenttype)
              <option value="{{ $componenttype->id }}">{{ $componenttype->name }}</option>
            @endforeach
          </select>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  </div>
</div>
@endsection
