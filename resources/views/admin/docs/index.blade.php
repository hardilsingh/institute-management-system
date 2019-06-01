@extends('layouts.admin')
@section('content')
@include('includes.errors')

<div class="row" style="margin-bottom:50px">
    <div class="col-lg-12">
        <h6 class="display-4">
            Documents Issued
        </h6>
    </div>
</div>




@if(Session::has('updated'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('updated') }}</div>
    </div>
</div>
@endif


<div class="col-sm-9 col-md-9 col-lg-6 mx-auto" role="columnheader">
    <!-- main content -->
    <div class="card card-signin my-5">
        <!-- card content -->
        <div class="card-body" style="padding:60px 20px">
            <h5 class="card-title text-center text-success" role="heading">Search Document</h5>
            <!-- form -->

            {!! Form::open([
                
                'action'=>'DocsController@search',
                'method'=>'GET'
                
                ]) !!}

                <div class="row" style="margin-bottom:30px; margin-top:30px">
                    <div class="col-sm-9 col-md-9 col-lg-8 mx-auto">
                        <div class="form-label-group">
                            {!! Form::label('keyword' , 'Enter search item:' , ['style'=>'font-size:16px']) !!}
                            {!! Form::text('keyword' , null , ['class'=>'form-control ' , 'placeholder'=>'Enter Phone no, Name, Registration no' , 'style'=>'padding:10px']) !!}
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



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Reg no</th>
                <th scope="col">Id Card</th>
                <th scope="col">Certificate</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            @if(isset($_GET['keyword']))

            @php
            $i = 1
            @endphp
            @foreach($docs as $doc)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                {!! Form::model( $doc ,[
                'action'=>['DocsController@update' , $doc->id],
                'method'=>'PATCH',
                ]) !!}
                <td>{{$doc->student->name}}</td>
                <td>{{$doc->course->name}} ..</td>
                <td>{{$doc->student->reg_no}}</td>
                <td>{!! Form::select('id_card' , array('0'=>'not issued' , '1'=>'issued') , $doc->id_card , ['class'=>'form-control text-capitalize'] ) !!}</td>
                <td>{!! Form::select('certificate' , array('0'=>'not issued' , '1'=>'issued') , $doc->certificate , ['class'=>'form-control text-capitalize'] ) !!}
                    @if($doc->certificate == 1)
                    {!! Form::text('certificate_number' , null , ['class'=>'form-control' , 'placeholder'=>'Certificate Number' ,'style'=>'margin-top:10px']) !!}
                    @endif
                </td>
                <td>{!! Form::submit('Update' , ['class'=>'btn btn-success']) !!}</td>
                {!! Form::close() !!}
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection