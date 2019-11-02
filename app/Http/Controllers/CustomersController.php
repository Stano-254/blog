<?php

namespace App\Http\Controllers;


use App\Company;
use App\Customer;
use App\Events\NewCustomerHasRegisteredEvent;
use Intervention\Image\Facades\Image;


class CustomersController extends Controller
{

    public function __construct()
    {
//        $this->middleware('auth')->except(['index','show']);
    }


    public function index(){

        $customers = Customer::with('company')->paginate(10);
//        dd($customers->toArray());

//          $companies = Company::all();

          return view('customers.index',compact('customers'));
    }


    public function create(){

        $customer= new Customer();


        $companies = Company::all();

        return view('customers.create',compact('customer','companies'));
    }


    public function store(){
      $this->authorize('create',Customer::class);
       $customer= Customer::create($this->validateRequest());
       $this ->storeImage($customer);


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
        $this ->storeImage($customer);

        return redirect(route('customers.show',[$customer->id]));
    }


    public function destroy(Customer $customer){

        $this ->authorize('delete',$customer);

        $customer->delete();

        return redirect( route('customers.index'));
    }


    private function validateRequest()
    {


         return tap(request()->validate([
             'name'=>'required | min:3',
             'email'=>'required',
             'active'=>'required',
             'company_id'=>'required',
         ]),function () {
             if (request()->hasFile('image')) {
                 request()->validate([
                     'image' => 'file|image|max:5000',

                 ]);

             }


         });
    }

    public  function storeImage($customer){
        if(request()->has('image')){
            $customer->update([
               'image'=>request()->image->store('uploads','public')
            ]);

            $image = Image::make(public_path('storage/'. $customer->image))->fit(200,200);
            $image->save();
        }
    }

}
