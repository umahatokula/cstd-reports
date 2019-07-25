@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole=" tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Annual
                        Performance Evaluation Reports
                        @if (Carbon\Carbon::today()->between(Carbon\Carbon::parse($apper_settings->open),
                        Carbon\Carbon::parse($apper_settings->close)))
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a href="{{ route('aper-forms.reports') }}" class="btn-pill btn-wide btn btn-primary btn-sm"> Reports</a> &nbsp
                                <a href="{{ route('aper-forms.create') }}" class="btn-pill btn-wide btn btn-info btn-sm"> New APER</a>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="tab-content">

                            <div class="table-responsive">
                                <table class="table table-light">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>PF</th>
                                            <th>Staff</th>
                                            <th>Year</th>
                                            <th class="text-center">Evaluation Status</th>
                                            <th class="text-center">Acceptance Status</th>
                                            <th class="text-center">Action(s)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($forms as $form)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $form->staff ? $form->staff->pf : '' }}</td>
                                            <td>{{ $form->staff ? $form->staff->full_name : '' }}</td>
                                            <td>{{ $form->year }}</td>
                                            <td class="text-center"><span
                                                    class="badge {{$form->is_evaluated ? 'badge-primary' : 'badge-secondary'}}">{{ ($form->is_evaluated) ? 'Evaluated' : 'Not Evaluated' }}</span>
                                            </td>
                                            <td class="text-center"><span
                                                    class="badge {{$form->is_accepted ? 'badge-success' : 'badge-secondary'}}">{{ ($form->is_accepted) ? 'Accepted' : 'Not Accepted' }}</span>
                                            </td>
                                            <td class="text-center">
                                                @if($form->staff)

                                                <a href="{{ route('aper-forms.preview', $form->id) }}"
                                                    class="btn btn-sm btn-success">Preview</a>

                                                <a href="{{ route('aper-forms.accept', $form->id) }}"
                                                    class="btn btn-sm btn-success {{ $form->staff_id != auth()->user()->staff_id ? 'disabled' : '' }} {{ !$form->is_evaluated ? 'disabled' : '' }} {{ $form->is_accepted ? 'disabled' : '' }}">Accept</a>

                                                @level(9)
                                                <a href="{{ route('aper-forms.evaluate', $form->id) }}"
                                                    class="btn btn-sm btn-primary {{ ($form->is_submitted) ? '' : 'disabled' }} {{ $form->staff_id == auth()->user()->staff_id ? 'disabled' : '' }} {{ $form->is_evaluated ? 'disabled' : '' }}">Evaluate</a>
                                                @endlevel

                                                <a href="{{ route('aper-forms.edit', $form->id) }}"
                                                    class="btn btn-sm btn-warning {{ ($form->staff_id != Auth::user()->staff->id || $form->is_evaluated  || $form->is_submitted || $form->is_finalized) ? 'disabled' : '' }}">Edit</a>

                                                <a href="{{ route('aper-forms.delete', $form->id) }}"
                                                    class="btn btn-sm btn-danger {{ ($form->staff_id != Auth::user()->staff->id || $form->is_evaluated || $form->is_finalized) ? 'disabled' : '' }}"
                                                    data-toggle="confirmation" data-title="Delete this item?"
                                                    onclick="return confirm('Are you sure?')">Delete</a>

                                                @endif
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
