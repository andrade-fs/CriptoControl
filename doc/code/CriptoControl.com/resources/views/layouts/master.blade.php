<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/vnd.microsoft.icon" href="Logo3.png"  sizes="16x16 24x24 36x36 48x48">

    <title>@yield('titulo')</title>
    {{-- Adsense --}}
    <script data-ad-client="ca-pub-1136864055809181" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        {{-- Recaptcha --}}
{!! htmlScriptTagJsApi(['lang' => 'es']) !!}

    <!-- Custom fonts for this template-->
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
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">

    {{-- <link href="css/sb-admin-2.min.css" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/d5d3d01db2.js" crossorigin="anonymous"></script>
    <script src="{{asset("js/app.js")}}"></script>
    {{-- <script src=""></script> --}}
    <style>
        .scroll {
            max-height: 200px;
            overflow-y: auto;
        }
        .titleC{
			font-family: "Oswald";
            
		}
     
        @media (max-width: 992px) {
            .ck.ck-editor__editable_inline>:last-child {
            width: 720px;
            height: 150px;
            }
        }
        @media (min-width: 1200) {
            .ck.ck-editor__editable_inline>:last-child {
            width: 1060px;
            height: 150px;
        }
        }
       
    
        
       
    </style>
</head>

<body id="page-top">
    
   <?php
    
   echo "<div class='loader-container'>
        <div class='rocket-container'>
          <div class='structure'>
            <svg height='352' id='rocket-svg' version='1.1' viewbox='0 0 59.266662 93.133333' width='224' xmlns='http://www.w3.org/2000/svg'>
              <g id='layer2' transform='translate(-33.866666,-33.866666)'>
                <path d='m 296,336 a 8.0000078,8.0000078 0 0 0 -8,8 v 80 a 8.0000078,7.9999501 0 0 0 1.16406,4.14062 l -0.22461,0.11329 49.32227,49.32031 0.0781,0.0801 0.004,-0.004 A 7.9999934,8.0000655 0 0 0 344,480 a 7.9999934,8.0000655 0 0 0 8,-8 v -80 a 7.9999934,7.9998924 0 0 0 -2.34961,-5.65625 l 0.004,-0.004 -48.00391,-48.00195 -0.004,0.002 A 8.0000078,8.0000078 0 0 0 296,336 Z' id='right-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
                <path d='m 184,336 a 8.0000006,8.0000078 0 0 0 -5.65234,2.3457 l -0.004,-0.002 -47.91797,47.91797 -0.082,0.082 0.004,0.002 A 8.0000078,7.9998924 0 0 0 128,392 v 80 a 8.0000078,8.0000655 0 0 0 8,8 8.0000078,8.0000655 0 0 0 5.65625,-2.34961 l 0.004,0.004 49.40039,-49.40039 -0.22657,-0.11329 A 8.0000006,7.9999501 0 0 0 192,424 v -80 a 8.0000006,8.0000078 0 0 0 -8,-8 z' id='left-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
                <path d='M 239.96875,128 A 111.99996,124.13082 0 0 0 176,240 l 16,200 a 8.0000006,8.0000655 0 0 0 8,8 h 80 a 8.0000078,8.0000655 0 0 0 8,-8 L 304,240 A 111.99996,124.13082 0 0 0 239.96875,128 Z' id='rocket-main-part' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
                <path d='m 239.96875,128 a 111.99996,124.13082 0 0 0 -47.77344,48 h 95.51953 a 111.99996,124.13082 0 0 0 -47.74609,-48 z' id='nose' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
                <ellipse cx='63.5' cy='59.266663' id='window-stroke' rx='7.4083333' ry='7.4083328' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.26458332;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1'></ellipse>
                <ellipse cx='63.499996' cy='59.266666' id='window-inner' rx='6.3499975' ry='6.3500061' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.26458332;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1'></ellipse>
                <path d='m 240,336 a 7.9999898,8.0000078 0 0 0 -8,8 v 128 a 7.9999898,8.0000078 0 0 0 8,8 7.9999898,8.0000078 0 0 0 8,-8 V 344 a 7.9999898,8.0000078 0 0 0 -8,-8 z' id='middle-wing' style='opacity:1;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
                <path d='M 239.96875,128 A 111.99996,124.13082 0 0 0 176,240 l 7.68164,96.01562 a 8.0000006,8.0000078 0 0 0 -5.33398,2.33008 l -0.004,-0.002 -47.91797,47.91797 -0.082,0.082 0.004,0.002 A 8.0000078,7.9998924 0 0 0 128,392 v 80 a 8.0000078,8.0000655 0 0 0 8,8 8.0000078,8.0000655 0 0 0 5.65625,-2.34961 l 0.004,0.004 49.40039,-49.40039 -0.22657,-0.11329 a 8.0000006,7.9999501 0 0 0 0.18946,-0.3496 l 0.0371,0.46289 L 192,440 a 8.0000006,8.0000655 0 0 0 8,8 h 32 v 24 a 7.9999898,8.0000078 0 0 0 8,8 V 336 252 196 128.01758 A 111.99996,124.13082 0 0 0 239.96875,128 Z' id='shadow-layer' style='opacity:0.2;fill:#000000;fill-opacity:1;stroke:none;stroke-width:0.99999994;stroke-linecap:round;stroke-linejoin:bevel;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1' transform='scale(0.26458333)'></path>
              </g>
            </svg>
          </div>
          <div class='text-container'>
            <h2>
              To the moon..
            </h2>
          </div>
          <div class='smoke'>
            <% (1..10).each do %>
              <span></span>
            <% end %>
          </div>
        </div>
         <div class='meteors-container'>
            <% (1..10).each do %>
             <span></span>
            <% end %>
         </div>
    </div>";
   ?>
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul style="background-color: #212c37" class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon my-4">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    <img width="30%" src="Logo3.png" alt="Logo cripto control">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <br>

                        <!-- Heading -->
            <div class="sidebar-heading">
                Criptos 
            </div>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('portfolio.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('getTop.show') }}">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Top 24h</span></a>
            </li>
            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('trading') }}">
                    <i class="fas fa-chart-bar"></i>
                    <span>Grafico</span></a>
            </li>


       
       
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Noticias
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('post.index') }}">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Posts</span></a>
            </li>
			@if(auth()->user()->rol->key == 'Admin')
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
               PANEL ADMIN
                </div>

                <!-- Nav Item - Tables -->
                <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index') }}">
                    <i class="fas fad fa-lock"></i>
                <span>ADMIN</span></a>
                </li>

            @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

                     <!-- Heading -->
            <div class="sidebar-heading">
            Contacta Con Nosotros!
            </div>
        
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contactar') }}">
                    <i class="far fa-paper-plane"></i>
                    <span>Contacto</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                  
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <a class="navbar-brand titleC ml-4" href="/"> <span style="color:#01bec8">C</span>RIPTO<span style="color:#01bec8">C</span>ONTROL</a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <li>
                                  <div class="sidebar-brand-text mx-3">		
                                  </div>
                        </li>
                        <!-- Nav Item - Alerts -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> --}}

                        {{-- <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>


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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name}}</span>
                                @if( Auth::user()->fotografia != null)
                                <img class="img-profile rounded-circle"
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

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                  
                    @yield('contenido')
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span> © 2021 CriptoControl | <a href="/aviso_legal">Aviso Legal </a>|<a href="/coockies"> Coockies </a>| 
                        <a href="/politica_privacidad">Protección de Datos</a><a href="https://t.me/criptocontrol">Unete a nuestra comunidad en Telegram</a></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>

    
    <!-- Bootstrap core JavaScript-->
    {{-- <script src="vendor/jquery/jquery.min.js"></script> --}}
    {{-- <script  src="{{ asset('plantilla/vendor/jquery/jquery.min.js') }}"></script> --}}
    <script  src="{{ asset('plantilla/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}

    <!-- Core plugin JavaScript-->
    <script  src="{{ asset('plantilla/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
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
        $(window).on('load', function() {
             $('.loader-container').fadeOut('slow');
        });
        // jQuery(document).ready(function($){
        //     $(document).ready(function() {
        //         $('.mi-selector').select2();
        //     });
        // });

    // window.onload = function() {
    //     $('.loader-container').fadeOut('slow');

    //   };
    </script>
    
        @yield('scripts')

</body>

</html>