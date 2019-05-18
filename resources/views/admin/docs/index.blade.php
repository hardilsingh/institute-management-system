@extends('layouts.admin')
@section('content')
@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

@stop

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

<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Reg no</th>
                <th scope="col">Id Card</th>
                <th scope="col">Books</th>
                <th scope="col">Certificate</th>
                <th scope="col">Update</th>
            </tr>
        </thead>
        <tbody>
            @if(count($docs) > 0)
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
                <td>{!! Form::select('id_card' , array('0'=>'not issued' , '1'=>'issued') , $doc->id_card , ['class'=>'form-control text-capitalize']  ) !!}</td>
                <td>{!! Form::select('books' , array('0'=>'not issued' , '1'=>'issued') , $doc->books , ['class'=>'form-control text-capitalize']  ) !!}</td>
                <td>{!! Form::select('certificate' , array('0'=>'not issued' , '1'=>'issued') , $doc->certificate , ['class'=>'form-control text-capitalize']  ) !!}
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
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$docs->render()}}
        </ul>
    </nav>
</div>

@endsection