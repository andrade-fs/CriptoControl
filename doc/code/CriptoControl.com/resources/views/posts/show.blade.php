@extends('layouts2.master2')
@section('titulo',"CriptoControl")

@section('contenido')
<div class="container my-4">
	<p style="color:#212c37;font-weight :bold;"><a style="color:#01bec8;font-weight :bold;"href="/">Home</a>&nbsp;<svg class="svg-inline--fa fa-angle-right fa-w-2"width="7"; aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>&nbsp;<a style="color:#01bec8;font-weight :bold;" href="/categorias/{{ $categoria[0]->id }}">{{ $categoria[0]->nombre }}</a>&nbsp;<svg class="svg-inline--fa fa-angle-right fa-w-2"width="7"; aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>&nbsp;{{$post[0]->id}}</p>
</div>
<div  class="container my-4 textoLinea">
	<h3><b>{{ $post[0]->titulo }}</b></h3>
	<h6><b>{!! $post[0]->subtitulo !!}</b></h6>

</div>
{{-- CONTENT --}}

<div class="container my-4">
	<div class="row">

		<div class="col-xl-9 col-md my-2">
			<div class="card shadow mb-4">
					<!-- Card Header - Dropdown -->
				<div class="card border-bottom-info shadow h-100">
					<div class="row no-gutters align-items-center">
						<div class="col ">			
									<!-- Card Body -->
										<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
											<ol class="carousel-indicators">
											</ol>
											<div class="carousel-inner" id="imageInner" >
											<div class="carousel-item active">
												<img class="d-block" src="/imagenes/{{$post[0]->foto}}" alt="{{$post[0]->titulo}}">
											</div>
									</div>
							</div>									
						</div>
					</div>	
				</div>
			</div>
		</div>

		      <!-- Pie Chart -->
		<div class="col-xl-3 col-lg-2 my-2 d-none d-lg-block">
			<div class="card shadow mb-4">

				<!-- Card Header - Dropdown -->
				<div
					class="card-header py-3 d-flex flex-row align-items-center justify-content-between"  style="background-color:#212c37">
					<h6 class="m-0 font-weight-bold " style="color:#01bec8">Top 3 publicaciónes.</h6>
				</div>
				
				<!-- Card Body -->
				<div class="card-body py-4">
					@foreach($top3 as $top)
					<a href="/post/{{ $top->id }}">	<img width="60" src="/imagenes/{{ $top->foto }}"></img><p>{{substr($top->titulo, 0, 30)}}</p></a>
					@endforeach
				</div>
				
			</div>
		</div>

		<div class="col-xl-9 col-md my-0 py-0">

			<ol class="breadcrumb d-sm-flex align-items-center justify-content-between my-0">  
				<h6 class="mb-0 text-gray-800">por <a href="usuario/{{$user[0]->id}}">{{$user[0]->name}}</a> en {{ $post[0]->created_at->diffForHumans() }}</h6>
				@guest
				<a href="/categorias/{{ $categoria[0]->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="text-white-50"></i>{{ $categoria[0]->nombre }}</a>
					&nbsp;
					<div>
						<a href="https://t.me/criptocontrol"><i class="fab fa-2x fa-telegram"></i></a>
						&nbsp;
						<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i class="fa fa-2x fa-whatsapp" aria-hidden="true"></i>
						</a>

					</div>
				@endguest
				@auth
				<a href="/categorias/{{ $categoria[0]->id }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
					class="text-white-50"></i>{{ $categoria[0]->nombre }}</a>
				&nbsp;
				<div>
					<?php
						$user_reg = "noUser";
						foreach ($users_voto as $user_voto) {
							if(Auth::user()->id == $user_voto){
							$user_reg = "userAdd";
							}					
						}
						
		
						if($user_reg == "noUser"){
							?>
							<a class="text-dark"  href="{{route('post.votar', $post[0]->id)}}"><u><i class="far fa-2x fa-heart"></i></u></a>
							<?php
						}else{	
							?>				
							<a class="text-dark"  href="{{route('post.votar', $post[0]->id)}}"><u><i class="fas fa-2x fa-heart fa-2x"></i></u></a>
							<?php
						}
							?>
					
					{{-- <a href=""><i class="fas fa-2x fa-heart"></i></a>
					<i class="far fa-heart"></i> --}}
					&nbsp;
					<a href="https://t.me/criptocontrol"><i class="fab fa-2x fa-telegram"></i></a>
					<a href="whatsapp://send?text=The text to share!" data-action="share/whatsapp/share"><i class="fa fa-2x fa-whatsapp" aria-hidden="true"></i></a>

						@if (auth()->user()->rol->key == 'Admin')
						<button type="button" class="btn-small btn-danger" data-toggle="modal" data-target="#DeletePost"data-id="{{$post[0]->id}}">Borrar Publicación</button>
						<br>
						<div class="modal fade" id="DeletePost" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="deleteModalLabel"></h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										¿Está seguro/a de borrar la publicación seleccionada?
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						  
										<form id="formularioBorrado" action="{{ route('post.destroy', 0) }}"
											data-action="{{ route('post.destroy', 0) }}" method="POST">
											@method('DELETE')
											@csrf
											<button type="submit" class="btn btn-danger">Borrar Publicación</button>
										</form>
									</div>
								</div>
							</div>
						  </div>
						@endif
				</div>
				@endauth
			</ol>  
			<br>
			<h6 id="contenidoBlog" class="text-justify"> {{ $post[0]->contenido}}</h6>


			{{-- <h6 class="text-justify"><script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> --}}
				{{-- <ins class="adsbygoogle"
					 style="display:block; text-align:center;"
					 data-ad-layout="in-article"
					 data-ad-format="fluid"
					 data-ad-client="ca-pub-1136864055809181"
					 data-ad-slot="7039900854"></ins>
				<script>
					 (adsbygoogle = window.adsbygoogle || []).push({});
				</script></h6> --}}
		</div>  
		
		
		{{-- PUBLICIDAD --}}
		<div class="col-xl-3 col-lg-2 my-2 d-none d-lg-block">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<!-- Card Body -->
				<div class="card-body py-4">
					{{-- <h6>Publicidad</h6>

					<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1136864055809181"
     data-ad-slot="2748182491"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins> --}}
				</div>	
			</div>
		</div>

		
		<div class="col-xl-9 col-md my-0 py-0">
			<div  class="container my-4 textoLinea">
				<h5><b>Comentarios</b></h5>
			
			</div>
			
			<br>
		@if(count($comment)>0)
		@foreach ($comment as $comment)
		<p><a href="/usuarios/{{$comment->usuario_id}}">{{ $comment->usuario_nombre }} </a>{{$comment->created_at->diffForHumans()}}</p>
		<p class="text-justify">{{ $comment->comentario }}</p>
		@auth
		
			@if(Auth::user()->id == $comment->usuario_id)
			<button type="button" data-dismiss="modal" class="btn btn-danger" data-toggle="modal" data-target="#removeComment" data-id="{{$comment->id}}"><i class="fas fa-trash"></i></button>
			@elseif(auth()->user()->rol->key == 'Admin')
			<button type="button" data-dismiss="modal" class="btn btn-danger" data-toggle="modal" data-target="#removeComment" data-id="{{$comment->id}}"><i class="fas fa-trash"> ADMIN</i></button>
			@endif
		
		@endauth
		<hr>
	  @endforeach
		@else
			<h6 class="text-center">No tenemos ningún comentario, se el primeiro en comentar esta publicación!</h6>
		@endif
	
		  @auth
		  <br>
		<form action="{{route('coment.store')}}" method="POST">
			@csrf
			<div class="form-group row">
			<label for="comment">Deja tu comentario!</label>
			<input type="hidden" value="{{$post[0]->id}}" name="post_id"/>
			<textarea  class="form-control form-control-user @error('precio_compra') is-invalid @enderror"name="comentario" id="comentario" cols="30" rows="10">
				{{ old('comentario') }}
			</textarea>
		
		</div>
		<button type="submit" class="btn btn-primary">
			Publicar Comentario
		</button>
		</form>
@endauth
   {{-- Remove Modal --}}
   <div class="modal fade" id="removeComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="deleteModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				¿Está seguro/a de borrar el comentario seleccionada?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
  
				<form id="formularioBorrado2" action="{{ route('coment.destroy', 0) }}"
					data-action="{{ route('coment.destroy', 0) }}" method="POST">
					@method('DELETE')
					@csrf
					<button type="submit" class="btn btn-danger">Borrar comentario</button>
				</form>
			</div>
		</div>
	</div>
</div>

		</div>  



		{{-- PUBLICIDAD --}}
		  <div class="col-xl-3 col-lg-2 my-2 d-none d-lg-block">
			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<!-- Card Body -->
				<div class="card-body py-4">
					{{-- <h6>Publicidad</h6>

					<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1136864055809181"
     data-ad-slot="2748182491"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins> --}}
				</div>	
			</div>
		</div>


	</div>

</div>

{{-- COMENTARIOS --}}
<div class="container my-4">
</div>
@endsection
@section('scripts')
	<script>
		$( document ).ready(function() {
	
		str = $("#contenidoBlog").html();
		$("#contenidoBlog").html("");
		str = str.replace(/(?:\r\n|\r|\n)/g, '<br>');
		$("#contenidoBlog").html(str)
		console.log(str);
		});
		
	</script>

	<script>
		$('#removeComment').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var id = button.data('id') // Extract info from data-* attributes
			console.log(id);
			console.log("SI SEÑOR");
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.modal-title').text('Olvidando comentario con identificador: ' + id)
  
			// Cogemos el accion del data-action por que éste no cambia a lo largo de los distintos borrados.
			// Y así no tenemos problemas al intentar borrar registros con más de 1 dígito o que nos mantenga los dígitos del registro borrado anteriormente.
			accion = $("#formularioBorrado2").attr("data-action").slice(0, -1) + id
			$("#formularioBorrado2").attr('action', accion)
		})

		$('#DeletePost').on('show.bs.modal', function (event) {
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

	
@endsection
