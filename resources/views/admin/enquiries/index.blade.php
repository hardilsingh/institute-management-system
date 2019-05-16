@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h6 class="display-4">
            Enquiries
        </h6>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <a href="{{route('enquiry.create')}}" class="btn btn-primary btn-lg">Create</a>
    </div>
</div>



@if(Session::has('enquiry_followed_up'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('enquiry_followed_up') }}</div>
    </div>
</div>
@endif

@if(Session::has('enquiry_created'))
<div class="row">
    <div class="col-lg-5">
        <div class="alert alert-success">{{ session('enquiry_created') }}</div>
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
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Follow up</th>
                <th scope="col">Remarks</th>
                <th scope="col">View</th>
            </tr>
        </thead>
        <tbody>
            @if(count($enquiries) > 0)
            @php
            $i = 1
            @endphp
            @foreach($enquiries as $enquiry)
            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$enquiry->name}}</td>
                <td>{{$enquiry->course->name}}</td>
                <td>{{substr($enquiry->address , 0 , 10)}}..</td>
                <td>{{$enquiry->tel_no}}</td>
                <td>{{$enquiry->follow_up}}</td>
                <td>{{substr($enquiry->remarks , 0 , 30)}}</td>
                <td style="display:flex; justify-content:space-evenly; align-items:center">
                    <a href="{{route('enquiry.edit' , $enquiry->slug)}}" class="btn btn-success">View</a>
                    @if($enquiry->enrolled !== 1 )
                    {!! Form::model($enquiry , [
                    'method'=>'POST',
                    'action'=>'EnrollmentContoller@store'
                    ]) !!}
                    <input type="hidden" name="name" value="{{$enquiry->name}}">
                    <input type="hidden" name="id" value="{{$enquiry->id}}">
                    <input type="hidden" name="father_name" value="{{$enquiry->father_name}}">
                    <input type="hidden" name="tel_no" value="{{$enquiry->tel_no}}">
                    <input type="hidden" name="gender" value="{{$enquiry->gender}}">
                    <input type="hidden" name="email" value="{{$enquiry->email}}">
                    <input type="hidden" name="edu" value="{{$enquiry->edu}}">
                    <input type="hidden" name="address" value="{{$enquiry->address}}">
                    <input type="hidden" name="school_name" value="{{$enquiry->school_name}}">
                    <input type="hidden" name="batch_id" value="{{$enquiry->batch_id}}">
                    <input type="hidden" name="course_id" value="{{$enquiry->course_id}}">
                    <input type="hidden" name="course_id_2" value="{{$enquiry->course_id_2}}">
                    {!! Form::submit('Enroll' , ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                    @endif
                    @if($enquiry->enrolled == 1 )
                    <span style="font-weight:bold">Enrolled</span>
                    @endif
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            {{$enquiries->render()}}
        </ul>
    </nav>
</div>








@endsection