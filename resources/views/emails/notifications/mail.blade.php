@component('mail::message')


# {{$notification->subject}}

{{$notification->body}}<br>
Najgolem broj na samoglaski sodrzi zborot {{ $word}} so broj na samoglaski {{$count}}. Slednite samoglaski se naogjaat vo ovoj zbor {{$vowels}}:



Thanks,<br>
Marketing Platform
@endcomponent
