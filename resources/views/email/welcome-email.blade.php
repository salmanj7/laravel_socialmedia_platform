<x-mail::message>
# Welcome To CodeGram!
# Hi {{$user->name}}!

This is a community of fellow developers and we love that you have joined us.

<x-mail::button :url="''">
Button Text
</x-mail::button>

All the best,<br>
{{ config('app.name') }}
</x-mail::message>
