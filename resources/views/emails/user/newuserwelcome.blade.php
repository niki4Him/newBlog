@component('mail::message')
# Welcome {{$user->name}}

Thanks for signing up. **We really appreaciate** it. Let us know if we can do more to please you!

@component('mail::panel')
The email address you signed up with is: {{$user->email}}
@endcomponent



@component('mail::button', ['url' => 'posts.index'])
View My Dashboard
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
