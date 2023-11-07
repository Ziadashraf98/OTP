@component('mail::message')

Hi {{Auth::user()->name}}


Your Verification Code: {{$user_code}}

@component('mail::button', ['url' => route('verify.index')])
Link
@endcomponent


Thanks,<br>
{{Auth::user()->name}}

@endcomponent