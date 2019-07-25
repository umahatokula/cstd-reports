@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
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
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Role</th>
                                        <th>Permission(s)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td class="text-center" scope="row">{{$loop->iteration}}</td>
                                        <td>{{$role->name}}</td>
                                        <td>
                                            @foreach($role->permissions as $permission)
                                                {{$permission->name}} <br>
                                            @endforeach
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

@endsection

