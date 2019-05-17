@extends('layouts.admin')
@section('content')
@include('includes.errors')
<div class="col-sm-9 col-md-9 col-lg-6 mx-auto" role="columnheader">
    <!-- main content -->
    <div class="card card-signin my-5">
        <!-- card content -->
        <div class="card-body" style="padding:60px 20px">
            <h5 class="card-title text-center text-success" role="heading">Create Inventory</h5>
            <!-- form -->

            {!! Form::open([
                
                'action'=>'InventoryController@store',
                'method'=>'POST',
                
                ]) !!}

                <div class="row" style="margin-bottom:30px; margin-top:30px">
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <div class="form-label-group">
                            {!! Form::label('category' , 'Enter category name:' , ['style'=>'font-size:16px']) !!}
                            {!! Form::text('category' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter category name' , 'style'=>'padding:10px']) !!}
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:30px; margin-top:30px">
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <div class="form-label-group">
                            {!! Form::label('qty' , 'Enter Quantity:' , ['style'=>'font-size:16px']) !!}
                            {!! Form::number('qty' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter Quantity' , 'style'=>'padding:10px']) !!}
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