<!-- Pf Field -->
<div class="form-group row">
    <label for="pf" class="col-sm-3 col-form-label">PF</label>
    <div class="col-sm-9">
        {!! Form::text('pf', null, ['class' => 'form-control', 'id' => 'pf']) !!}
    </div>
</div>

<!-- Fname Field -->
<div class="form-group row">
    <label for="fname" class="col-sm-3 col-form-label">First Name</label>
    <div class="col-sm-9">
        {!! Form::text('fname', null, ['class' => 'form-control', 'id' => 'fname']) !!}
    </div>
</div>

<!-- Lname Field -->
<div class="form-group row">
    <label for="lname" class="col-sm-3 col-form-label">Last Name</label>
    <div class="col-sm-9">
        {!! Form::text('lname', null, ['class' => 'form-control', 'id' => 'lname']) !!}
    </div>
</div>

<!-- Email Field -->
<div class="form-group row">
    <label for="email" class="col-sm-3 col-form-label">Email</label>
    <div class="col-sm-9">
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'email']) !!}
    </div>
</div>

<!-- Username Field -->
<div class="form-group row">
    <label for="username" class="col-sm-3 col-form-label">Username</label>
    <div class="col-sm-9">
        {!! Form::text('username', null, ['class' => 'form-control', 'id' => 'username']) !!}
    </div>
</div>

<!-- Phone Field -->
<div class="form-group row">
    <label for="phone" class="col-sm-3 col-form-label">Phone</label>
    <div class="col-sm-9">
        {!! Form::text('phone', null, ['class' => 'form-control', 'id' => 'phone']) !!}
    </div>
</div>

<!-- Unit Field -->
<div class="form-group row">
    <label for="unit_id" class="col-sm-3 col-form-label">Unit</label>
    <div class="col-sm-9">
        {!! Form::select('unit_id', $units, null, ['class' => 'form-control', 'id' => 'unit_id', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Grade Level Field -->
<div class="form-group row">
    <label for="grade_level_id" class="col-sm-3 col-form-label">Grade Level</label>
    <div class="col-sm-9">
        {!! Form::select('grade_level_id', $gradeLevels, null, ['class' => 'form-control', 'id' => 'grade_level_id', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Should Login Field -->
{{-- <div class="form-group col-sm-6">
    {!! Form::label('should_login', 'Should Login:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('should_login', false) !!}
        {!! Form::checkbox('should_login', '1', null) !!} 1
    </label>
</div> --}}
{{-- <div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Should Login</label>
    <div class="col-sm-9">
        {!! Form::hidden('should_login', false) !!} {!! Form::checkbox('should_login', '1', null) !!} Yes/No
    </div>
</div> --}}

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('staff.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
