@component('mail::message')
# Creacion de Libros

Estimado:<br>
Se publico un nuevo libro por el usuario {{$user}}, lleva como titulo {{$title}}.

@component('mail::button', ['url' => $path])
Click para ver el Libro
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
