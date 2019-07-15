@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-12">
        <h5 class="display-4">
            Courses
        </h5>
    </div>
</div>

@if(Session::has('course_created'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('course_created')}}</div>

</div>
@endif


@if(Session::has('course_deleted'))
<div class="col-lg-6">
    <div class="alert alert-danger">{{session('course_deleted')}}</div>

</div>
@endif

@if(Session::has('course_updated'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('course_updated')}}</div>

</div>
@endif

<div class="col-lg-6" style="margin-bottom:50px">
    <a href="{{route('course.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus" style="margin-right:7px;"></i>Add Course</a>

</div>



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Duration</th>
                <th scope="col">Hours</th>
                <th scope="col">Fee</th>
                <th scope="col">Centre</th>
                <th scope="col">delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @if($courses)
            @foreach($courses as $course)

            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$course->name}}</td>
                <td>{{$course->duration}} days</td>
                <td>{{$course->hours}} hrs</td>
                <td>₹ {{$course->fee}}</td>
                <td>{{$course->centre->name}}</td>
                <td>{!! Form::model($course , [
                    'action'=>['CoursesController@destroy' , $course->id],
                    'method'=>'DELETE'
                    ]) !!}
                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
                <td><a href="{{route('course.edit' , $course->slug)}}" class="btn btn-secondary">Edit</a></td>


            </tr>

            @endforeach
            @endif
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$courses->render()}}
        </ul>
    </nav>
</div>


@endsection