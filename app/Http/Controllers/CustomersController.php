<?php

namespace App\Http\Controllers;


use App\Company;
use App\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function index(){
        $customers = Customer::all();
//          $activecustomers = Customer::active()->get();
//          $inactivecustomers = Customer::inactive()->get();
          $companies = Company::all();

          return view('customers.index',compact('customers','companies'));
    }
    public function create(){
        $customer= new Customer();
        $companies = Company::all();
        return view('customers.create',compact('customer','companies'));
    }




    public function store(){



        Customer::create($this->validateRequest());


//        $customer = new Customer();
//        $customer->name=request('name');
//        $customer->email=request('email');
//        $customer->active=request('active');
//        $customer->save();
        return redirect('customers');
    }

    /**
     * @param Customer $customer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public  function show(Customer $customer){


       return view ('customers.show',compact('customer'));
    }
    public function edit(Customer $customer){
        $companies = Company::all();
        return view('customers.edit',compact('customer','companies'));
    }

    public function update(Customer $customer){

        $customer->update($this->validateRequest());
        return redirect('customers/'.$customer->id);
    }

    public function destroy(Customer $customer){
        $customer->delete();

        return redirect('customers');
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
