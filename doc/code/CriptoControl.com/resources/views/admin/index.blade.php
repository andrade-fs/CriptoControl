@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')
<h1>ADMIN</h1>
<div class="row">
	<!-- Content Column -->
	<div class="col-lg-12 mb-4">
		<!-- Project Card Example -->
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
				<h6 class="m-0 font-weight-bold text-primary">Últimos Comentarios</h6>			   
			</div>
			<div class="card-body scroll">
			@foreach($usuarios as $user)
					<h5><a class="text-dark" href="/usuarios/{{ $user->id }}">{{ $user->name }} - {{ $user->email }} -{{ $user->rol->key }} </a></h5><hr>
			@endforeach
		</div>
		</div>
	</div>
</div>
@endsection