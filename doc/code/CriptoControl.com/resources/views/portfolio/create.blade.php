@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')
{{-- <h1>Price BTC {{ $json_monedas['quote']['USD']['price']}}</h1> --}}
 <!-- Content Wrapper -->
<?php
   $monedasJSON = file_get_contents("monedas.json");
   $name_cripto= json_decode($monedasJSON, true);
?>
 <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

         <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Portfolio</h1>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Ganancias (Actuales)</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$--.--</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Ganancias (Ayer)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$--.--</div>
                                    </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Porcentaje Ganancias
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">0%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 0%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Publicaciones</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Content Row -->
            <div class="row">
                <!-- Area Chart -->
                <div class="col-xl-8 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Resumen de Ganancias</h6>
                            
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pie Chart -->
                <div class="col-xl-4 col-lg-5">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Division Portfolio</h6>
                         
                        </div>
                        
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-pie pt-4 pb-2">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <div class="mt-4 text-center small">
                                <span class="mr-2">
                                    <i class="fas fa-circle text-primary"></i> Direct
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-success"></i> Social
                                </span>
                                <span class="mr-2">
                                    <i class="fas fa-circle text-info"></i> Referral
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row">
                <!-- Content Column -->
                <div class="col-lg-12 mb-4">
                    <!-- Project Card Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3 d-sm-flex align-items-center justify-content-between mb-4">
                            <h6 class="m-0 font-weight-bold text-primary">Control Criptomonedas &nbsp;</h6>
                            <a href=""  data-toggle="modal" data-target="#addCripto"><i class="fas fa-plus-square fa-2x float-right"></i></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Moneda</th>
                                        <th>Cantidad</th>
                                        <th>Precio de entrada</th>
                                        <th>Precio actual</th>
                                        <th>Deposito inicial</th>
                                        <th>Solvencia actual</th>
                                        <th>Resumen</th>
                                    </tr>
                                </thead>
                                <tbody>
                          
                    </tbody>
                </table>
            </div>
                   
                        </div>
                        {{-- <div class="card-body">
                            <h4 class="small font-weight-bold">Server Migration <span
                                    class="float-right">20%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 20%"
                                    aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Sales Tracking <span
                                    class="float-right">40%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 40%"
                                    aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Customer Database <span
                                    class="float-right">60%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar" role="progressbar" style="width: 60%"
                                    aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Payout Details <span
                                    class="float-right">80%</span></h4>
                            <div class="progress mb-4">
                                <div class="progress-bar bg-info" role="progressbar" style="width: 80%"
                                    aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <h4 class="small font-weight-bold">Account Setup <span
                                    class="float-right">Complete!</span></h4>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                                    aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div> --}}
                    </div>

                    <!-- Color System -->
                    {{-- <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-dark text-white shadow">
                                <div class="card-body">
                                    Dark
                                    <div class="text-white-50 small">#5a5c69</div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>

            
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <div class="modal fade" id="addCripto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal modal-dialog-centered" role="document">
        <div class="modal-content">
             <!-- Modal Header -->
            <div class="modal-header">
                <h3 class="modal-title text-dark" id="exampleModalLabel" ><b>Añadir Una Criptomoneda!</b></h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">

                    <form class="criptomoneda" method="POST" action="{{ route('portfolio.store') }}">
                        
                         @csrf
                        <div class="form-group row">
                            <label for="moneda">Moneda:</label>
                            <select class='mi-selector'  class="form-control form-control-user @error('precio_compra') is-invalid @enderror" name="moneda" id="moneda"  required>
                               
                                @for ($i = 0; $i < count($name_cripto); $i++) 
                                    <?php 
                                        echo "<option value='{$name_cripto[$i]['symbol']}'>{$name_cripto[$i]['symbol']}</option>";
                                    ?>
                                @endfor 

                                    
                            </select>
                                @error('moneda')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        
                        <div class="form-group row">
                            <label for="precio_compra">Precio de Compra:</label>
                                <input id="precio_compra" type="number" step="0.000000000001" class="form-control form-control-user @error('precio_compra') is-invalid @enderror"
                                placeholder="precio_compra" name="precio_compra" value="{{ old('precio_compra') }}" required autocomplete="precio_compra">
                                @error('precio_compra')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        
                        <div class="form-group row">
                            <label for="precio_compra">Cantidad:</label>
                                <input id="cantidad" type="number"  step="0.000000000001" class="form-control form-control-user @error('cantidad') is-invalid @enderror"
                                placeholder="cantidad" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad">
                                @error('cantidad')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group row">
                            <label for="fecha_publicacion">Fecha de compra:</label>
                            <input id="fecha_publicacion" type="date" class="form-control form-control-user @error('fecha_publicacion') is-invalid @enderror"
                            placeholder="fecha_publicacion" name="fecha_publicacion" value="{{ old('fecha_publicacion') }}" required autocomplete="fecha_publicacion">
                            @error('fecha_publicacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                    </div>
            </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                {{-- <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Añadir Moneda</a> --}}
                <button type="submit" class="btn btn-primary">
                    Añadir Moneda
                </button>
            </div>
          
        </form>
        </div>
    </div>
</div>

@endsection()