@component('mail::message')
    Click in this link to conffirm your account

    @component('mail::button', ['url' => route('conffirmAccount', ['token' => $token, 'email' => $email])])Conffirm account

    @endcomponent
