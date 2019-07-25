<!-- Name Field -->
<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>

<!-- Department Id Field -->
<div class="form-group row">
    <label for="department_id" class="col-sm-4 col-form-label">Department</label>
    <div class="col-sm-8">
        {!! Form::select('department_id', $departments, null, ['class' => 'form-control', 'id' => 'department_id', 'placeholder' => 'Select
        one']) !!}
    </div>
</div>

<!-- Hod Field -->
<div class="form-group row">
    <label for="hod" class="col-sm-4 col-form-label">Head of Division</label>
    <div class="col-sm-8">
        {!! Form::select('hod',$staffs, null, ['class' => 'form-control', 'id' => 'hod', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('divisions.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
