<!-- Name Field -->
<div class="form-group row">
    <label for="name" class="col-sm-4 col-form-label">Name</label>
    <div class="col-sm-8">
        {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
    </div>
</div>

<!-- Rank Field -->
<div class="form-group row">
    <label for="rank" class="col-sm-4 col-form-label">Rank</label>
    <div class="col-sm-8">
        {!! Form::text('rank', null, ['class' => 'form-control', 'id' => 'rank']) !!}
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('gradeLevels.index') !!}" class="btn btn-default">Cancel</a>
</div>
