@component('mail::message')
# thank you for conctacting us
The body of your message.<br>
    <strong>Name :</strong>{{$data['name']}} <br>
    <strong>Email :</strong>{{$data['email']}} <br>
    <strong>Message : </strong>
    {{$data['message']}}

@endcomponent
