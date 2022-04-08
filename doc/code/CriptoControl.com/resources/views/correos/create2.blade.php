@extends('layouts2.master2')
@section('titulo',"CriptoControl")
@section('contenido')
<main class="container">
    <div class="bg-light p-5 rounded">
    <h1>Formulario de Contacto.</h1>
    <p>En caso de duda, error o información no dude en contactar con nosotros.En cuanto uno de nuestros desarrolladores esté disponible, recibirá un email con respuestas, le agradecemos su paciencia.</p>
    <form action={{ route('envioContactar') }} method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="" />
        </div>
        <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="" />
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="" />
        </div>
        <div class="form-group">
            <label for="name">Contenido</label>
            <textarea class="form-control" name="contenido"></textarea>
        </div>
        <label>Eres un robot? Demuestralo!:)</label>
                {{-- Recaptcha --}}
                {!! htmlFormSnippet() !!}
                <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Enviar correo</button>
        </div>
    </form>
</div>
</main>
@endsection