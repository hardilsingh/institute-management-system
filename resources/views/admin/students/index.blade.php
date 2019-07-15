@extends('layouts.admin')
@section('content')

<h5 class="display-4" style="margin-bottom:50px">
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

@if(Session::has('downloading'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('downloading') }}</div>
    </div>
</div>
@endif
@if(count($students))
<div class="col-lg-6" style="margin-bottom:50px">
    <a href="/students/downloadExcel" class="btn btn-primary btn-lg">Export excel file</a>
</div>
@endif

@if(!count($students))
<div class="col-lg-6" style="margin-bottom:50px">
    <a href="/students/downloadExcel" class="btn btn-primary btn-lg" disabled>Export excel file</a>
</div>
@endif


<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Course</th>
                <th scope="col">Batch</th>
                <th scope="col">Telephone</th>
                <th scope="col">Regis. No</th>
                <th scope="col">Action</th>
                <th scope="col" class="text-center">Course 1</th>
                <th scope="col" class="text-center">Course 2</th>

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
                <td style="width:150px">{{$student->course->name}}
                    @if($student->course2)
                    ,{{$student->course2->name}}
                    @endif
                </td>

                <td>{{$student->batch->from}}:00 - {{$student->batch->to}}:00</td>
                <td>+91 {{$student->tel_no}}</td>
                <td>{{$student->reg_no}}</td>
                <td>
<div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
<a href="{{route('students.show' , $student->id)}}" class="btn btn-warning dropdown-item">View</a>
		@if($student->feemanager_id->slug) 

                    <a href="{{route('feemanager.edit' , $student->feemanager_id->slug)}}" class="btn btn-primary dropdown-item">Fee Manager</a>
                @endif

                     {!! Form::model($student , [
                    'action'=>['StudentsController@destroy' , $student->id],
                    'method'=>'DELETE',
                    ]) !!}

                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger dropdown-item']) !!}

                    {!! Form::close() !!} 


      </div>
</div>


                    

                    <!-- <a href="{{route('feemanager.edit' , $student->id)}}" class="btn btn-warning">Manage</a> -->
                </td>
                <td class="text-center">
                    @if($student->completed_1 == 0)
<span style="width:80%; padding:8px 2px; color:white; background-color:black; display:block">
{{Carbon\Carbon::parse($student->date_end)->diffInDays()}} days
</span>
                    
                    @endif
                    @if($student->completed_1 == 1)
                    <span style="font-weight:bold; color:green; font-size:22px"><i class="fas fa-check-circle"></i></span>
                    @endif

                </td>

                @if($student->date_end_2)
                <td class="text-center text-danger">
                    @if($student->completed_2 == 0)
<span style="width:80%; padding:8px 2px; color:white; background-color:black; display:block">
{{Carbon\Carbon::parse($student->date_end_2)->diffInDays()}} days
</span>

                    @endif
                    @if($student->completed_2 == 1)
                    <span style="font-weight:bold; color:green; font-size:22px"><i class="fas fa-check-circle"></i></span>
                    @endif
                </td>
                @endif
                @if(!$student->date_end_2)
                <td class="text-center text-danger"><i class="fas fa-times"></i></td>
                @endif
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