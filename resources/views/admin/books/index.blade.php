@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-12">
        <h5 class="display-4">
            Books
        </h5>
    </div>
</div>

@if(Session::has('book_created'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('book_created')}}</div>

</div>
@endif


@if(Session::has('book_deleted'))
<div class="col-lg-6">
    <div class="alert alert-danger">{{session('book_deleted')}}</div>

</div>
@endif

@if(Session::has('book_updated'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('book_updated')}}</div>

</div>
@endif

<div class="col-lg-6" style="margin-bottom:50px">
    <a href="{{route('books.create')}}" class="btn btn-primary btn-lg">Add Book</a>

</div>



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Available Stock</th>
                <th scope="col">Total Stock</th>
                <th scope="col">delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @if($books)
            @foreach($books as $book)

            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$book->name}}</td>
                <td>{{$book->stock}} pcs</td>
                <td>{{$book->total}} pcs</td>
                <td>{!! Form::model($book , [
                    'action'=>['BooksController@destroy' , $book->id],
                    'method'=>'DELETE'
                    ]) !!}
                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
                <td><a href="{{route('books.edit' , $book->id)}}" class="btn btn-secondary">Edit</a></td>


            </tr>

            @endforeach
            @endif
        </tbody>
    </table>
    
</div>


@endsection