@extends('layouts.app')
@section('title','Add New Customer')
@section('content')
    <div class="row">
        <div class="col-12">
            <h3>Add New Customer</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{route('customers.store')}}" method="post"class="pt-3">
            @include('customers.form')
            @csrf
            <button type="submit" class="btn btn-primary">Add Customer</button>
            </form>
        </div>
    </div>
 @endsection
