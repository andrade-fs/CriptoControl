<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use File;
use App\Models\post;
use App\Models\User;
use App\Models\Comment;
use App\Models\categoria;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\storePostPublicaciones;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show');
    
        
    }
    
  /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = categoria::get();
        $post = post::orderby('id','desc')->where('usuario_id',Auth::user()->id)->paginate(5);
        $post2 = post::orderby('id','desc')->where('usuario_id',Auth::user()->id)->get();
        $comment = Comment::orderBy("created_at","desc")->get();
        $voto = post::select('votos')->where('usuario_id',Auth::user()->id)->get();
        $aVotos = [];
        foreach($voto as $itemVoto){
            // dd(unserialize($itemVoto['votos']));
            if($itemVoto['votos'] != "0" ){
                $votos =  unserialize($itemVoto['votos']);
                if(isset($votos[0]) && $votos[0] !=""){
                    array_push($aVotos, $votos);

                }
            }            

        }
        return view("posts.index")->with('categorias', $categorias)->with('publicaciones',$post)->with('comment', $comment)->with('votos',$aVotos)->with("post2",$post2);
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
    public function store(storePostPublicaciones $request)
    {
        $posts = post::create($request->validated()+['usuario_id'=>Auth::user()->id]);
        session(['posts'=>$posts]);

        if ($request->foto){
            $this->imagen($request, $posts);
        }else{
            $posts->foto='ForgotPassword.png';
            $posts->save();

        }
        return redirect("/notificacionBot");
        //  return back()->with('estado', 'Publicación Creada Correctamente');

         // Notificacion por correo
        //  $correos = User::select('email')->where('correos','0')->get();
       
        //  foreach ($correos as $correo) {
             
        //      SendEmail::dispatch($recetas->nombre,$recetas->ingredientes, $recetas->preparacion,$correo->email);
        //  }
        // return redirect("/notificacionBot");

    }
    public function imagen(Request $request, post $post)
    {

        $request->validate([
            "foto" => "required|image|mimes:jpeg,png,jpg|max:5096"
        ]);

        if (!is_null($post->foto)) {
            // Borramos la foto antigua
            if (File::exists('imagenes/' . $post->foto)){
                File::delete('imagenes/' . $post->foto);
            }
               
        }

        $nombrefichero = md5(microtime()).".".$request->foto->extension();

        $request->foto->move(public_path("imagenes"),$nombrefichero);

        $post->foto=$nombrefichero;

        $post->save();
        session(['posts' => $post]);

        return back()->with("foto", $nombrefichero);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = post::orderBy("id","desc")->where('id',$id)->get();      
        $voto = post::select('votos')->where('id', '=', $id)->first();
        if($voto['votos'] != '0'){
            // dd($voto['votos']);
          $users_voto =  unserialize($voto['votos']);
        }else{
            $users_voto = [0];
        }
        if(count($post)==1){
            $categorias = categoria::orderBy("id","desc")->where('id',$post[0]->categoria_id)->get();  
            $user = User::orderBy('id','desc')->where('id',$post[0]->usuario_id)->get();
            $postAll = post::orderBy("created_at","desc")->limit(3)->get();      
            $comment = Comment::orderBy("created_at","desc")->where('post_id',$id)->paginate(20);
            return view('posts.show')->with('post', $post)->with('categoria', $categorias)->with('user', $user)->with('top3', $postAll)->with('users_voto', $users_voto )->with('comment',$comment);   

        }else{
            return view('errors.notfound');   
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = post::orderBy("id","desc")->where('usuario_id',Auth::user()->id)->where('id',$id)->get();      
        // dd($portfolios[0]['moneda']);
        return $post;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(storePostPublicaciones $request, $id)
    {
           //UPDATE THIS RECETA WITH THE USER_ID
           $post = post::where('id', '=', $id)->first();
           $input = $request->all () + ['usuario_id' => Auth::user()->id];
           $post->fill($input)->save();
   
           if ($request->foto){
               $this::imagen($request, $post);
           }
           
           
           return back()->with('estado', 'Modificado correctamente');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        $post->delete();
        
        return redirect("/admin");
    }
    public function votar(post $post)
    {

  
        $aUsers_votos = [];
        $user = Auth::user()->id;
        
        $voto = post::select('votos')->where('id', '=', $post->id)->first();
        if($voto['votos'] == '0'){             // Añadirlo
            array_push($aUsers_votos, Auth::user()->id);
            DB::table('posts')->where('id', $post->id)->update(['votos' => serialize($aUsers_votos)]);
            return back()->with('voto', 'Votado Correctamente');
        }else {
            $user_reg = "noUser";
            $votoUnser = unserialize($voto['votos']);
            for ($i=0; $i < count($votoUnser); $i++) { 
                if(Auth::user()->id == $votoUnser[$i]){
                   $user_reg = "userAdd";
                   unset($votoUnser[$i]);
                   goto serializearray;
                }
           }

           if($user_reg == "noUser"){
            array_push($votoUnser, Auth::user()->id);
   
           }
           serializearray:
            DB::table('posts')->where('id', $post->id)->update(['votos' => serialize($votoUnser)]);


        }
        // if (!$voto->count()) {
        //     Votos::create(['receta_id' => $receta->id, 'usuario_id' => Auth::user()->id]);
        //     $receta->increment('votos', 1);
        // } else {
        //     return back()->with('problema', 'Usted ya ha registrado un voto en este producto');
        // }
        return back()->with('estado', 'Se ha procesado su voto correctamente');
    }
}
