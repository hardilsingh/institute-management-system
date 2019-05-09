@extends('layouts.admin')
@section('content')

<div class="col-sm-9 col-md-9 col-lg-6 mx-auto" role="columnheader">
    <!-- main content -->
    <div class="card card-signin my-5">
        <!-- card content -->
        <div class="card-body" style="padding:60px 20px">
            <h5 class="card-title text-center text-success" role="heading">Search Student Profile</h5>
            <!-- form -->

            <form action="/profile/search" method="GET">

                <div class="row" style="margin-bottom:30px; margin-top:30px">
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <div class="form-label-group">
                            {!! Form::label('search_result' , 'Enter search item:' , ['style'=>'font-size:16px']) !!}
                            {!! Form::text('search_result' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter Phone no, Name, Registration no' , 'style'=>'padding:10px']) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto text-center">
                        {!! Form::submit('Search &rarr;' , ['class'=>'btn btn-success']) !!}
                    </div>
                </div>
            </form>
            <!-- /.form -->
        </div>
        <!-- /.card content -->
    </div>
    <!-- /.main content -->
</div>

@endsection