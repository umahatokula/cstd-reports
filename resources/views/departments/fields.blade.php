<!-- Name Field -->
<div class="form-group row">
    <label for="name" class="col-sm-5 col-form-label">Name</label>
    <div class="col-sm-7">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>

<!-- Hod Field -->
<div class="form-group row">
    <label for="hod" class="col-sm-5 col-form-label">Head of Department</label>
    <div class="col-sm-7">
        {!! Form::select('hod',$staffs, null, ['class' => 'form-control', 'id' => 'hod', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('departments.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
