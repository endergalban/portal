@component('mail::message')
Has recibido un mensaje<br>

Nombre: {{ $nombre}}<br>
Correo: {{ $email }}<br>
Asunto: {{ $asunto }}<br>
Mensaje: {{ $mensaje }}<br>

{{ config('app.name') }}
@endcomponent
