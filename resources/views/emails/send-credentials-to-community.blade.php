@component('mail::message')
# Assalam-o-Alaikum {{$name}}

 Your Login Details are: <br>

# email: {{$email}} <br>
# password: {{$password}}

@component('mail::button', ['url' => route('login'),'color'=>'success'])
Go to Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
