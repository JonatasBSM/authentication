@component('mail::message')
    Click in this link to change your password

    @component('mail::button', ['url' => route('resetPassword', ['token' => $token])])Change Password

@endcomponent
