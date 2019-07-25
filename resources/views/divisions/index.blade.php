

@extends('master')
@section('content')

                        <div class="tab-content">
                            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="main-card mb-3 card">
                                            <div class="card-header"><i class="header-icon lnr-license icon-gradient bg-plum-plate"> </i>Divisions
                                                <div class="btn-actions-pane-right">
                                                    <div class="nav">
                                                        <a href="{{ route('divisions.create') }}" class="btn-pill btn-wide btn btn-outline-info btn-sm">Create Division</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    @include('flash::message')
                                                    @include('divisions.table')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
@endsection

