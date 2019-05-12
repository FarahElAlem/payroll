<div class="form-group {{ $errors->has('firstName') ? 'has-error' : ''}}">
    <label for="firstName" class="control-label">{{ 'Firstname' }}</label>
    <input class="form-control" name="firstName" type="text" id="firstName" value="{{ isset($employee->firstName) ? $employee->firstName : ''}}" >
    {!! $errors->first('firstName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('lastName') ? 'has-error' : ''}}">
    <label for="lastName" class="control-label">{{ 'Lastname' }}</label>
    <input class="form-control" name="lastName" type="text" id="lastName" value="{{ isset($employee->lastName) ? $employee->lastName : ''}}" >
    {!! $errors->first('lastName', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    <label for="lastName" class="control-label">{{ 'Email' }}</label>
    <input class="form-control" name="email" type="text" id="email" value="{{ isset($employee->email) ? $employee->email : ''}}" >
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('address') ? 'has-error' : ''}}">
    <label for="lastName" class="control-label">{{ 'Address' }}</label>
    <input class="form-control" name="address" type="text" id="address" value="{{ isset($employee->address) ? $employee->address : ''}}" >
    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
