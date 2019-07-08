@extends('layouts.admin')
@section('content')
@include('includes.errors')


@if(Session::has('created'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('created') }}</div>
    </div>
</div>
@endif


<div class="col-sm-9 col-md-9 col-lg-6 mx-auto" role="columnheader">
    <!-- main content -->
    <div class="card card-signin my-5">
        <!-- card content -->
        <div class="card-body" style="padding:60px 20px">
            <h5 class="card-title text-center text-success" role="heading">Enter Data</h5>
            <!-- form -->

            {!! Form::open([

            'action'=>'GenerateController@store',
            'method'=>'POST'

            ]) !!}

            <div class="row" style="margin-bottom:30px; margin-top:30px">
                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                    <div class="form-label-group" style="margin-bottom:10px">
                        {!! Form::label('name' , 'Enter Name:' , ['style'=>'font-size:16px']) !!}
                        {!! Form::text('name' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter name' , 'style'=>'padding:10px']) !!}
                    </div>
                    <div class="form-label-group" style="margin-bottom:10px">
                        {!! Form::label('paid_fee' , 'Enter Amount:' , ['style'=>'font-size:16px']) !!}
                        {!! Form::text('paid_fee' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter amount' , 'style'=>'padding:10px']) !!}
                    </div>
                    <div class="form-label-group" style="margin-bottom:10px">
                        {!! Form::label('item' , 'Enter Item:' , ['style'=>'font-size:16px']) !!}
                        {!! Form::text('item' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter item' , 'style'=>'padding:10px']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto text-center">
                    {!! Form::submit('Generate &rarr;' , ['class'=>'btn btn-success']) !!}
                </div>
            </div>
            </form>
            <!-- /.form -->
        </div>
        <!-- /.card content -->
    </div>
    <!-- /.main content -->
</div>



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Item</th>
                <th scope="col">transaction</th>
                <th scope="col">Created at</th>
                <th scope="col">number</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>

            @php
            $i = 1
            @endphp
            @foreach($reciepts as $reciept)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$reciept->name}}</td>
                <td>{{$reciept->item}}</td>
                <td>{{$reciept->paid_fee}}</td>
                <td>{{$reciept->created_at->toDateString()}}</td>
                <td>{{$reciept->number}}</td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection