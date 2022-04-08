<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('titulo')</title>

    <!-- Custom fonts for this template-->
    {{-- <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('plantilla/vendor/fontawesome-free/css/all.min.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('plantilla/css/sb-admin-2.css') }}">
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}

</head>


{{-- <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '{your-app-id}',
        cookie     : true,
        xfbml      : true,
        version    : '{api-version}'
      });
        
      FB.AppEvents.logPageView();   
        
    };
  
    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "https://connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script> --}}
<body class="bg-gradient-info">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><strong>Crea Una Cuenta!</strong></h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="form-group row">
        {{-- nombre --}}
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user   @error('name')is-invalid @enderror" id="name"
                                            placeholder="Nombre" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
         {{-- Surname --}}
                                
                                    <div class="col-sm-6">

                                        <input type="text" name="surname" class="form-control form-control-user @error('surname') is-invalid @enderror" id="surname"
                                            placeholder="Apellidos" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                                            @error('surname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
        {{-- Fecha_Naciemiento --}}
                        
                                <div class="form-group row">        
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input id="fecha_nacimiento" type="date" class="form-control form-control-user @error('fecha_nacimiento') is-invalid @enderror" name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" required autocomplete="fecha_nacimiento"  placeholder="Fecha Nacimiento" autofocus>
        
                                        @error('fecha_nacimiento')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                
                                    <div class="col-sm-8 ">
                                        <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        placeholder="Correo Electronico" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    </div>
                                </div>
                               
                           


        
        {{-- pasword --}}
                    
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="contraseña">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                         @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="password-confirm" type="password" placeholder="Confirmar Contraseña"  class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
     {{-- correos --}}
                                <div class="form-group row">        
                                    <div class="col-sm text-center">
                                    <label for="correos" class="form-label text-gray-900"><strong>Desea recibir correos, sobre nuevas?</strong></label>
                                    <select name="correos" id="correos">
                                        <option  {{old('correos') == '1' ? 'selected' : ''}} value="0">SI</option>
                                        <option  {{old('correos') == '2' ? 'selected' : ''}} value="1">NO</option>
                                    </select>        
                                </div>
                                 </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Registrar Cuenta
                                </button>
                              
                                <hr>
                                <a href="/login/social/google" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="/login/social/facebook" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>
                                <a href="/login/social/twitter" class="btn btn-info btn-user btn-block">
                                    <i class="fab fa-twitter  fa-fw"></i> Register with Twitter
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">

                                @if (Route::has('password.request'))
                                    <a class="small" href="{{ route('password.request') }}">
                                        Has Olvidado la Contraseña?
                                    </a>
                                @endif
                                </div>
                            <div class="text-center">
                                <a class="small" href="{{ route("login") }}">Ya tienes cuenta? Inicia Sesión!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




    
    <!-- Bootstrap core JavaScript-->
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    <script  src="{{ asset('plantilla/vendor/jquery/jquery.min.js') }}"></script>
    <script  src="{{ asset('plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Core plugin JavaScript-->
    <script  src="{{ asset('plantilla/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> --}}

    <!-- Custom scripts for all pages-->
    {{-- <script src="js/sb-admin-2.min.js"></script> --}}
    <script  src="{{ asset('plantilla/js/sb-admin-2.min.js') }}"></script>


</body>

</html>