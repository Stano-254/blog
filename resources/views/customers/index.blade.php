
@extends('layouts.app')
@section('title')
    Customer List
@endsection
@section('content')
    <div class="row">
    <div class="col-12">
{{--        <h3>Customer list</h3>--}}

    </div>
    </div>





    <h3 class="offset-md-4 text-primary ">Customer list</h3>

        <hr style="width: 70%">
    <button type="button" class ="btn btn-outline-secondary " ><a href="customers/create">Add Customer</a> </button><br><br>
    <div class="row">
        <div class="col-12">
            <table   class="table  table-striped  table-bordered" >
                <thead class="bg-dark text-white">
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                <th>status</th>
                </thead>
                @foreach( $customers as $customer)
                    <tr><td><a href="{{route('customers.show',['$customer'=>$customer])}}">{{$customer->name}}</a></td>
                        <td >{{$customer->email}}</td>  <td>{{$customer->company->name}}</td><td>{{$customer->active}}</td></tr>
                @endforeach
            </table>
            <div class="row">
                <div class="col-12 d-flex jumbotron-fluid justify-content-center pt-5 ">
                    {{$customers->links()}}
                </div>
            </div>
        </div>




    </div>



@endsection
