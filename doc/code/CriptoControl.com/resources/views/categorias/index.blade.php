@extends('layouts2.master2')
@section('titulo',"CriptoControl-Categorias")
@section('contenido')
<div class="container my-4">
	<p style="color:#212c37;font-weight :bold;"><svg class="svg-inline--fa fa-angle-right fa-w-2"width="7"; aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>&nbsp;<a style="color:#01bec8;font-weight :bold;" href="/"><a style="color:#01bec8;font-weight :bold;"href="/">Home</a>&nbsp;</p>
</div>

<div  class="container my-4 textoLinea">
	<h3><b>{{ $categorias[0]->nombre }}</b></h3>
	<h6><b>{!! $categorias[0]->descripcion !!}</b></h6>
</div>
@endsection