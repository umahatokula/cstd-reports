@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole=" tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Report
                        Details
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="row">

                                <div class="col-12">
                                    @if(isset($report))
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">
                                                <table class="table">
                                                    <thead>
                                                    <tbody>
                                                        <tr>
                                                            <td><b>From</b></td>
                                                            <td>{{ $report->from->toFormattedDateString() }}</td>
                                                            <td><b>To</b></td>
                                                            <td>{{ $report->to->toFormattedDateString() }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h4>Appraisee</h4>
                                                <table class="table table-bordered">
                                                    <tbody>
                                                        <tr>
                                                            <td>Appraisee</td>
                                                            <td>{{ $report->appraiseeRecord ? $report->appraiseeRecord->full_name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>File Number</td>
                                                            <td>{{ $report->appraiseeRecord ? $report->appraiseeRecord->pf : ''}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Designation/Grade Level</td>
                                                            <td>{{ $report->gradeLevel ? $report->gradeLevel->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Department</td>
                                                            <td>{{ $report->department ? $report->department->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Division</td>
                                                            <td>{{ $report->division ? $report->division->name : '' }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Unit</td>
                                                            <td>{{ $report->unit ? $report->unit->name : '' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h4>Report</h4>
                                                <h5><b>A.</b> Total number of days absent during period covered by the
                                                    Report</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Reasons</th>
                                                            <th class="text-center">Permission</th>
                                                            <th class="text-center">No of Days</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if($report->absentDays[0])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[0]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[0]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[0]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[1])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[1]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[1]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[1]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[2])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[2]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[2]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[2]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[3])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[3]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[3]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[3]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[4])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[4]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[4]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[4]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[5])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[5]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[5]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[5]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[6])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[6]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[6]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[6]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                        @if($report->absentDays[7])
                                                        <tr>
                                                            <td scope="row">{{ $report->absentDays[7]->reason }}</td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[7]->permission ? 'Yes' : 'No' }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $report->absentDays[7]->no_of_days }}</td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5><b>B.</b> Target set for my Division/Unit</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Target</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($report->divisionTargets as $target)
                                                        <tr>
                                                            <td scope="row">
                                                                {{ $target->target }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5><b>C.</b> Target set for Appraisee</h5>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Target</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($report->appraiseeTargets as $target)
                                                        <tr>
                                                            <td scope="row">
                                                                {{ $target->target }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5><b>D.</b> Achievement of Targets</h5>
                                                <small>Which of these targets were you able to achieve and why?</small>
                                                <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Achieved Target</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($report->targetsAchieved as $target)
                                                        <tr>
                                                            <td scope="row">
                                                                {{ $target->achieved }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <br>
                                                <h5><b>E.</b> Reporting Officer Comment</h5>
                                                <p>
                                                    {{ $report->comment }}
                                                </p>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="card-text">
                                            <h5><b>F.</b> Division/ Unit Head's Comment Only</h5>
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td scope="row">(i)</td>
                                                <td>Rate productivity of Appraisee in (%)</td>
                                                <td>{{$report->punctuality}}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">(ii)</td>
                                                <td>Rate availability of Appraisee in (%)</td>
                                                <td>{{$report->availability}}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">(iii)</td>
                                                <td>Rate general conduct of Appraisee in (%)</td>
                                                <td>{{$report->general_conduct}}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">(iv)</td>
                                                <td>How do you comment on interpersonaland intellectual skills of
                                                    Appraisee</td>
                                                <td>{{$report->interpersonal_intellectual}}</td>
                                            </tr>
                                            <tr>
                                                <td scope="row">(v)</td>
                                                <td>Suggestion/Recommendation about what the management can do to
                                                    improve the officer's productivity</td>
                                                <td>{{$report->recommendation}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <h5><b>G.</b> General Remark by Divisional/Unit Head</h5>
                                    <p>{{$report->general_remark}}</p>
                                    {!! Form::open(['route' => ['reports.counterSign', $report->id]]) !!}
                                    <div class="form-group col-sm-12">
                                        {!! Form::hidden('is_counter_signed', 1) !!} @if($report->is_counter_signed)
                                        <div class="card text-white bg-info mb-3">
                                            <div class="card-body">
                                                <h6 class="card-text">This report has been <b>Counter Signed</b>.</h6>
                                            </div>
                                        </div>@endif

                                    </div>
                                    {!! Form::close() !!}</p>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-text">No record found</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
