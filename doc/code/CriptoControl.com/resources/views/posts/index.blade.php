@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')

      <!-- Page Heading -->
<ol class="breadcrumb mb-4 d-sm-flex align-items-center justify-content-between mb-4">  
	<h1 class="h3 mb-0 text-gray-800">Taller de Publicaciones</h1>
	<a href=""  data-toggle="modal" data-target="#addPost" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm addPost"><i class="fas fa-plus-square fa-2x float-right"></i></a>
</ol>        

{{-- MODAL ADD NEW POST --}}
<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h3 class="modal-title text-dark" id="exampleModalLabel" ><b>Crear Nueva Publicación</b></h3>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div> 
			<div class="modal-body">
				<div class="container-fluid">

					<form  method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
						
						@csrf
						<div class="form-group row">
							<label for="titulo">Titulo:</label>
							<input id="titulo" type="text" min="5" class="form-control form-control-user @error('titulo') is-invalid @enderror"
								placeholder="EJ: BTC ALCANZA NUEVO ATH!" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo">
						
								@error('titulo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						
						<div class="form-group row">
							<label for="subtitulo" class="form-label">Subtitulo:</label>
								<textarea id="subtitulo" class="form-control form-control-user @error('subtitulo') is-invalid @enderror"
								placeholder="EJ: Tras el dip del pasado lunes, ..." name="subtitulo"  >{{ old('subtitulo') }}</textarea>
								@error('subtitulo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>

						
						<div class="form-group row">
							<label for="contenido">Contenido:</label>
								<textarea id="contenido" class="form-control form-control-user @error('contenido') is-invalid @enderror"
								placeholder="Ej: En el analisis técnico btc, rompe media movil de 200 d.." name="contenido"  >{{ old('contenido') }}</textarea>
								@error('contenido')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="form-group row">
							<label for="categoria_id">Categoria:</label>
							<select class='mi-selector'  class="form-control form-control-user @error('precio_compra') is-invalid @enderror" name="categoria_id" id="categoria_id"  required>
							   
								  @for ($i = 0; $i < count($categorias); $i++) 
									<?php 
										echo "<option value='{$categorias[$i]->id}'>{$categorias[$i]->nombre}</option>";
									?>
								@endfor 

									
							</select>
								@error('categoria_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="form-group row">
							<label for="foto">Fotografia:</label>
								<input id="foto" type="file" class="form-control form-control-user @error('foto') is-invalid @enderror"
								 name="foto" value="{{ old('foto') }}"  autocomplete="foto">
								@error('foto')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
			</div>
		</div>

		<div class="modal-footer">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
			{{-- <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Añadir titulo</a> --}}
			<button type="submit" class="btn btn-primary">
				Crear Publicación
			</button>
		</div>
	  
		</form>
	</div>
	</div>
</div>
{{-- END MODAL ADD NEW POST --}}


<div class="row">
 <!-- Pending Requests Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-success text-uppercase mb-1">
							Total Publicaciones </div>
							
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php
							echo (count($post2));
						?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-newspaper fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
							Total Votos </div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($votos) }}</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-heart fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-info text-uppercase mb-1">
							Total Comentarios</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php $controlComment = false;
							$totalComent=1;?>
							@foreach($publicaciones as $publicacion)
								@foreach ($comment as $item)
									@if($publicacion->id ==$item->post_id )
									<?php $controlComment = true;
										 $totalComent++;
									
									?>
									@endif
								@endforeach
							@endforeach
							@if($controlComment == false)
								<h5>0</h5>
							@else
								<h5><?php echo $totalComent ?></h5>

							@endif
						</div>
					</div>
					<div class="col-auto">
						<i class="fas fa-comments fa-2x text-gray-300 "></i>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-warning shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
							Interacción Último Post </div>
						<div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($publicaciones) ?></div>
					</div>
					<div class="col-auto">
						<i class="fas fa-exchange-alt fa-2x text-gray-300 "></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<!-- Content Column -->
	<div class="col-lg-12 mb-4">
		<!-- Project Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-primary">Últimos Comentarios</h6>			   
			</div>
			<div class="card-body scroll">
				<?php $controlComment = false?>
			@foreach($publicaciones as $publicacion)
				@foreach ($comment as $item)
					@if($publicacion->id ==$item->post_id )
					<?php $controlComment = true?>
					<h5><a class="text-dark" href="/post/{{ $item->post_id }}">{{ $item->comentario }} por {{ $item->usuario_nombre }} </a></h5><hr>
					@endif
				@endforeach
			@endforeach
			@if($controlComment == false)
				<h5>Sin Comentarios :)</h5><hr>
			@endif

		</div>
		</div>
	</div>
</div>
<div class="row">
	<!-- Content Column -->
	<div class="col-lg-12 mb-4">
		<!-- Project Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-primary">Listado Publicaciones</h6>			   
			</div>
			<div class="card-body h-50">
				<ul class="list-group">
				<?php
					foreach($publicaciones as $publicacion){
					echo "<div class=\"modal-header\">
						<h6 class=\"modal-title text-dark\" id=\"exampleModalLabel\" ><img class=\"mx-2\"width=\"70\" src=\"/imagenes/$publicacion->foto\"></img><a href=\"/post/$publicacion->id\">".substr($publicacion->titulo,0,40)."..</a></h6>
						<div><button type=\"button\" class=\"btn btn-danger\" data-toggle=\"modal\" data-target=\"#deleteModalPost\"data-id=\"$publicacion->id\">Borrar</button>
						<button type=\"button\" class=\"btn btn-warning editModalClass\" data-toggle=\"modal\" data-target=\"#editModalPost\" data-id=\"$publicacion->id\">Editar</button></div>
						</div>";
					}
				?>
				</ul>
			<br>
				{{ $publicaciones->links() }}

			</div>
		

		</div>
	</div>
</div>
{{-- EDIT MODAL --}}
  <!-- Si queremos añadir un modal añadimos este código y el JavaScript -->
  <div class="modal fade" id="editModalPost" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            		<!-- Modal Header -->
			<div class="modal-header">
				<h3 class="modal-title text-dark" id="editModalLabel" ><b>Editar Publicación</b></h3>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
            <div class="modal-body">
				<div class="container-fluid">

					<form id="editForm" method="POST" action="" enctype="multipart/form-data">
						@method('PUT')

						@csrf
						<div class="form-group row">
							<label for="titulo">Titulo:</label>
							<input id="edit_titulo" type="text" min="5" class="form-control form-control-user @error('titulo') is-invalid @enderror"
								placeholder="EJ: BTC ALCANZA NUEVO ATH!" name="titulo" value="{{ old('titulo') }}" required autocomplete="titulo">
						
								@error('titulo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						
						<div class="form-group row">
							<label for="subtitulo" class="form-label">Subtitulo:</label>
								<textarea id="edit_subtitulo" class="form-control form-control-user @error('subtitulo') is-invalid @enderror"
								placeholder="EJ: Tras el dip del pasado lunes, ..." name="subtitulo"  >{{ old('subtitulo') }}</textarea>
								@error('subtitulo')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>

						
						<div class="form-group row">
							<label for="contenido">Contenido:</label>
								<textarea id="edit_contenido" class="form-control form-control-user @error('contenido') is-invalid @enderror"
								placeholder="Ej: En el analisis técnico btc, rompe media movil de 200 d.." name="contenido"  >{{ old('contenido') }}</textarea>
								@error('contenido')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="form-group row">
							<label for="categoria_id">Categoria:</label>
							<select class='mi-selector'  class="form-control form-control-user @error('precio_compra') is-invalid @enderror" name="categoria_id" id="edit_categoria_id"  required>
							   
								  @for ($i = 0; $i < count($categorias); $i++) 
									<?php 
										echo "<option value='{$categorias[$i]->id}'>{$categorias[$i]->nombre}</option>";
									?>
								@endfor 

									
							</select>
								@error('categoria_id')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
						</div>
						<div class="form-group row">
							<label for="foto">Fotografia:</label>
								<input id="edit_foto" type="file" class="form-control form-control-user @error('foto') is-invalid @enderror"
								 name="foto" value="{{ old('foto') }}"  autocomplete="foto">
								@error('foto')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
							{{-- <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Añadir titulo</a> --}}
							<button type="submit" class="btn btn-primary">
								Editar Publicación
							</button>
						</div>
					</form>
				</div>    
    		</div>
        </div>
    </div>
  </div>
   {{-- REMOVE MODAL --}}
  <!-- Si queremos añadir un modal añadimos este código y el JavaScript -->
  <div class="modal fade" id="deleteModalPost" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
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
@endsection()

@section('scripts')
<script>

//   $(document).on('click','.editModalClass', function(){ //esta función se ejecutará en todos los casos
        
//     });

  window.onload = function () {
// 	ClassicEditor.create($('#subtitulo').get()[0]);
// ClassicEditor.create($('#contenido').get()[0]);
// ClassicEditor
//     .create( document.querySelector( '#edit_subtitulo' ) )
//     .then( editor => {
//         console.log( "este console"+editor );
//     } )
// // ClassicEditor.create($('#edit_subtitulo').get()[0]);
// ClassicEditor.create($('#edit_contenido').get()[0])

			//  var editor2;
			// ClassicEditor
			// .create(document.querySelector('#edit_subtitulo'))
			// .then(editor => {
			// 	editor2 = editor;
			// })
			// console.log(editor2);

        $('#deleteModalPost').on('show.bs.modal', function (event) {
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

		$('#editModalPost').on('show.bs.modal', function (event) {
			console.log("Editando Publicación");

            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id') // Extract info from data-* attributes
            console.log("el id"+id);
            // // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            // var modal = $(this)
            // modal.find('.modal-title').text('Olvidando Publicación con id: ' + id)
  
            // // Cogemos el accion del data-action por que éste no cambia a lo largo de los distintos borrados.
            // // Y así no tenemos problemas al intentar borrar registros con más de 1 dígito o que nos mantenga los dígitos del registro borrado anteriormente.
            // accion = $("#formularioBorrado").attr("data-action").slice(0, -1) + id
            // $("#formularioBorrado").attr('action', accion)


            var url3 = "post/";
            var url4 = "/edit";
	
            $.get(url3+id + url4, function (datos) {
            //    console.log();
			console.log(datos);
               $("#edit_titulo").val(datos[0]['titulo']);
              $("#edit_subtitulo").html(datos[0]['subtitulo']);
			//  editor.data.set(datos[0]['subtitulo']);

			//    console.log( ClassicEditor);
			// ClassicEditor.instances.edit_subtitulo.setData(datos[0]['subtitulo']); 
				
			//    ClassicEditor.create($('#edit_subtitulo').get()[]);
               $("#edit_contenido").html(datos[0]['contenido']);
			//    $("#edit_categoria_id").val(datos[0]['categoria_id']);
            //    https://criptocontrol.com/monedas.json
            console.log($("#edit_categoria_id option#"+datos[0]['moneda']+""));
                // $("#editmoneda option #"+datos[0]['moneda']).attr("selected",true); 
                $('#editForm').attr('action', "/post/"+datos[0]['id']);
                $("#edit_categoria_id option[value="+datos[0]['categoria_id']+"]").attr("selected",true);
               $('#editModalPost').modal('show');
       });







        })




    }

$(document).ready(function(){


});
</script>
@endsection
