@extends('layouts.admin')
@section('content')

<div class="row" style="margin-bottom:30px">
    <div class="col-lg-12">
        <h5 class="display-4">
            Inventory
        </h5>
    </div>
</div>

@if(Session::has('inventory_created'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('inventory_created')}}</div>

</div>
@endif


@if(Session::has('inventory_deleted'))
<div class="col-lg-6">
    <div class="alert alert-danger">{{session('inventory_deleted')}}</div>

</div>
@endif

@if(Session::has('inventory_updated'))
<div class="col-lg-6">
    <div class="alert alert-success">{{session('inventory_updated')}}</div>

</div>
@endif

<div class="col-lg-6" style="margin-bottom:50px">
    <a href="{{route('inventory.create')}}" class="btn btn-primary btn-lg"><i class="fas fa-plus" style="margin-right:7px;"></i>Add Inventory</a>
</div>



<div class="col-lg-12">
    <table class="table table-hover text-capitalize">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Qty</th>
                <th scope="col">delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1
            @endphp
            @if($inventories)
            @foreach($inventories as $inventory)

            <tr>
                <td>
                    @php
                    echo $i++
                    @endphp
                </td>
                <td>{{$inventory->category}}</td>
                <td>{{$inventory->qty}} pcs.</td>
                <td>{!! Form::model($inventory , [
                    'action'=>['InventoryController@destroy' , $inventory->id],
                    'method'=>'DELETE'
                    ]) !!}
                    {!! Form::submit('Delete' , ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
                <td><a href="{{route('inventory.edit' , $inventory->slug)}}" class="btn btn-warning">Edit</a></td>


            </tr>

            @endforeach
            @endif
        </tbody>
    </table>
    
</div>


@endsection