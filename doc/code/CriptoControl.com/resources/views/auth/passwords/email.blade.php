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
    <link rel="stylesheet" href="{{ asset('plantilla/css/sb-admin-2.min.css') }}">
    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Has Olvidado la Contraseña?</h1>
                                        <p class="mb-4">Lo sabemos, son cosas que pasan! Mandanos tu email y te mandaremos un email para restablecer la contraseña!</p>
                                    </div>
                                    @if (session('status'))
                                    <div class="text-center alert alert-success" role="alert">
                                        Email enviado con éxito! Recuerda mirar en la carpeta de spam!
                                    </div>
                                     @endif
                                    <form class="user" method="POST" action="{{ route('password.email') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control-user form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="exampleInputEmail" aria-describedby="emailHelp"                       placeholder="criptocontrol@gmail.com" required name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                    

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                           Restablecer Contraseña
                                        </button>
                                    </form>
                                    <hr>
                                  <div class="text-center">
                                        <a class="small" href="{{ route("login") }}">Ya tienes cuenta? Inicia Sesión!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route("register") }}">Aún no tienes cuenta? Registrate Gratis!</a>
                                </div>
                                </div>
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