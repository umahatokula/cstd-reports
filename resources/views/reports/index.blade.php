@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole=" tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Reports

                        @if (Carbon\Carbon::today()->between(Carbon\Carbon::parse($monthly_report_settings->open),
                        Carbon\Carbon::parse($monthly_report_settings->close)))
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a href="{{ route('reports.create') }}"
                                    class="btn-pill btn-wide btn btn-outline-info btn-sm">Create Division</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            @include('flash::message')
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>Appraisee</th>
                                            <th class="text-center">Counter Signed?</th>
                                            <th class="text-center">Action(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reports as $report)
                                        <tr>
                                            <td class="text-center" scope="row">{{ $loop->iteration }}</td>
                                            <td>{{ $report->from->toFormattedDateString() }}</td>
                                            <td>{{ $report->to->toFormattedDateString() }}</td>
                                            <td>{{ $report->appraiseeRecord ? $report->appraiseeRecord->full_name : '' }}
                                            </td>
                                            <td class="text-center">
                                                @if($report->is_counter_signed)
                                                <span class="badge badge-success">Yes</span> @else
                                                <span class="badge badge-secondary">No</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('reports.show', $report->id) }}"
                                                    class="btn btn-sm btn-primary">Details</a>
                                                @if(auth()->user()->staff->id == $report->appraisee)
                                                <a href="{{ route('reports.edit', $report->id) }}"
                                                    class="btn btn-sm btn-success {{ $report->is_counter_signed ? 'disabled' : '' }}">Edit</a>
                                                @endif
                                                @role(['unithead', 'headofdiv'])
                                                <a href="{{ route('reports.evaluate', $report->id) }}" class="btn btn-sm btn-warning {{ $report->is_counter_signed ? 'disabled' : '' }}">Evaluate</a>
                                                @endrole
                                                <a href="{{ route('reports.delete', $report->id) }}"
                                                    class="btn btn-sm btn-danger {{ $report->is_counter_signed ? 'disabled' : '' }}"
                                                    data-toggle="confirmation" data-title="Delete this item?"
                                                    onclick="return confirm('Are you sure?')">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
