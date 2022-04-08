@extends('layouts.master')
@section('titulo',"CriptoControl")
@section('contenido')
{{-- <h1>Price BTC {{ $json_monedas['quote']['USD']['price']}}</h1> --}}
 <!-- Content Wrapper -->

 <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

         <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <ol class="breadcrumb mb-4 d-sm-flex align-items-center justify-content-between mb-4">  
                <h1 class="h3 mb-0 text-gray-800">Portfolio</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Descargar Resumen</a> --}}
            </ol>        
      
          <?php                    use Carbon\Carbon;
          ?>

            {{-- <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <?php
                       $monedasJSON = file_get_contents("monedas.json");
                       $name_cripto= json_decode($monedasJSON, true);
                    use Carbon\Carbon;
                    $deposito = 0;
                    $contador = 0;
                    // $sumaTotal =
                    // if($totalMonth == 0){
                    //     $totalMonth = 
                    // }
                    foreach($portfolios as $portfolio){
                        $fecha_actual   = Carbon::now();
                        $fecha_m_actual   = $fecha_actual->format('Y-m');
                        if($fecha_m_actual == $portfolio['created_at']->format('Y-m')){
                            $contador  +=  $portfolio['cantidad'];    
                            $deposito += $portfolio['cantidad']*$portfolio['precio_compra'];
                            // dd("nui");
                        }else{
                            $deposito +=0;
                        }

                    }   
                        //  dd($totalMonth);
                                    if($deposito<=$totalMonth+$deposito){
                                    ?>
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Ganancias (Actuales)</div>
                                        
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php 
                                                
                                                        echo "+$".(round($totalMonth,2));
                                    }else{
                                        ?>
                                          <div class="card border-left-danger shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                            Ganancias (Actuales)</div>
                                               
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        echo "-$".(round($totalMonth,2));
                                    }  ?></div>
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
                    
                    <?php
                    $deposito = 0;
                    $contador = 0;
                    $fecha_actual   = Carbon::now();
                    $fecha_d_ayer  = $fecha_actual->subDay()->format('m-d');
                    foreach($portfolios as $portfolio){
                    $fecha_m_entrada = $portfolio['created_at']->format('m-d');
                        if($fecha_d_ayer == $fecha_m_entrada){
                            $contador  +=  $portfolio['cantidad'];    
                            $deposito += $portfolio['cantidad']*$portfolio['precio_compra'];
                        }
                    }
                    // dd($deposito);
                     ?>
                   <?php 
                //    dd($yesterday);
                // dd($yesterday);
                    if($deposito<=$yesterday){
                        ?>
                    <div class="card border-left-success shadow py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  
                                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ganancias (Ayer)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                    
                                            echo "+$".( round(($yesterday-$deposito),2));
                                           
                                        }else{
                                            ?>
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  
                                             <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Ganancias (Ayer)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo "-$".( round(($yesterday-$deposito),2));
                                        }  ?></div>
                                    </div>
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
                    <div class="card border-left-info shadow py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Porcentaje Ganancias
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <?php
                                                if($deposito<=$totalMonth+$deposito){
                                                    echo '<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-danger">+'.round($porcentajeTotal,2).'%</div>';
                                                }else{
                                                    echo '<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-success">'.round($porcentajeTotal,2).'%</div>';


                                                }
                                            
                                            
                                            ?>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: {{round($porcentajeTotal,2)}}%" aria-valuenow="50" aria-valuemin="0"
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
                                        Posts</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($publicacions);?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
         <!-- Content Row -->
         <div class="row">
            <!-- Content Column -->
            <div class="col-lg-12 col-xl-9  mb-4">
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
                                <tr><th>Accion</th>
                                    <th>Moneda</th>
                                    <th>Cantidad</th>
                                    {{-- <th>Precio de entrada</th> --}}
                                    <th>Precio actual</th>
                                    <th>Deposito inicial</th>
                                    <th>Solvencia actual</th>
                                    <th>Resumen %</th>
                                    <th>Resumen $</th>

                                </tr>
                            </thead>
                            <tbody>
                                {{ $portfolios->links()}}
                                    <?php 
                                        function dx($x): void
                                        {
                                            echo '<pre>';
                                            var_export($x);
                                            echo '</pre>';
                                        }

                                        // Create an array with the Ids withouts repetitions to get
                                        // a list of unique products

                                        // $ids_products = [];
                                        // foreach ($arr as $arr_product) {
                                        //     $id_product = $arr_product["fk_id_producto"];
                                        //     if (! in_array($id_product, $ids_products)) {
                                        //         $ids_products[] = $id_product;
                                        //     }
                                        // }
                                        $cripto_array = [];
                                        foreach ($portfolios  as $portfolio) {
                                            $cripto = $portfolio->moneda;
                                            if(!in_array($cripto, $cripto_array)){
                                                $cripto_array[] = $cripto;
                                            }
                                        }
                                        // dx($ids_products); // trace

                                            $result = [];
                                        foreach ($cripto_array as $unique_cripto) {
                                            $temp     = [];
                                            $quantity = 0;
                                            foreach ($portfolios as $portfolio) {
                                                // $id = $arr_product["fk_id_producto"];
                                                $cripto = $portfolio->moneda;
                                                if ($cripto === $unique_cripto) {
                                                    $temp[] = $portfolio;
                                                }
                                            }
                                            $criptoResume = $temp[0];
                                          
                                            $countCripto = 0;
                                            $countDeposit = 0;
                                            foreach ($temp as $criptoCantid) {
                                                $countCripto  +=  $criptoCantid['cantidad'];    
                                                $countDeposit += $criptoCantid['cantidad']*$criptoCantid['precio_compra'];
                                            }
                                           
                                            // dx($product["cantidad"]); // trace
                                           
                                            // store unique producto with updated quantity
                                            // $result[] = $criptoResume;
                                            // dd($result[0]['cantidad']);

                                            ?>
                                            <tr>
                                                @for ($i = 0; $i < count($json_monedas['data']); $i++)
                                                    @if(($unique_cripto == $json_monedas['data'][$i]['symbol']) || ($unique_cripto == $json_monedas['data'][$i]['slug']))
                                                    <?php

                                                    $cantidadFinal = ($json_monedas['data'][$i]['quote']['USD']['price'])*($countCripto);
                                                    $precioActual = $json_monedas['data'][$i]['quote']['USD']['price'];

                                                    ?>
                                                    @endif
                                                @endfor
                                                {{-- <td>{{$portfolio->moneda}}</td> --}}
                                                {{-- <td>{{$countCripto}}</td> --}}
                                                {{-- Precio entrada --}}

                                                {{-- <td>${{$portfolio->precio_compra}}</td>  --}}
                                                {{-- <td>${{round($precioActual,2)}}</td> --}}
                                                {{-- <td>${{$countDeposit}}</td> --}}
               

                         
                                                <td class="justify-content-between mb-4 text-danger">
                                                    <button  class="btn btn-warning btn-detail neutralCripto" value="{{$unique_cripto}}"><i class="fas fa-edit"></i></button>
                                               
                                                </td>
                                                <?php
                                                // dd($unique_cripto);
                                                    if(round($cantidadFinal,2)<$countDeposit){
                                                ?>
{{-- 
===============================================================================================================================================================================
///////////////////////////////////////////////////////////////////////////EDIT MODAL SCRIPT//////////////////////////////////////////////////////////////////////////////////
===============================================================================================================================================================================
--}}


                                {{-- Edit Modal --}}

                                                 
                                                    <td class="text-danger"><b>{{$unique_cripto}}</b></td>
                                                    <td class="text-danger">{{$countCripto}}</td>
                                                    <td class="text-danger">${{round($precioActual,2)}}</td>
                                                    <td class="text-danger">${{$countDeposit}}</td>
                                                    <td class="text-danger">${{round($cantidadFinal,2)}}</td>
                                                    <td class="text-danger">-{{ round(($cantidadFinal/$countDeposit)*100, 2)}}%</td>                                      
                                                    <td class="text-danger">- ${{round($cantidadFinal-$countDeposit,2)}}</td>  
                                                <?php
                                                    }else{

                                                    
                                                ?>

                                             
                                                <td class="text-success"><b>{{$unique_cripto}}</b></td>
                                                <td class="text-success">{{$countCripto}}</td>
                                                <td class="text-success">${{round($precioActual,2)}}</td>
                                                <td class="text-success">${{$countDeposit}}</td>
                                                <td class="text-success">${{round($cantidadFinal,2)}}</td>
                                                <td class="text-success">+{{ round(($cantidadFinal/$countDeposit)*100, 2)}}%</td>                                      
                                                <td class="text-success">+ ${{round($cantidadFinal-$countDeposit,2)}}</td>                                      
                                                <?php
                                                    }
                                                ?>
                                            </tr>
                                            
                                            <?php
                               
                                        }
                                        // dx($result); // trace
                                    ?>  
                                    

                            </tbody>
                        </table>
          {{ $portfolios->links() }}
                    </div>                   
                    </div>
                </div>
                 <!-- Area Chart -->
                 {{-- <div class="col-xl-8 col-lg-7 d-none d-md-block"> --}}
                    <div class="card shadow mb-4 d-none d-md-block">
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Historial de ganancias</h6>
                           
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            
                            <div class="chart-area">
                                <canvas id="myAreaChart"></canvas>
                            </div>
                        </div>
                    </div>
                {{-- </div> --}}

            </div>   
            
                <!-- Pie Chart -->
                <div class="col-xl-3 col-lg-5">
                    <div class="card shadow mb-4">
                        
                        <!-- Card Header - Dropdown -->
                        <div
                            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Division Portfolio</h6>
                           
                        </div>
                        
                        <!-- Card Body -->
                        <div class="card-body">
                            <br>
                            <div class="chart-pie ">
                                <canvas id="myPieChart"></canvas>
                            </div>
                            <br>
                        </div>
                    </div>
                       <!-- Earnings (Monthly) Card Example -->
          
                    <?php
                       $monedasJSON = file_get_contents("monedas.json");
                       $name_cripto= json_decode($monedasJSON, true);
                    // use Carbon\Carbon;
                    $deposito = 0;
                    $contador = 0;
                    // $sumaTotal =
                    // if($totalMonth == 0){
                    //     $totalMonth = 
                    // }
                    foreach($portfolios as $portfolio){
                        $fecha_actual   = Carbon::now();
                        $fecha_m_actual   = $fecha_actual->format('Y-m');
                        if($fecha_m_actual == $portfolio['created_at']->format('Y-m')){
                            $contador  +=  $portfolio['cantidad'];    
                            $deposito += $portfolio['cantidad']*$portfolio['precio_compra'];
                            // dd("nui");
                        }else{
                            $deposito +=0;
                        }

                    }   
                        //  dd($totalMonth);ç
                        if(isset($countNow) && $countNow != ""){
                            if($countNow >0){
                                    ?>
                                    <div class="card border-left-success shadow py-2 mb-4">
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Ganancias (Actuales)</div>
                                        
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    <?php 
                                                
                                                        echo "+$".(round($countNow,2));
                                    }else{
                                        ?>
                                          <div class="card border-left-danger shadow  py-2 mb-4">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                            Ganancias (Actuales)</div>
                                               
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <?php
                                        echo "-$".(round($countNow,2));
                                    }  ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </div>
                         </div>
                         
                    {{-- END GANANCIAS ACTUALES --}}
                    <?php
                        }else{
                            ?>
                            <div class="card border-left-danger shadow  py-2 mb-4">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                            Ganancias (Actuales)</div>
                                               
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                        Disponible en Menos de 2h.
                                                        </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            </div>
                         </div>
                         <?php
                        }
                    $deposito = 0;
                    $contador = 0;
                    $fecha_actual   = Carbon::now();
                    $fecha_d_ayer  = $fecha_actual->subDay()->format('m-d');
                    foreach($portfolios as $portfolio){
                    $fecha_m_entrada = $portfolio['created_at']->format('m-d');
                        if($fecha_d_ayer == $fecha_m_entrada){
                            $contador  +=  $portfolio['cantidad'];    
                            $deposito += $portfolio['cantidad']*$portfolio['precio_compra'];
                        }
                    }
                    // dd($deposito);
                    
                    
             
               
                //    dd($yesterday);
                // dd($yesterday);
                if(isset($yesterday) && $yesterday != ""){
                    if($yesterday > 0){
                        ?>
                    <div class="card border-left-success shadow py-2 mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  
                                             <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Ganancias (Ayer)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                    
                                            echo "+$".( round(($yesterday),2));
                                           
                                        }else{
                                            ?>

                    <div class="card border-left-danger shadow py-2 mb-4 ">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                  
                                             <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Ganancias (Ayer)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                            echo "-$".( round(($yesterday),2));
                                        }  ?></div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }else{
                        ?>

                <div class="card border-left-danger shadow py-2 mb-4 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                            
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Ganancias (Ayer)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            Disponible en menos de 24h.
                                        </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  }    ?>
                    {{-- END GANANCIAS AYER --}}
                    <div class="card border-left-info shadow py-2  mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Porcentaje Ganancias Por Página
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <?php
                                                if($deposito<=$totalMonth+$deposito){
                                                    echo '<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-danger">+'.round($porcentajeTotal,2).'%</div>';
                                                }else{
                                                    echo '<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800 text-success">'.round($porcentajeTotal,2).'%</div>';


                                                }
                                            
                                            
                                            ?>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: {{round($porcentajeTotal,2)}}%" aria-valuenow="50" aria-valuemin="0"
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
                    {{-- End Porcentaje --}}
                    <div class="card border-left-warning shadow py-2 mb-4">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Posts</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo count($publicacions);?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-comments fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                </div>

        </div>
            <!-- Content Row -->
{{-- 
            <div class="row">

 
                       

            </div> --}}

   
        <!-- Logout Modal-->
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

        <!-- EDIT Modal-->
         <div class="modal fade" id="editCripto" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
             aria-hidden="true">

            <div class="modal-dialog modal modal-dialog-centered" role="document">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h3 class="modal-title text-dark" id="editModalLabel"><b>Editar Una Criptomoneda!</b></h3>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        {{-- action="{{ route('portfolio.store') }}" action="{{route('portfolio.update',$recetas->id)}}" --}}
                        <form id="contactsForm" class="criptomoneda" method="POST" action="">
                            @method('PUT')

                            @csrf
                            <div class="form-group row">
                                <label for="moneda">Moneda:</label>
                                <select class='mi-selector'  class="form-control form-control-user @error('precio_compra') is-invalid @enderror" name="moneda" id="editmoneda"  required>
                                    
                                    @for ($i = 0; $i < count($name_cripto); $i++) 
                                        <?php 
                                                echo "<option id='{$name_cripto[$i]['symbol']}' value='{$name_cripto[$i]['symbol']}'>{$name_cripto[$i]['symbol']}</option>";
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
                                    <input id="edit_precio_compra" type="number" step="0.000000000001" class="form-control form-control-user @error('precio_compra') is-invalid @enderror"
                                    placeholder="precio_compra" name="precio_compra" value="{{ old('precio_compra') }}" required autocomplete="precio_compra">
                                    @error('precio_compra')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>

                            
                            <div class="form-group row">
                                <label for="cantidad">Cantidad:</label>
                                    <input id="editCantidad" type="number"  step="0.000000000001" class="form-control form-control-user @error('cantidad') is-invalid @enderror"
                                    placeholder="cantidad" name="cantidad" value="{{ old('cantidad') }}" required autocomplete="cantidad">
                                    @error('cantidad')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group row">
                                <label for="fecha_publicacion">Fecha de compra:</label>
                                <input id="editfecha_publicacion" type="date" class="form-control form-control-user @error('fecha_publicacion') is-invalid @enderror"
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
                        Editar Moneda
                    </button>
                </div>
            
            </form>
            </div>
            </div>
        </div>
   

        {{-- Remove Modal --}}
        <div class="modal fade" id="removeCripto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ¿Está seguro/a de borrar la Criptomoneda seleccionada?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hodl</button>
          
                        <form id="formularioBorrado" action="{{ route('portfolio.destroy', 0) }}"
                            data-action="{{ route('portfolio.destroy', 0) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Vender Criptomoneda</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script>
            window.onload = function () {
                $('#removeCripto').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var id = button.data('id') // Extract info from data-* attributes
                    console.log(id);
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('Olvidando criptomoneda con identificador: ' + id)
          
                    // Cogemos el accion del data-action por que éste no cambia a lo largo de los distintos borrados.
                    // Y así no tenemos problemas al intentar borrar registros con más de 1 dígito o que nos mantenga los dígitos del registro borrado anteriormente.
                    accion = $("#formularioBorrado").attr("data-action").slice(0, -1) + id
                    $("#formularioBorrado").attr('action', accion)
                })
            }
          </script>
        {{-- Neutral MOdal --}}

        <div class="modal fade" id="neutralCripto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">

            <div class="modal-dialog modal-dialog-scrollable modal modal-dialog-centered overflow-scroll" role="document">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h3 class="modal-title text-dark" id="exampleModalLabel"><b>Modificar Criptomoneda!</b></h3>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid" id="neutralContainerModel">

                    </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                        {{-- <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Añadir Moneda</a> --}}
                </div>
            </div>
        </div>
        <script>
  
            //   $("body .removeLink").click(function(){
            //     $('#neutralCripto').modal('hide');
            //       )};
            $(".neutralCripto").click(function(){
            var url1 = "portfolio/";
            var url2 = "/getMoneda";
            var tour_id= $(this).val();
            $.get(url1 + tour_id + url2, function (datos) {
                //success data
                // foreach(data as infoMoneda){
                //     console.log(infoMoneda);
                // }
                $("#neutralContainerModel").html("");
             datos['data'].forEach(function(element){
                console.log(element[0]);
                $("#neutralContainerModel").append(
                    '<div class="card w-100"><div class="card-body"><h5 class="card-title">'+element[0]['moneda']+'</h5><p class="card-text">Fecha de compra: '+moment(element[0]['fecha_publicacion']).format('DD/MM/YYYY')+'</p><p class="card-text">Cantidad de compra: '+element[0]['cantidad']+'</p><p class="card-text">Precio de compra: '+element[0]['precio_compra']+'</p> <button type="button" data-dismiss="modal" class="btn btn-danger" data-toggle="modal" data-target="#removeCripto" data-id="'+element[0]['id']+'"><i class="fas fa-trash"></i></button><button type="button"  data-dismiss="modal" class="btn btn-warning btn-detail mx-3 editBoton" value="'+element[0]['id']+'"><i class="fas fa-edit"></i></button></div></div>'

                )
            
            });
                // // console.log(data["data"]);
                // data["data"].forEach(function(info){
                //     console.log(info);
                // });
                $('#neutralCripto').modal('show');
            }) 
            // console.log("hola");
        });

        $(document).on('click','.editBoton', function(){ //esta función se ejecutará en todos los casos
            console.log("EditandoMoneda");
            var url3 = "portfolio/";
            var url4 = "/edit";
            var tour_id= $(this).val();
            // console.log(tour_id);
            $.get(url3 + tour_id + url4, function (datos) {
            //    console.log();
               $("#edit_precio_compra").val(datos[0]['precio_compra']);
               $("#editCantidad").val(datos[0]['cantidad']);
               $("#editfecha_publicacion").val(moment(datos[0]['fecha_publicacion']).format('YYYY-MM-DD'));
            //    https://criptocontrol.com/monedas.json
            console.log($("#editmoneda option#"+datos[0]['moneda']+""));
                // $("#editmoneda option #"+datos[0]['moneda']).attr("selected",true); 
                $('#contactsForm').attr('action', "/portfolio/"+datos[0]['id']);

                $("#editmoneda option[value="+datos[0]['moneda']+"]").attr("selected",true);
         
               $('#editCripto').modal('show');

            });
        });

       
        </script> 
        <script>
     
            function autocomplete(inp, arr) {
              /*the autocomplete function takes two arguments,
              the text field element and an array of possible autocompleted values:*/
              var currentFocus;
              /*execute a function when someone writes in the text field:*/
              inp.addEventListener("input", function(e) {
                  var a, b, i, val = this.value;
                  /*close any already open lists of autocompleted values*/
                  closeAllLists();
                  if (!val) { return false;}
                  currentFocus = -1;
                  /*create a DIV element that will contain the items (values):*/
                  a = document.createElement("DIV");
                  a.setAttribute("id", this.id + "autocomplete-list");
                  a.setAttribute("class", "autocomplete-items");
                  /*append the DIV element as a child of the autocomplete container:*/
                  this.parentNode.appendChild(a);
                  /*for each item in the array...*/
                  for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                      /*create a DIV element for each matching element:*/
                      b = document.createElement("DIV");
                      /*make the matching letters bold:*/
                      b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                      b.innerHTML += arr[i].substr(val.length);
                      /*insert a input field that will hold the current array item's value:*/
                      b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                      /*execute a function when someone clicks on the item value (DIV element):*/
                      b.addEventListener("click", function(e) {
                          /*insert the value for the autocomplete text field:*/
                          inp.value = this.getElementsByTagName("input")[0].value;
                          /*close the list of autocompleted values,
                          (or any other open lists of autocompleted values:*/
                          closeAllLists();
                      });
                      a.appendChild(b);
                    }
                  }
              });
              /*execute a function presses a key on the keyboard:*/
              inp.addEventListener("keydown", function(e) {
                  var x = document.getElementById(this.id + "autocomplete-list");
                  if (x) x = x.getElementsByTagName("div");
                  if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                  } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                      /*and simulate a click on the "active" item:*/
                      if (x) x[currentFocus].click();
                    }
                  }
              });
              function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
              }
              function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                  x[i].classList.remove("autocomplete-active");
                }
              }
              function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                  if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                  }
                }
              }
              /*execute a function when someone clicks in the document:*/
              document.addEventListener("click", function (e) {
                  closeAllLists(e.target);
              });
            }
            
            /*An array containing all the country names in the world:*/
            
            var countries = ["BTC","ETH","BNB","MATIC","PENDLE","ZTB","KRILL","BIXB","DOGE","XRP","ADA","DOT","BCH","LTC","UNI","LINK","REEF","VET","SOL","FIL","THETA","NEO","MIOTA","CAKE","BAKE","Botswana","TRX","ALGO"];
            
            /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
            autocomplete(document.getElementById("moneda"), countries);
            
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>

    </div>
@endsection()