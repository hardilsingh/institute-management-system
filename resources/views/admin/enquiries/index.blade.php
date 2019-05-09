@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-lg-12">
        <h5 class="display-4">
            Enquiries

        </h5>
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
                <th scope="col">Date</th>
                <th scope="col">Course</th>
                <th scope="col">Address</th>
                <th scope="col">Telephone</th>
                <th scope="col">Education</th>
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
                <td>{{$enquiry->created_at}}</td>
                <td>{{$enquiry->course->name}}</td>
                <td>{{substr($enquiry->address , 0 , 10)}}..</td>
                <td>{{$enquiry->tel_no}}</td>
                <td>{{$enquiry->edu}}</td>
                <td>{{$enquiry->follow_up}}</td>
                <td>{{substr($enquiry->remarks , 0 , 30)}}</td>
                <td style="display:flex; justify-content:space-evenly">
                    <a href="{{route('enquiry.edit' , $enquiry->id)}}" class="btn btn-success">View</a>
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