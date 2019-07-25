@extends('master')

@section('content')
    <section class="content-header">
        <h1>
            Unit
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('units.show_fields')
                    <a href="{!! route('units.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
