@extends('layouts2.master2')
@section('titulo',"CriptoControl")
@section('contenido')
<div class="container my-4">

<div class="bg-light p-5 rounded">
    <h1>{{ $usuario->name }}</h1>
   
     @if($usuario->fotografia!= null)
    <div class="col-md-3" >
         <img class="card-img-top" src="{{$usuario->fotografia}}" alt="Imagen de {{ $usuario->nombre }}">
     </div>
    @endif
    <hr>
    @if (auth()->user()->rol->key == 'Admin')
    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteuser"data-id="{{$usuario->id}}">Banear Usuario</button>
    <br>
    <div class="modal fade" id="deleteuser" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ¿Está seguro/a de banear el usuario seleccionada?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      
                    <form id="formularioBorrado" action="{{ route('usuarios.destroy', 0) }}"
                        data-action="{{ route('usuarios.destroy', 0) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">Banear Usuario</button>
                    </form>
                </div>
            </div>
        </div>
      </div>
  
    @endif
    <h4>Inversor@: {{ $usuario->surname }}</h4>
    <h4>Cumpleaños: {{$usuario->fecha_nacimiento->format('d-m-Y')}}</h4>
    <div class="votosRecetas">
         {{-- <h6>Votos Totales: {{$sumaVotos}}</h6> --}}
    </div>   
   
 <br>
 {{-- <a href="{{route('usuarios.edit', Auth::usuario()->id)}}" class="btn btn-primary">Editar perfil</a> --}}
</div>  
</div>  
<div  class="container my-4">
    @if(count($posts) != 0)
        @foreach($posts as $post)
        <div class="col-md-3" style="float:left">
            <div class="card mb-2">
                <img class="card-img-top"
                src="/imagenes/{{$post->foto}}" alt="Card image cap">
                <div class="card-body">
                <h4 class="card-title">{{substr($post->titulo,1,15) }}..</h4>
                <p class="card-text">Votos: </p>
                
                <a class="btn btn-primary" href="/post/{{$post->id}}">Ver Noticia</a>
                </div>
            </div>
            </div>
        @endforeach
    @else
    <h1 class="text-center"><a href="/post">OOPS no hai noticias.Se el primero en publicar una publicación </a></h1>
    @endif
    </div>

  

@endsection()
@section('scripts')
<script>

    $('#deleteuser').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var id = button.data('id') // Extract info from data-* attributes
        console.log(id);
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-title').text('Olvidando Publicación con id: ' + id)

        // Cogemos el accion del data-action por que éste no cambia a lo largo de los distintos borrados.
        // Y así no tenemos problemas al intentar borrar registros con más de 1 dígito o que nos mantenga los dígitos del registro borrado anteriormente.
        accion = $("#formularioBorrado").attr("data-action").slice(0, -1) + id
        $("#formularioBorrado").attr('action', accion)
    })
  </script>
@endsection()
