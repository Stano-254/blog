<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function create(){

        return view ('contacts.create');
    }

    public function store(){
        $data = request()->validate( ['name' =>'required',
            'email' =>'required | email',
            'message'=>'required',
        ]);
// send mail
        Mail::to('test@stanodeveloper.com')->send(new ContactFormMail($data));
        return redirect (route('contacts.create'))->with('message','Thanks for your message we\'ll be in touch');


    }
}
