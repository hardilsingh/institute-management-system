@extends('layouts.admin')
@section('content')

<h5 class="display-4">
    Students
</h5>
@if(Session::has('student_enrolled'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('student_enrolled') }}</div>
    </div>
</div>
@endif

@if(Session::has('student_del'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-danger">{{ session('student_del') }}</div>
    </div>
</div>
@endif

@if(Session::has('std_updated'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('std_updated') }}</div>
    </div>
</div>
@endif
<div class="col-lg-6">

</div>

<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Batch</th>
                <th scope="col">Telephone</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @foreach($students as $student)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$student->name}}</td>
                <td>{{$student->course->name}}, 
                    @if($student->course2->name){{$student->course2->name}}
                    @endif
                </td>

                <td>{{$student->batch->from}}:00 - {{$student->batch->to}}:00</td>
                <td>{{$student->tel_no}}</td>
                <td>{{$student->reg_no}}</td>
                <td style="display:flex; justify-content:space-evenly">
                    <a href="{{route('students.edit' , $student->slug)}}" class="btn btn-success">Edit</a>

                    {!! Form::model($student , [
                    'action'=>['StudentsController@destroy' , $student->id],
                    'method'=>'DELETE',
                    ]) !!}

                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}

                    {!! Form::close() !!}

                    <!-- <a href="{{route('feemanager.edit' , $student->id)}}" class="btn btn-warning">Manage</a> -->
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$students->render()}}
        </ul>
    </nav>
</div>








@endsection