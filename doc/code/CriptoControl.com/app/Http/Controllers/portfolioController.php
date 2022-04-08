<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\post;
use App\Models\portfolio;
use App\Models\statusacount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storePortfolioPost;

class portfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    
        
    }
        
        
    public function index()
    {
        $datosMonedas = file_get_contents("apiCripto.json");
        $json_monedas= json_decode($datosMonedas, true);
        // $monedasJSON = file_get_contents("monedas.json");
        // $name_cripto= json_decode($monedasJSON, true);
        // dd($name_cripto);
        // Selecionamos las monedas del portfolio
        if(Auth::user()){
            $countMonth     = 0;
            $countM    = 0;
            $countY      = 0;
            $countYesterday = 0;
            $post           = post::where('usuario_id',Auth::user()->id)->get();     
            $portfolios     = portfolio::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->paginate(6);      
            $statusCount    = statusacount::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->get();
            $fecha_actual   = Carbon::now();
            $fecha_d_actual = $fecha_actual->format('m-d');
            $fecha_d_ayer   = $fecha_actual->subDay()->format('m-d');
            // dd($fecha_d_actual);
            // dd($statusCount);
            if(count($portfolios) !=0){
                $countNow ="";
            if(count($statusCount)!=0){
                foreach ($statusCount as $statusCountkey) {
                    $fecha_d_entrada = $statusCountkey['created_at']->format('m-d');
                    if($fecha_d_ayer == $fecha_d_entrada ){
                        $countYesterday = $statusCountkey['solvencia'];
                    }
                    if($fecha_d_actual == $fecha_d_entrada ){
                        $countNow = $statusCountkey['solvencia'];
                    }
                }
                // dd($countYesterday);
            }else{
                foreach($portfolios as $portfolio){
                    $fecha_m_entrada = $portfolio['created_at']->format('m-d');
                        if($fecha_d_ayer == $fecha_m_entrada){
                             $portfolio['cantidad'];    
                            for ($i = 0; $i < count($json_monedas['data']); $i++) { 
                                if(($portfolio['moneda'] == $json_monedas['data'][$i]['symbol']) || ($portfolio['moneda'] == $json_monedas['data'][$i]['slug'])){
                                    $countYesterday += (($json_monedas['data'][$i]['quote']['USD']['price'])*($portfolio['cantidad']));
            
                                }
                            
                            }


                        }
                    }
                    // dd($countYesterday);
            }
        
            $cripto_array = [];
            foreach ($portfolios  as $portfolio) {
                $cripto = $portfolio->moneda;
                $fecha_m_entrada = $portfolio['created_at']->format('Y-m');
                
                    if(!in_array($cripto, $cripto_array)){
                    
                        $cripto_array[] = $cripto;
                    
                }
               
            }
            // dx($ids_products); // trace


            $result = [];
            $cantidadFinal = 0;
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
                
                for ($i = 0; $i < count($json_monedas['data']); $i++) { 
                    if(($unique_cripto == $json_monedas['data'][$i]['symbol']) || ($unique_cripto == $json_monedas['data'][$i]['slug'])){
                        $cantidadFinal += (($json_monedas['data'][$i]['quote']['USD']['price'])*($countCripto))-$countDeposit;
                        
                    }               
                }

            }
            $porcentaje = (($cantidadFinal/$countDeposit)*100);
            // dd($cantidadFinal);
            // if($countM == 0)$countM = 1;
            // $totalMonth = $countMonth/$countM;
                    
            }else{
                return view("portfolio.create");
 
            }
        }else{
           
            return view("errors.userNotLoged");
        }
       // dd($recetas);

        // Precio  monedas


        // dd($json_monedas['data'][0]['quote']);
        // dd($json_monedas['data'][0]);

        // dd($cantidadFinal);
        // dd($countYesterday);
        // dd($statusCount);
        return view("portfolio.index")->with('json_monedas',$json_monedas)->with('portfolios', $portfolios)->with('totalMonth',$cantidadFinal)->with('yesterday',$countYesterday)->with('countNow',$countNow)->with('porcentajeTotal',$porcentaje)->with('depositado',$countDeposit)->with("publicacions",$post);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePortfolioPost $request)
    {
        // dd($request);
        $portfolio = portfolio::create($request->validated()+['usuario_id' => Auth::user()->id]);
        $monedaCreada = "success";
        // dd($json_monedas['data'][0]['quote']);
        // dd($json_monedas['data'][0]);
        // return view("portfolio.index")->with('estado',$monedaCreada)->with('json_monedas',$json_monedas)->with('portfolios', $portfolios)->with('totalMonth',$cantidadFinal)->with('yesterday',$countYesterday)->with('statusAcount',$statusCount);
        return redirect("/portfolio");
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getMoneda($moneda)
    {
        $portfolios     = portfolio::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->where('moneda',$moneda)->get();      
        $i =0;
        $ordenPortfolio = [];
        foreach ($portfolios as $portfolio) { 
              
                $ordenPortfolio[$i]=[
                    $portfolio
                ];
                $i++;

        }
        // dd($ordenPortfolio);
        return response()->json([
            "success" =>  true,
            "data"=> $ordenPortfolio,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $portfolios = portfolio::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->where('id',$id)->get();      
        // dd($portfolios[0]['moneda']);
        return $portfolios;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePortfolioPost $request, $id)
    {
        $portfolios = portfolio::where('id', '=', $id)->where('usuario_id',Auth::user()->id)->first();
        $input = $request->all();
        $portfolios->fill($input)->save();
        return back()->with('estado', 'Editado Correctamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(portfolio $portfolio)
    {
        $portfolio->delete();
        return back()->with('estado', 'Eliminado Correctamente');
        
    }
}
