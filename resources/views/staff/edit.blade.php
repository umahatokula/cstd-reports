@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Edit Staff
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
    @include('adminlte-templates::common.errors') {!! Form::model($staff, ['route' => ['staff.update', $staff->id], 'method'
        => 'patch']) !!}
    @include('staff.fields') {!! Form::close() !!}
                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



