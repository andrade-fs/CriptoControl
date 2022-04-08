<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\portfolio;
use App\Models\statusacount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
        
    }
    //
    public function area()
    {
        if(Auth::user()){
            $statusCount    = statusacount::orderBy("created_at","asc")->where('usuario_id',Auth::user()->id)->take(11)->get();
            $portfolios     = portfolio::orderBy("id","asc")->where('usuario_id',Auth::user()->id)->paginate(10);      
            $datosMonedas = file_get_contents("apiCripto.json");
            $json_monedas= json_decode($datosMonedas, true);
            if(count($statusCount) !=0){
                return response()->json([
                    "success" =>  true,
                    "data"=> $statusCount,
                    
                    ]);
            }else{

                if(count($portfolios) >= 1){   
                    foreach ($portfolios as $portfolio) {
                        $cripto_array = [];
                        foreach ($portfolios  as $portfolio) {
                            $cripto = $portfolio->moneda;
                            if(!in_array($cripto, $cripto_array)){
                                $cripto_array[] = $cripto;
                            }
                        }
                    }
                        // dx($ids_product); // trace
                        $countSolvencia = 0;

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
                                // echo $countDeposit;

                            }

                            for ($i=0; $i < count($json_monedas['data']); $i++) { 
                                if(($unique_cripto == $json_monedas['data'][$i]['symbol']) || ($unique_cripto == $json_monedas['data'][$i]['slug'])){
                                    $cantidadFinal = ($json_monedas['data'][$i]['quote']['USD']['price'])*($countCripto);
                                    $precioActual = $json_monedas['data'][$i]['quote']['USD']['price'];  
                                }

                            }
                            $countSolvencia +=round($cantidadFinal,2)-$countDeposit;
                            // echo  $countSolvencia;

                        }    
                        $fecha_actual   = Carbon::now();
                        $statusCount =[
                            "0"=>[
                                "created_at" =>$fecha_actual  ,
                                "solvencia"=> $countSolvencia,
                            ]
                        
                        
                        ];
                      return response()->json([
                        "success" =>  true,
                        "data"=> $statusCount,
                    
                    ]);

                }else{

                }
            }
          
        }else{
            return response()->json([
                "success" =>  false,
                
                ]);
        }
      
    }
    public function pie(){
        // $statusCount    = statusacount::orderBy("created_at","asc")->where('usuario_id',Auth::user()->id)->take(11)->get();
        $portfolios     = portfolio::orderBy("id","asc")->where('usuario_id',Auth::user()->id)->paginate(10);      
        $datosMonedas = file_get_contents("apiCripto.json");
        $json_monedas= json_decode($datosMonedas, true);
        if(Auth::user()){
            if(count($portfolios) >= 1){   
                foreach ($portfolios as $portfolio) {
                    $cripto_array = [];
                    foreach ($portfolios  as $portfolio) {
                        $cripto = $portfolio->moneda;
                        if(!in_array($cripto, $cripto_array)){
                            $cripto_array[] = $cripto;
                        }
                    }
                }
                    // dx($ids_product); // trace
                    $countSolvencia = 0;

                        $result = [];
                        $x = -1;
                        $cantidadFinal = 0;
                        $cantidadFinalMoneda = 0;
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
                            // echo $countDeposit;
                          

                      
                        // $countSolvencia +=round($cantidadFinal,2)-$countDeposit;
                        // echo  $countSolvencia;

                        }    
                     

                        for ($i=0; $i < count($json_monedas['data']); $i++) { 
                            if(($unique_cripto == $json_monedas['data'][$i]['symbol']) || ($unique_cripto == $json_monedas['data'][$i]['slug'])){
                                $cantidadFinalMoneda = ($json_monedas['data'][$i]['quote']['USD']['price'])*($countCripto);
                                $cantidadFinal += $cantidadFinalMoneda; 
                                $x++; 
                                $statusCount[$x]=[
                                    "moneda" =>$unique_cripto  ,
                                    "cantidad"=> $countCripto,
                                    "precio"=>$cantidadFinalMoneda,
                                ];
                            }

                        }
                        $countSolvencia +=round($cantidadFinal,2)-$countDeposit;
                        // echo  $countSolvencia;
                        // $statusMoneda =$i=>[
                        //          "moneda" =>$unique_cripto  ,
                        //          "cantidad"=> $countCripto,
                        //          "precio"=>$cantidadFinalMoneda,
                        //      ];
                        
                     
                        
                        // array_push($statusCount,$statusMoneda);
                    }    
                    $fecha_actual   = Carbon::now();
                    // $statusCount    =[$statusMoneda];
                   
                    return response()->json([
                        "success" =>  true,
                        "data"=> $statusCount,
                        "total"=>$cantidadFinal,
                    
                    ]);

            }else{

            }
        }
    }

    public function tradinView(){
        $datosMonedas = file_get_contents("monedas.json");
        $json_monedas= json_decode($datosMonedas, true);
        return view('tradin.show')->with('monedas',$json_monedas);
    }
    public function tradinViewPost(request $request){
        $validate = $request->validate([
            'moneda'=>'required'
            ]);
    
        // dd($request->moneda);
        $datosMonedas = file_get_contents("monedas.json");
        $json_monedas= json_decode($datosMonedas, true);
        return view('tradin.show')->with("criptocurrenci",$request->moneda)->with('monedas',$json_monedas);
    }

}
