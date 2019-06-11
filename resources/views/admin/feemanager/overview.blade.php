@extends('layouts.admin')
@section('content')
@include('includes.errors')

<style>
    span {
        font-weight: bolder;
        font-size: 15px;
    }

    .card-title {
        font-weight: bolder;
    }
</style>

@if(Session::has('exists'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-danger">{{ session('exists') }}</div>
    </div>
</div>
@endif

<div class="row">
    <div class="col-lg-6">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Collection</h5>
                <p class="card-text">This shows the total fee collected by CBA infotech from <span>{{$_GET['start_date']}}</span>
                    to <span>{{$_GET['end_date']}}</span> </p>
                <h1>
                    <i class="fas fa-rupee-sign text-success"></i>
                    {{$total_fee - $total_balance}}
                </h1>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card" style="width: 100%;">
            <div class="card-body">
                <h5 class="card-title">Balance</h5>
                <p class="card-text">This shows the remaining balance from <span>{{$_GET['start_date']}}</span>
                    to <span>{{$_GET['end_date']}}</span> </p>
                <h1>
                    <i class="fas fa-rupee-sign text-success"></i>
                    {{$total_balance}}
                </h1>

            </div>
        </div>
    </div>
</div>
<hr style="margin-top:10px">

<div class="row">
    <div class="col-lg-4">
        {!! Form::open([

        'action'=>'FeeManagerController@search_date',
        'method'=>'GET',

        ]) !!}

        <div class="form-group">
            {!! Form::label('start_date' , 'Enter start date:') !!}
            {!! Form::date('start_date' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('end_date' , 'Enter end date:') !!}
            {!! Form::date('end_date' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Search' , ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>

@endsection