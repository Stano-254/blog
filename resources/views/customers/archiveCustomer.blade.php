
@extends('layouts.app')
@section('title')
    Customer List
@endsection
@section('content')
<h4>customers page</h4>
    <form action="customers" method="post"class="pt-3">
       <div class="form-group">
           <label for="name">Name</label>
           <span class="alert-danger" role="alert">{{$errors->first('name')}}</span>
           <input type="text" name="name" id="name" class="form-control" value="{{old('name')}}">
       </div>

        <div class="form-group">
           <label for="email">Email</label>
            <div>{{$errors->first('email')}}</div>
           <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
        </div>

        <div class="form-group">
           <label for="active">Status</label>
            <div>{{$errors->first('active')}}</div>
            <select name="active" id="active" class="form-control" >
                <option  disabled selected>select status</option>
                <option value="1">Active</option>
                <option value="0">Inactive</option>
            </select>
        </div>

        <div class="form-group">
           <label for="company_id">Company</label>
{{--            <div>{{$errors->first('company')}}</div>--}}
            <select name="company_id" id="company_id" class="form-control">
{{--                <option  disabled selected>select Company</option>--}}
                @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach
            </select>
       </div>
        @csrf
        <button type="submit" class="btn btn-primary">Add Customer</button>
    </form>
    <hr>
    <h3 class="offset-md-4 text-primary ">Customer list</h3>
        <hr style="width: 70%">
    <div class="row">
        <div class="col-6">
            <h4>Active Customers</h4>
            <table   class="table  table-striped  table-bordered" >
                <thead class="bg-dark text-white">
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                </thead>
                @foreach( $activecustomers as $activecustomer)
                    <tr><td >{{$activecustomer->name}}</td> <td >{{$activecustomer->email}}</td>  <td>{{$activecustomer->company->name}}</td></tr>
                @endforeach
            </table>

        </div>
        <div class="col-6 border-left">
            <h4>Inactive Customers</h4>
            <table   class="table  table-striped  table-bordered" >
                <thead class="bg-dark text-white">
                <th>Name</th>
                <th>Email</th>
                <th>Company</th>
                </thead>
                @foreach( $inactivecustomers as $inactivecustomer)
                    <tr><td >{{$inactivecustomer->name}}</td> <td >{{$inactivecustomer->email}}</td>  <td>{{$inactivecustomer->company->name}}</td></tr>
                @endforeach
            </table>

        </div>


        <div class="col-6 border-left">
            <h4>Company Customers</h4>
            <table   class="table  table-striped  table-bordered" >
                <thead class="bg-dark text-white">
                <th>Name</th>
                <th>Email</th>
                <th>status</th>
                </thead>
                @foreach( $companies as $company)
                    <tr><td class="bg-info " colspan="12">{{$company->name}}</td></tr>
                    @foreach($company->customer as $customer)
                    <tr><td >{{$customer->name}}</td> <td >{{$customer->email}}</td>  <td>{{$customer->active}}</td></tr>
                @endforeach
              @endforeach
            </table>

        </div>

    </div>



@endsection
