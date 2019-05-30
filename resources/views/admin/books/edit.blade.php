@extends('layouts.admin')
@section('content')
@include('includes.errors')
<div class="col-sm-9 col-md-9 col-lg-6 mx-auto" role="columnheader">
    <!-- main content -->
    <div class="card card-signin my-5">
        <!-- card content -->
        <div class="card-body" style="padding:60px 20px">
            <h5 class="card-title text-center text-success" role="heading">Edit Book</h5>
            <!-- form -->

            {!! Form::model($book , [

            'action'=>['BooksController@update' , $book->id],
            'method'=>'PATCH',

            ]) !!}

            <div class="row" style="margin-bottom:30px; margin-top:30px">
                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                    <div class="form-label-group">
                        {!! Form::label('name' , 'Enter book name:' , ['style'=>'font-size:16px']) !!}
                        {!! Form::text('name' , $book->name , ['class'=>'form-control ' , 'placeholder'=>'Enter book name' , 'style'=>'padding:10px']) !!}
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:30px; margin-top:30px">
                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                    <div class="form-label-group">
                        {!! Form::label('total' , 'Enter Total:' , ['style'=>'font-size:16px']) !!}
                        {!! Form::number('total' , $book->total , ['class'=>'form-control ' , 'placeholder'=>'Enter total stock' , 'style'=>'padding:10px']) !!}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-9 col-md-9 col-lg-8 mx-auto text-center">
                    {!! Form::submit('Save &rarr;' , ['class'=>'btn btn-success']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <!-- /.form -->
        </div>
        <!-- /.card content -->
    </div>
    <!-- /.main content -->
</div>

@endsection