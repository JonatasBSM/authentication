@component('mail::message')
    Click in this link to change your password

    [teste]('/reset-password/{{$token}}/{{$email}}')

    <a  href="http://127.0.0.1:8000/reset-password/{{$token}}/{{$email}}">teste2</a>

@endcomponent
