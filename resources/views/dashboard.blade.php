@extends('master')
@section('content')

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-conterole="tabpanel">
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="tab-content">
                               <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <th colspan="2">
                        Monthly Reports
                         <div class="float-right">
                            <select class="float-right" name="year">
                                <option>Month</option>
                                @foreach($months as $month)
                                <option value="{{$month}}">{{$month}}</option>
                                @endforeach
                            </select>
                            &nbsp
                            <select class="float-right mx-2" name="year">
                                <option>Year</option>
                                @foreach($years as $year)
                                <option value="{{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm">Filter</button>
                        </div> 
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Total Number</td>
                        <td class="text-center">{{ $reports->count() }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Total Number Countersigned</td>
                        <td class="text-center">{{ $pendingAperForms->count() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                    <th colspan="2">
                        APER Forms
                        {{-- <div class="float-right">
                            <select name="year" id="aperYear" class=">
                                <option>Year</option>
                                @foreach($years as $year)
                                <option value=" {{$year}}">{{$year}}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-sm">Filter</button>
                        </div> --}}
                    </th>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Total Number of submitted APER Forms</td>
                        <td class="text-center">{{ $aperForms->count() }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Total Number of Pending Forms</td>
                        <td class="text-center">{{ $pendingAperForms->count() }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Total Number in Evaluation</td>
                        <td class="text-center">{{ $aperFormsEvaluationInProgress->count() }}</td>
                    </tr>
                    <tr>
                        <td scope="row">Total Number Finalized</td>
                        <td class="text-center">{{ $aperFormsEvaluationFinalized->count() }}</td>
                    </tr>
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
</div>

@endsection

