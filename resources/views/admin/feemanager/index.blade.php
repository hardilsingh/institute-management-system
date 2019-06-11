@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-6">
        <h5 class="display-4">
            Student Fee Manager
        </h5>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fas fa-rupee-sign text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Total Collection</p>
                            <p class="card-title">{{$total_fee - $total_balance}}
                                <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
            <div class="card-body ">
                <div class="row">
                    <div class="col-5 col-md-4">
                        <div class="icon-big text-center icon-warning">
                            <i class="fas fa-rupee-sign text-success"></i>
                        </div>
                    </div>
                    <div class="col-7 col-md-8">
                        <div class="numbers">
                            <p class="card-category">Total Due</p>
                            <p class="card-title">{{$total_balance}}
                                <p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row" style="margin-bottom:50px">
    <div class="col-lg-12">
        <a href="/dues" class="btn btn-warning btn-lg">Check Dues</a>
    </div>
</div>

@if(Session::has('fee_updated'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('fee_updated') }}</div>
    </div>
</div>
@endif

<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Course</th>
                <th scope="col">Course Fee</th>
                <th scope="col">Last Transaction</th>
                <th scope="col">Balance</th>
                <th scope="col">Due date</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($fees as $fee)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$fee->student->name}}</td>
                <td>{{$fee->student->reg_no}}</td>
                <td>{{$fee->course->name}}
                    @if($fee->course2)
                    ,{{$fee->course2->name}}
                    @endif
                </td>
                <td>₹ {{$fee->course2 ? $fee->course->fee + $fee->course2->fee : $fee->course->fee}}</td>
                <td>₹ {{$fee->paid_fee}}</td>
                <td>₹{{$fee->balance}}</td>
                <td>{{$fee->due_date}}</td>
                <td style="display:flex; justify-content:space-evenly">
                    <a href="{{route('feemanager.edit' , $fee->slug)}}" class="btn btn-success">Manage</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$fees->render()}}
        </ul>
    </nav>
</div>

<hr style="margin-top:10px">

<div class="row">
    <div class="col-lg-4">
        {!! Form::open([

        'action'=>'FeeManagerController@search_date',
        'method'=>'GET',

        ]) !!}

        <div class="form-group">
            {!! Form::label('start_date' ,  'Enter start date:') !!}
            {!! Form::date('start_date' , null , ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('end_date' ,  'Enter end date:') !!}
            {!! Form::date('end_date' , null ,  ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Search' , ['class'=>'btn btn-success']) !!}
        </div>

        {!! Form::close() !!}
    </div>
</div>










@endsection