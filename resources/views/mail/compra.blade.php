@component('mail::message')
Has comprado el siguiente producto<br>

Descripcion: {{ $descripcion}}<br>
Cantidad: {{ $cantidad }}<br>
Monto: {{ $monto }}<br>

<strong>Datos del Vendedor</strong><br>
Nombre: {{ $vendedor }}<br>
Telefono: {{ $telefono }}<br>
Correo: {{ $email }}<br>

Gracias,<br>
{{ config('app.name') }}
@endcomponent
