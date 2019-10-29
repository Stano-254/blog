@extends('layouts.app')
@section('title')
    Contact us
@endsection

@section('content')
    <h1>contact us </h1>

        <form action="{{route('contacts.store')}}" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <div>{{$errors->first('name')}}</div>
                <input type="text" id="name" name="name" class="form-control" value="{{old('name')}}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <div>{{$errors->first('email')}}</div>
                <input type="text" id="email" name="email" class="form-control" value="{{old('email')}}">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <div>{{$errors->first('message')}}</div>
                <textarea name="message" id="message" class="form-control" cols="30" rows="10">{{old('message')}}</textarea>
            </div>
            @csrf
            <button type="submit" class="btn btn-info">Send Message</button>
        </form>

    @endsection
