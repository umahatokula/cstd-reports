@extends('master')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Reset Staff Password</h1>
</div>
<div class="row">
    <div class="col-6">
        @include('adminlte-templates::common.errors')
        {!! Form::open(['route' => 'staff.post-reset-password']) !!}
        <div class="form-group row">
            <label for="fname" class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
                {!! Form::text('staff', $staff->full_name, ['class' => 'form-control', 'id' => 'staff', 'readonly']) !!}
                {!! Form::hidden('staff_id', $staff->id) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 col-form-label">New Password</label>
            <div class="col-sm-9">
                {!! Form::text('password', null, ['class' => 'form-control', 'id' => 'password']) !!}
            </div>
        </div>
        <div class="form-group row">
            <label for="fname" class="col-sm-3 col-form-label">Confirm Password</label>
            <div class="col-sm-9">
                {!! Form::text('password_confirmation', null, ['class' => 'form-control', 'id' => 'password_confirmation']) !!}
            </div>
        </div>
        <div class="form-group col-sm-12">
            {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
            <a href="{!! route('staff.index') !!}" class="btn btn-secondary">Cancel</a>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
