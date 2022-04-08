@extends('layouts2.master2')
@section('titulo',"CriptoControl-Categorias")
@section('contenido')
<div class="container my-4">
		<p style="color:#212c37;font-weight :bold;"><a style="color:#01bec8;font-weight :bold;"href="/">Home</a>&nbsp;<svg class="svg-inline--fa fa-angle-right fa-w-2"width="7"; aria-hidden="true" focusable="false" data-prefix="fa" data-icon="angle-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" data-fa-i2svg=""><path fill="currentColor" d="M224.3 273l-136 136c-9.4 9.4-24.6 9.4-33.9 0l-22.6-22.6c-9.4-9.4-9.4-24.6 0-33.9l96.4-96.4-96.4-96.4c-9.4-9.4-9.4-24.6 0-33.9L54.3 103c9.4-9.4 24.6-9.4 33.9 0l136 136c9.5 9.4 9.5 24.6.1 34z"></path></svg>&nbsp;
		
		<a style="color:#01bec8;font-weight :bold;" href="/categorias/{{ $categorias[0]->id}}">{{ $categorias[0]->nombre }}</a>
		&nbsp;</p>
</div>

<div  class="container my-4 textoLinea text-justify">
	<h3 style="color:#01bec8;"><b>{{ $categorias[0]->nombre }}</b></h3>
	<h6><b>{!! $categorias[0]->descripcion !!}</b></h6>
</div>

<div  class="container my-4 textoLinea">
	<h5><b><span style="color:#01bec8">Bitcoin&nbsp;</span>Noticias</b></h5>
</div>
<div  class="container my-4  ">
@if(count($posts) != 0)
	@foreach($posts as $post)
	<div class="col-md-3" style="float:left">
		<div class="card mb-2">
			<img class="card-img-top"
			src="/imagenes/{{$post->foto}}" alt="Card image cap">
			<div class="card-body">
			<h4 class="card-title">{{substr($post->titulo,0,15)}}</h4>
			
			<a class="btn btn-primary" href="/post/{{$post->id}}">Ver Noticia</a>
			</div>
		</div>
		</div>
	@endforeach
@else
<h1 class="text-center"><a href="/post">OOPS no hai noticias.Se el primero en publicar una publicación </a></h1>
@endif
</div>
<div  class="container my-4  ">
	<script src="https://cointelegraph.com/news-widget" data-ct-widget-limit="18" data-ct-widget-theme="dark" data-ct-widget-size="tiny" data-ct-widget-priceindex="true" data-ct-widget-images="true" data-ct-widget-currency="USD" data-ct-widget-category="altcoin,bitcoin,ethereum,bitcoin-regulation,blockchain,bitcoin-scams" data-ct-widget-language="es"></script>
</div>

@endsection