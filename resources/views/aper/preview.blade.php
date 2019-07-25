@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                                        
    <div class="col-12" id="app">
        <aper-form-preview :staff_id="{{ Auth::user()->staff->id }}" :report_id="{{ $report_id }}"></aper-form-preview>
    </div>            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

