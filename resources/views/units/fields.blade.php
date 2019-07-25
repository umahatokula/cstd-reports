<!-- Name Field -->
<div class="form-group row">
    <label for="name" class="col-sm-3 col-form-label">Name</label>
    <div class="col-sm-9">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>

<!-- Division Id Field -->
<div class="form-group row">
    <label for="division" class="col-sm-3 col-form-label">Division</label>
    <div class="col-sm-9">
        {!! Form::select('division_id', $divisions, null, ['class' => 'form-control', 'id' => 'division', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Hou Field -->
<div class="form-group row">
    <label for="hou" class="col-sm-3 col-form-label">Head of Unit</label>
    <div class="col-sm-9">
        {!! Form::select('hou',$staffs, null, ['class' => 'form-control', 'id' => 'hou', 'placeholder' => 'Select one']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('units.index') !!}" class="btn btn-secondary">Cancel</a>
</div>
