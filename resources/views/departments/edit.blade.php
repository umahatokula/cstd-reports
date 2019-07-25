@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Edit Department
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
    @include('adminlte-templates::common.errors') {!! Form::model($department, ['route' => ['departments.update', $department->id],
        'method' => 'patch']) !!}
    @include('departments.fields') {!! Form::close() !!}             
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection




