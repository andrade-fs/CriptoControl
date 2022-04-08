@extends('layouts2.master2')
@section('titulo',"CriptoControl")

@section('contenido')
	
<div class="container my-4 ">
	<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
		<div class="card border-bottom-info shadow h-100">
				<div class="row no-gutters align-items-center">
					<div class="col ">			
								<!-- Card Body -->
									<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
										<ol class="carousel-indicators">
											<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
											<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
										  </ol>
										<div class="carousel-inner" id="imageInner" >
										  <div class="carousel-item active">
											  <img class="d-block" src="https://images.cointelegraph.com/images/1434_aHR0cHM6Ly9zMy5jb2ludGVsZWdyYXBoLmNvbS91cGxvYWRzLzIwMjEtMDUvZjY1ZTQzOWYtNGM5MC00ZTc2LTliZmItMzRlYjlkMmZlMWQ1LmpwZw==.jpg" alt="First slide">
											  <div class="carousel-caption d-none d-md-block text-dark">
												<h5>...</h5>
												<p>...</p>
											  </div>
										  </div>
										  <div   class="carousel-item">
											<img class="d-block" src="https://images.cointelegraph.com/images/1434_aHR0cHM6Ly9zMy5jb2ludGVsZWdyYXBoLmNvbS91cGxvYWRzLzIwMjEtMDIvMWQ2ZmU3OWEtZWM1Zi00ODUzLTgyNDMtN2RhNGIxMDAxNzI0LmpwZw==.jpg" alt="Second slide">
										  {{--  --}}
										  </div>
										  <div   class="carousel-item">
											<img class="d-block" src="https://images.cointelegraph.com/images/1434_aHR0cHM6Ly9zMy5jb2ludGVsZWdyYXBoLmNvbS9zdG9yYWdlL3VwbG9hZHMvdmlldy84YzNjMjMzZTU5NjAzNWU1NDRhYTIzMGQxZDA4MjUzOC5qcGc=.jpg" alt="Third slide">
										  {{--  --}}
										  </div>
		
										</div>
										<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
										  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
										  <span class="sr-only">Previous</span>
										</a>
										<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
										  <span class="carousel-control-next-icon" aria-hidden="true"></span>
										  <span class="sr-only">Next</span>
										</a>
						</div>									
					</div>
				</div>	
			</div>
		</div>
	
			

    <!-- Pending Requests Card Example -->
    <!-- Pending Requests Card Example -->
	<div class="row">

		<div class="col-xl-4 col-md my-2">
			<div class="card border-bottom-info shadow h-100 py-2" style="background-color:#212c37">
				@foreach($categorias as $categoria)
					@if($categoria->nombre == 'Bitcoin')
					<a href="/categorias/{{$categoria->id}}">
						<div class="card-body" >
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-light text-uppercase mb-1">
										<h5>Bitcoin</h5></div>
								</div>
								<div class="col-auto">
									<i class="fab fa-bitcoin fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</a>
					@endif
				@endforeach
			</div>
		</div>
		<div class="col-xl-4 col-md my-2">
			<div class="card border-bottom-info shadow h-100 py-2" style="background-color:#212c37">
				@foreach($categorias as $categoria)
				@if($categoria->nombre == 'Ethereum')
				<a href="/categorias/{{$categoria->id}}">

				<div class="card-body" >
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-light text-uppercase mb-1">
								<h5>ETHEREUM</h5></div>
						</div>
						<div class="col-auto">
							<i class="fab fa-ethereum fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</a>
			@endif
		@endforeach
			</div>
		</div>
		
		<div class="col-xl-4 col-md my-2">
			<div class="card border-bottom-info shadow h-100 py-2" style="background-color:#212c37">
				<a href="/portfolio">
				<div class="card-body" >
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-light text-uppercase mb-1">
								<h5>Panel de control</h5></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-fw fa-2x fa-tachometer-alt  text-gray-300"></i>
									</div>
					</div>
				</div>
			</a>
			</div>
		</div>
		
	</div>
</div>

<div  class="container my-4 textoLinea d-none d-sm-none d-md-block">

	<h5><b><span></span><span style="color:#01bec8">Últimas&nbsp;</span>Publicaciones</b></h5>


	<div class="tab ">
	<button class="tablinks" onclick="openCity(event, 'first')" id="defaultOpen">{{Str::substr($publicaciones[0]->titulo, 0, 15)  }}..</button>
	<button class="tablinks" onclick="openCity(event, 'second')">{{ Str::substr($publicaciones[1]->titulo, 0, 15)  }}..</button>
	<button class="tablinks" onclick="openCity(event, 'third')">{{ Str::substr($publicaciones[2]->titulo, 0, 15)   }}..</button>
	<button class="tablinks" onclick="openCity(event, 'fourth')">{{ Str::substr($publicaciones[3]->titulo, 0, 15)   }}..</button>
	</div>

	<div id="first" class="tabcontent" style="background-image: url({{asset("imagenes/".$publicaciones[0]->foto)}});">
		<a style="color:black;font-weight:bold;" href="/post/{{ $publicaciones[0]->id }}">
			<h3>{{ $publicaciones[0]->titulo }}</h3>
			<p>{!! $publicaciones[0]->subtitulo!!}</p>
			<p>{!!substr($publicaciones[0]->contenido,0,150)!!}</p>
		</a>
	</div>

	<div id="second" class="tabcontent" style="background-image: url({{asset("imagenes/".$publicaciones[1]->foto)}});color:black;font-weight: bold;
		">
	<a style="color:black;font-weight:bold;" href="/post/{{ $publicaciones[1]->id }}">
		<h3>{{ $publicaciones[1]->titulo }}</h3>
		<p>{!! $publicaciones[1]->subtitulo!!}</p>
		<p>{!!substr($publicaciones[1]->contenido,0,150)!!}</p>
	</a>
	</div>

	<div id="third" class="tabcontent" style="background-image: url({{asset("imagenes/".$publicaciones[2]->foto)}}); color:black;font-weight: bold;
		">
		<a style="color:black;font-weight:bold;" href="/post/{{ $publicaciones[2]->id }}">
			<h3>{{ $publicaciones[2]->titulo }}</h3>
			<p>{!! $publicaciones[2]->subtitulo!!}</p>
			<p>{!!substr($publicaciones[2]->contenido,0,150)!!}</p>
		</a>
	</div>

	<div id="fourth" class="tabcontent" style="background-image: url({{asset("imagenes/".$publicaciones[3]->foto)}});color:black;font-weight: bold;
		">
	<a style="color:black;font-weight:bold;" href="/post/{{ $publicaciones[2]->id }}">

		<h3>{{ $publicaciones[3]->titulo }}</h3>
		<p>{!! $publicaciones[3]->subtitulo!!}</p>
		<p>{!!substr($publicaciones[3]->contenido,0,150)!!}</p>
	</a>
	</div>
</div>

@foreach($categorias as $categ)
	<?php $cont = 4;	?>
	<div  class="container my-4 textoLinea">
	{{-- <h5 ><a class="text-decoration-none" href="/categorias{{$categ->id}} }}" style="color:#01bec8!important">Noticias sobre </span>{{$categ->nombre}}</b></a></h5> --}}
	<h5 ><a href="/categorias/{{$categ->id}}" style="color:#858796;"><b><span style="color:#01bec8">Noticias Sobre&nbsp;</span>{{$categ->nombre}}</b></a></h5>

	</div>
	
	<div  class="container my-4  ">
		<!--Slides-->
		<div class="carousel-inner" role="listbox">
				
			<!--First slide-->
			<div class="carousel-item active">
	
	@foreach($allPost as $post)
		@if($post->categoria_id == $categ->id && $cont > 0)
		<?php $cont--?>
			<!--Slides-->
			<div class="col-md-3" style="float:left">
				<div class="card mb-2">
					<img class="card-img-top"
					  src="imagenes/{{ $post->foto }}" alt="Card image cap">
					<div class="card-body">
					  <h4 class="card-title">{{ substr($post->titulo,0,15) }}...</h4>
					  
					  <a  href="/post/{{ $post->id }}"class="btn btn-primary">Ver Noticia</a>
					</div>
				  </div>
			  </div>
		@endif
	@endforeach
	@if($cont > 0)
	<div class="col-md-3" style="float:left">
		<div class="card mb-2">
			<img class="card-img-top"
			src="img\register.png" alt="Card image cap">
			<div class="card-body">
			  <p class="card-title">Crea una noticia!</p>
			  
			  <a  href="/post"class="btn btn-primary">Crear Noticia</a>
			</div>
		  </div>
	  </div>
	@endif
</div>
</div>
</div>

@endforeach


 {{-- <div  class="container my-4 mb-4">
	<script src="https://cointelegraph.com/news-widget" data-ct-widget-limit="18" data-ct-widget-theme="dark" data-ct-widget-size="tiny" data-ct-widget-priceindex="true" data-ct-widget-images="true" data-ct-widget-currency="USD" data-ct-widget-category="altcoin,bitcoin,ethereum,bitcoin-regulation,blockchain,bitcoin-scams" data-ct-widget-language="es"></script>
</div>  --}}

</div>

@endsection
