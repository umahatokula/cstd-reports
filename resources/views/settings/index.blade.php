@extends('master')
@section('content')
                    
                        <div class="row">
                            <div class="col-12">
                                <div class="card mb-3 widget-content">
                                   <h1 class="h4">Settings</h1> 
                                </div>
                            </div>
                        </div>

<div class="row">
    <div class="col-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style:none">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @include('flash::message')
    </div>
    <div class="col-6">
        <p>
          @isset($settings->where('setting_type', 'monthly_report')->first()->open)
            Opens: {{$settings->where('setting_type', 'monthly_report')->first()->open->toFormattedDateString()}}
            @endisset
        </p>
        <p>
          @isset($settings->where('setting_type', 'monthly_report')->first()->close)
            Closes: {{$settings->where('setting_type', 'monthly_report')->first()->close->toFormattedDateString()}}
            @endisset
        </p>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Monthly Report Open and Close Dates</h5>
                <p class="card-text">
                    <form method="post" action="{{ route('settings.storeMonthlyReport') }}">
                        @csrf
                        <div class="form-group">
                            <label for="mr_open">Open Form</label>
                            <input id="mr_open" class="form-control" type="date" name="mr_open"
                                value="{{ old('mr_open') }}">
                        </div>
                        <div class=" form-group">
                            <label for="mr_close">Close Form</label>
                            <input id="mr_close" class="form-control" type="date" name="mr_close"
                                value="{{ old('mr_close') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Set</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
    <div class="col-6">
        <p>
          @if($settings->where('setting_type', 'apper')->first()->open)
            Opens: {{$settings->where('setting_type', 'apper')->first()->open->toFormattedDateString()}}
            @endif
        </p>
        <p>
          @if($settings->where('setting_type', 'apper')->first()->close)
            Closes: {{$settings->where('setting_type', 'apper')->first()->close->toFormattedDateString()}}
            @endif
        </p>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">APER Open and Close Dates</h5>
                <p class="card-text">
                    <form method="post" action="{{ route('settings.storeAPPER') }}">
                        @csrf
                        <div class="form-group">
                            <label for="apper_open">Open Form</label>
                            <input id="apper_open" class="form-control" type="date" name="apper_open"
                                value="{{ old('apper_open') }}">
                        </div>
                        <div class="form-group">
                            <label for="apper_close">Close Form</label>
                            <input id="apper_close" class="form-control" type="date" name="apper_close"
                                value="{{ old('apper_close') }}">
                        </div>
                        <button class="btn btn-primary" type="submit">Set</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
