<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class topController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    
        
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTop()
    {
        $datosMonedas = file_get_contents("apiCripto.json");
        $json_monedas= json_decode($datosMonedas, true);
        if(Auth::user()){
            $cripto24change = [];
            $winners = [];
            $lossers =[];
                for($i = 0; $i <= count($json_monedas['data'])-1; $i++){
                        array_push($cripto24change,$json_monedas['data'][$i]['quote']['USD']['percent_change_24h']);
                // dd($winners[0]['quote']['USD']['percent_change_24h']);
                 }
                 rsort($cripto24change);
                 $win  = $cripto24change; //WINNERS
                 sort($cripto24change);
                 $loss =$cripto24change ; //LOSSEER     S
                // dd($win);
                for($x = 0; $x < 10; $x++){
                   
                    foreach($json_monedas['data'] as $jsonMonedas){

                        if($jsonMonedas['quote']['USD']['percent_change_24h']==$win[$x]){
                            $winVar = $jsonMonedas;
                          
                        }
                        if($jsonMonedas['quote']['USD']['percent_change_24h']==$loss[$x]){
                            $loosVar = $jsonMonedas;
                        }
                     


                    }
                    if(isset($winVar) && $winVar != ""){
                        array_push($winners, $winVar);
                       $winVar = "";
                    }
                    if(isset($loosVar) && $loosVar != ""){
                        array_push($lossers, $loosVar);
                        $loosVar = "";

                    }
                }
                // dd($winners);
                  
        return view("topCriptos.show")->with('winners',$winners)->with('lossers',$lossers);
    }

}

}

