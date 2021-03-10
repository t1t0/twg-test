@component('mail::message')
# Publication {{ $publication }}

Your Publication received a new comment

> {{ $comment }}
by {{ $user }}

@endcomponent