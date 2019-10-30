<?php

namespace App\Http\Controllers;


use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;


class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }


    public function index(){

        $customers = Customer::all();

          $companies = Company::all();

          return view('customers.index',compact('customers','companies'));
    }


    public function create(){

        $customer= new Customer();

        $companies = Company::all();

        return view('customers.create',compact('customer','companies'));
    }


    public function store(){

       $customer= Customer::create($this->validateRequest());

       event(new NewCustomerHasRegisteredEvent($customer));

       return redirect(route('customers.index'));
    }


    public  function show(Customer $customer){


       return view ('customers.show',compact('customer'));
    }


    public function edit(Customer $customer){

        $companies = Company::all();

        return view('customers.edit',compact('customer','companies'));
    }


    public function update(Customer $customer){

        $customer->update($this->validateRequest());

        return redirect(route('customers.show',[$customer->id]));
    }


    public function destroy(Customer $customer){

        $customer->delete();

        return redirect( route('customers.index'));
    }


    private function validateRequest()
    {
          return request()->validate([
            'name'=>'required | min:3',
            'email'=>'required',
            'active'=>'required',
            'company_id'=>'required',
        ]);

    }

}
