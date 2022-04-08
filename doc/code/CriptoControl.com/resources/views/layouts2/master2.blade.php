<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{ asset("Logo3.png") }}"  sizes="16x16 24x24 36x36 48x48">

    <title>@yield('titulo')</title>

{{-- Adsense --}}
<script data-ad-client="ca-pub-1136864055809181" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
{{-- Recaptcha --}}
{!! htmlScriptTagJsApi(['lang' => 'es']) !!}


    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plantilla/vendor/fontawesome-free/css/all.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('plantilla/css/sb-admin-2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/preloader.css') }}">

    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/d5d3d01db2.js" crossorigin="anonymous"></script>
    {{-- <script src=""></script> --}}
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
	<style>
		.titleC{
			font-family: "Oswald";
		}
	
	
		#imageInner{
			height: 350px;
			background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzBoTjaoZmKMVComs-VoJd1S2ce5I37kr-_xL3oXveM6y-C1JxF9mso97Ty6gPEw4kWXA&usqp=CAU);
			background-repeat: no-repeat;
		}
		.textoLinea h5, .textoLinea h3{
			display: flex;
   			flex-direction: row;
			   flex
		}
		
		.textoLinea h5:after, .textoLinea h3:after {
			content: "";
			flex: 9 1;
			
			border-bottom: 4px solid #212c37;
			margin: auto 5px auto 5px;
		}
		.textoLinea h5:before, .textoLinea h3:before{
			content: "";
			flex: 1 1;
			
			border-bottom: 4px solid #212c37;
			margin: auto 5px auto 5px;
		}
		/* TABS NOTICIAS */
	/* Style the tab
 */

	* {box-sizing: border-box}


/* Style the tab */
.tab {
  float: left;
  border: 1px solid #212c37;
  background-color: #212c37;
  width: 30%;
  height: 300px;
}

/* Style the buttons inside the tab */
.tab button {
  display: block;
  background-color: #212c37;
  color: white;
  font-weight: bold;
  padding: 22px 16px;
  width: 100%;
  border: none;
  outline: none;
  text-align: left;
  cursor: pointer;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #01bec8;
}

/* Create an active/current "tab button" class */
.tab button.active {
  background-color: #01bec8;
}

/* Style the tab content */
.tabcontent {
  float: left;
  padding: 0px 12px;
  border: 1px solid #212c37;
  width: 70%;
  border-left: none;
  height: 300px;
}


	</style>
</head>

<body>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

	<?php
		echo '<div class="loader-container">
		<div class="indicator"> 
			<svg width="16px" height="12px">
			  <polyline id="back" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
			  <polyline id="front" points="1 6 4 6 6 11 10 1 12 6 15 6"></polyline>
			</svg>
		</div>
	</div>';
	?>

<div  class="d-flex flex-column h-80">

	<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#212c37">
	<div class="container">

		<img width="6%" src="{{ asset('Logo3.png') }}" alt="Logo cripto control">
		<a class="navbar-brand titleC ml-4" href="/"> <span style="color:#01bec8">C</span>RIPTO<span style="color:#01bec8">C</span>ONTROL</a>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
		  <span class="navbar-toggler-icon"></span>
		</button>
  
		<div class="collapse navbar-collapse" id="navbarsExample05">
		  <ul class="navbar-nav mr-auto">
			<li class="nav-item active">
			  <a class="nav-link" href="#">Noticias <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item ">
				<a class="nav-link" href="{{route('contactar')}}">Contacto <span class="sr-only">(current)</span></a>
			  </li>
			<li class="nav-item">
			  <a class="nav-link" href="/portfolio">Portfolio</a>
			</li>
			<form
				class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
				<div class="input-group">
					<input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..."
					aria-label="Search" aria-describedby="basic-addon2">
				<div class="input-group-append">
					<button class="btn btn-info" type="button">
						<i class="fas fa-search fa-sm"></i>
					</button>
				</div>
			</div>
			</form>
		  </ul>
		   <!-- Topbar Search -->
	
			<ul style="list-style: none">
				@guest
				<li class="nav-item">
				<a class="nav-link text-dark" href="{{ route("login") }}">Login</a>
				</li> 
				@endguest
				@auth
				<!-- Nav Item - User Information -->
				<li class="nav-item dropdown no-arrow">
					<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
						data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="mr-2 d-none d-lg-inline text-gray-600 small text-light"><b>{{ Auth::user()->name}}</b></span>
						@if( Auth::user()->fotografia != null)
						<img width="40" class="img-profile rounded-circle"
						src="{{Auth::user()->fotografia}}">
						@else
						<i class="fas fa-user"></i>
						@endif
					</a>
					<!-- Dropdown - User Information -->
					<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
						aria-labelledby="userDropdown">
						{{-- @if (auth()->user()->rol->key == 'admin')
								<li><a class="dropdown-item"  href="{{ route("usuarios.index") }}"><strong>Usuarios</strong></a></li>
						@endif --}}
						<a class="dropdown-item" href="{{route('usuarios.show',  Auth::user()->id)}}">
							<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
							Perfil
						</a>
						<a class="dropdown-item" href="{{ route('post.index') }}"">
							<i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
							Actividad
						</a>
						<div class="dropdown-divider"></div>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							@csrf
						</form>
						<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
							<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
							Cerrar Sesion
						</a>
					</div>
				</li>
				@endauth
			</ul>
		</div>
	</div>
</nav>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Listo para irte?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleciona "Cerrar Sesión" si deseas cerrar sesión.<br>Nos vemos!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
                </div>
            </div>
        </div>
    </div>


	@yield('contenido')

<footer class="footer mt-auto py-3 bg-light">
	<div class="container text-cen">
		<div class="copyright text-center my-auto">
			<span> © 2021 CriptoControl | <a href="/aviso_legal">Aviso Legal </a>|<a href="/coockies"> Coockies </a>| 
			<a href="/politica_privacidad">Protección de Datos</a> | <a href="https://t.me/criptocontrol">Canal de Telegram</a></span>
		</div>	</div>
  </footer>
</div>


</div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>


    <!-- Bootstrap core JavaScript-->
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    <script  src="{{ asset('plantilla/vendor/jquery/jquery.min.js') }}"></script>
    <script  src="{{ asset('plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Core plugin JavaScript-->
    <script  src="{{ asset('plantilla/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script>
        $(window).on('load', function() {
				$('.loader-container').fadeOut('slow');

        });
	</script>
    <script  src="{{ asset('plantilla/js/sb-admin-2.min.js') }}"></script>

    {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}
    <script src="{{ asset('plantilla/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}

	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('plantilla/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('plantilla/js/demo/chart-pie-demo.js') }}"></script>
    <!-- <script src="js/demo/chart-pie-demo.js"></script> -->
    <script>

	function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
    </script>

	{{-- Adsense --}}
   <script>
	(adsbygoogle = window.adsbygoogle || []).push({});
</script>
@yield('scripts')


</body>

</html>