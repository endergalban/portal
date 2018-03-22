@component('mail::message')
# Introduction

Has click en el botón mostrado a continuación para poder ingresar al sitio.

@component('mail::button', ['url' => $url])
Confirmar Usuario
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
