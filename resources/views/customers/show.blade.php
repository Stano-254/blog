@extends('layouts.app')
@section('title','Details for   '. $customer->name)
@section('content')
    <div class="row offset-4">
        <div class="col-12">
            <h3 class=" text-primary">Details for {{$customer->name}}</h3>
            <button type="button" class ="btn btn-outline-secondary " ><a href="/customers/{{$customer->id}}/edit">Edit</a> </button><br><br>
            <form action="/customers/{{$customer->id}}" method="post">
                @method('delete')
                @csrf
                <button type="submit" class ="btn btn-danger ">DELETE</button><br><br>
            </form>

        </div>
    </div>

    <div class="row offset-md-3">

        <div class="col-9">
            <table   class="table  table-striped  table-bordered" >
                <thead class="bg-dark text-white">

                <th colspan="2">{{$customer->name}}</th>
                </thead>
                <tr><td class="bg-dark text-white">ID</td><td>{{$customer->id}}</td></tr>
                <tr><td class="bg-dark text-white">Name</td><td>{{$customer->name}}</td></tr>
                <tr><td class="bg-dark text-white">Email</td><td>{{$customer->email}}</td></tr>
                <tr><td class="bg-dark text-white">Status</td><td>{{$customer->active}}</td></tr>
                <tr><td class="bg-dark text-white">Company</td><td>{{$customer->company->name}}</td></tr>
            </table>
        </div>
    </div>

@endsection
