@extends('layouts.app')
@section('title','Edit details of '. $customer->name)
@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Edit Details of {{$customer->name}}</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('customers.edit',['customer'=>$customer])}}" method="post"class="pt-3">
                @method('patch')
                @include('customers.form')
                <button type="submit" class="btn btn-info">Save Customer</button>
            </form>
        </div>
    </div>

@endsection
