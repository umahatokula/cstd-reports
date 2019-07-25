@extends('master')
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-3 widget-content">
            <h1 class="h4">Users</h1>
        </div>
    </div>
</div>

@include('flash::message')
<div class="row">
    <div class="col-md-8">

        <div class="row">
            <div class="col-12">
                <div class="card mb-3 widget-content">

                    <table class="table table-responsive table-striped" id="">
                        <thead>
                            <tr>
                                <th class="no-sorting text-center">
                                    #
                                </th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Role(s)</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="middle-align">
                            <?php
                    $count=1;
                    ?>
                            @foreach($users as $user)
                            <tr id="tr_{{$user->id}}">
                                <td class="text-center">
                                    {{$count}}
                                </td>
                                <td>
                                    @if($user->staff)
                                    {!! ($user->staff->full_name) !!}
                                    @endif
                                </td>
                                <td>
                                    @foreach($user->roles as $role)
                                    {{$role->name}} <br>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a href="{!! route('users.edit', array($user->id)) !!}"
                                        class="btn btn-success btn-sm btn-icon icon-left">
                                        Edit
                                    </a>

                                    <a href="{{ route('users.delete', array($user->id)) }}"
                                        class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>

                                    <a href="{!! route('staff.show', $user->staff_id) !!}" class="btn btn-info btn-sm">
                                        Profile
                                    </a>

                                    <!-- <a href="{{ route('staff.get-reset-password', [$user->staff->id]) }}" class="btn btn-warning btn-sm">Reset password</a> -->
                                </td>
                            </tr>
                            <?php $count++; ?>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        {!! Form::open(array('route' => 'users.store', 'class' => '', 'role' => 'form')) !!}

                        <div class="form-group">
                            {!! Form::label('staff_id', 'Staff', array('class' => 'control-label', 'for' => 'staff_id'))
                            !!}

                            {!! Form::select('staff_id', $staffs, null, ['class' => 'form-control select', 'placeholder'
                            => 'Select one', 'id' => 'staff_id', 'required', 'style' => 'width:100%']) !!}

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password', array('class' => 'control-label', 'for' =>
                            'password')) !!}

                            {!! Form::password('password', array('class' => 'form-control', 'id' => 'password',
                            'required')) !!}

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            {!! Form::label('roles', 'Assign Role', array('class' => 'control-label', 'for' =>
                            'role_id')) !!}

                            {!! Form::select('role_id', $roles, null, array('class' => 'form-control', 'id' =>
                            'role_id', 'required')) !!}
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            {!! Form::label('assign_permission', ' ', array('class' => 'control-label', 'for' =>
                            'assign_permission')) !!}

                            {!! Form::submit('Add User', array('class' => 'btn btn-primary', 'id' => 'add-user')) !!}

                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
