<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\portfolio;
use App\Models\statusacount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class cronController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    
        
    // }
    //
       /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function cron()
    {
        /**
         * Requires curl enabled in php.ini
         **/

        // iNSERTAMOS EN LA BD, LAS GANANCIAS.
        
        $usuarios = User::orderBy("id","desc")->get();
        $datosMonedas = file_get_contents("apiCripto.json");
        $json_monedas= json_decode($datosMonedas, true);
        $solvenciaVer = statusacount::get(); 
        // dd($solvenciaVer);
        foreach ($usuarios as $users) {
            $portfolios = portfolio::orderBy("id","desc")->where('usuario_id', $users->id)->paginate(10);
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
                    $countSolvencia +=round($cantidadFinal,3)-$countDeposit;
                    // echo  $countSolvencia;

            }      
            // dd( $countSolvencia);
            $solvenciaEdit = statusacount::orderBy("created_at","desc")->where('usuario_id',$users->id)->take(1)->get();
            $fecha_actual = Carbon::now();
            $fecha_actual = $fecha_actual->format('Y-m-d');
            //  dd($fecha_entrada."<br>".  $fecha_actual);
                        
                if(count($solvenciaEdit) == 0){
                    $validated =   statusacount::create([
                        'solvencia' =>  $countSolvencia,
                        'usuario_id' => $users->id,
                    ]);
                }else{
                    $fecha_entrada = $solvenciaEdit[0]['created_at']->format('Y-m-d');

                    if($fecha_actual == $fecha_entrada){
                        // dd("si");

                        // Estamos en el mismo dia por lo que editamos.
                        $solvenciaEdit[0]->update([
                            'solvencia' =>  $countSolvencia,
                        ]);
                    }else{
                        //Es un dia nuevo por lo que creamos una nueva.
                        $validated =   statusacount::create([
                            'solvencia' =>  $countSolvencia,
                            'usuario_id' => $users->id,
                        ]);
                        
                    }
                }
            }
         
                
                // dd($users);
                // dd($countSolvencia);
               
                 
                // $portfolios = portfolio::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->paginate(10);      

              
                // dd($solvenciaEdit);
                // dd($users);
            }
        
        // dd($countSolvencia);
            // Comprobamos si tiene registros si esta vacio directamtente creamos.
       
//             dd($monedasSymbol);

// dd("hola");
        // DATOS DE LA API A UN JSON 
        $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
        'start' => '1',
        'limit' => '5000',
        'convert' => 'USD'
        ];

        $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: d67c7b5b-60fd-417a-801b-8311d9a17f78'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        // print_r(json_decode($response)); // print json decoded response
        // curl_close($curl); // Close request
        // Z404A03A105FAs$
        // dd( $response);
        // criptocontrol@criptocontrol.com  
        // // $arr_clientes = array('nombre'=> 'Jose', 'edad'=> '20', 'genero'=> 'masculino',
        // // 'email'=> 'correodejose@dominio.com', 'localidad'=> 'Madrid', 'telefono'=> '91000000');
        $criptoJson = json_decode($response,true);
        //  $monedasSymbol = [];
         $x = 0;
            foreach (($criptoJson['data']) as $key) {
                // array_push($monedasSymbol,[$x][$key['symbol']]);
                // $x++;
                // $x++; 
                $monedasSymbol[$x]=[
                    "symbol" =>$key['symbol']  ,
                ];
                $x++;
            }
        // dd(json_encode($monedasSymbol));
        // Z404A03A105AFs$
        //Creamos el JSON
        // $json_string = json_encode($arr_clientes);
        $file = 'apiCripto.json';
        file_put_contents($file, $response);
        $file2 = 'monedas.json';
        file_put_contents($file2, json_encode($monedasSymbol));

        // $datos_clientes = file_get_contents("apiCripto.json");
        // $json_clientes = json_decode($datos_clientes, true);
        
      
        
        return view('apiCoin.cron');
    }
    

}