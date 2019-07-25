@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole=" tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Report
                        Evaluation
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="app">

                            <evaluate-monthly-performance-report
                                :user="{{auth()->user()->staff->load('unit.division.department', 'gradeLevel', 'user.roles')}}"
                                :report_id="{{ $report->id }}"></evaluate-monthly-performance-report>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
