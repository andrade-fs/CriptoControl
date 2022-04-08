<?php

use App\Models\post;
use App\Models\Comment;
use App\Models\categoria;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotController;
use App\Http\Controllers\topController;
use App\Http\Controllers\cronController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\postController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\chartController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\apicoinController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\contactarController;
use App\Http\Controllers\portfolioController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\categoriasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/', function () {
//     return view('home');
// });
// Route::get('/home', function () {
//     return view('home');

// });

// INICIO
Route::get('/', function () {
    
    $categorias = categoria::get();
    $lasPost = post::orderby('created_at','desc')->limit(4)->get();
    // $asignaciones = DB::table('comentarios')
    // ->select('comentarios.*') // <== Con esto traes solo las posts que son distintas en el corpus de datos
    // ->join('posts', 'posts.id', '=', 'comentarios.post_id')
    // ->get();

    // $comments = Comment::orderby('created_at','desc')->get();
    $post = post::orderby('created_at','desc')->get();

    return view('index')->with('categorias', $categorias)->with('publicaciones',$lasPost)->with('allPost',$post);
   
})->name('home');

// Route::get('/',[portfolioController::class,'index'])->name('home');


// USUARIOS
Route::resource('usuarios', usersController::class);
Route::resource('usuarios', usersController::class);

// POSTS
Route::resource('post', postController::class);
Route::get('/votar/{post}',[postController::class, 'votar'])->name('post.votar');
Route::resource('coment', CommentsController::class);

//Top24
Route::get('/getTop',[topController::class, 'getTop'])->name('getTop.show');

// Portfolio
Route::resource('portfolio', portfolioController::class);
Route::resource('apicoin', apicoinController::class);
Route::get('/cronAPiCoinMarketCapSUperSecureProtectedForGuiriswithnl',[cronController::class, 'cron'])->name('apicoin.cron');
Route::get('/chart/area',[chartController::class, 'area'])->name('chart.area');
Route::get('/chart/pie',[chartController::class, 'pie'])->name('chart.pie');
Route::get('/portfolio/{portfolio}/getMoneda',[portfolioController::class, 'getMoneda'])->name('portfolio.getMoneda');

// Contactar.
Route::get('/contactar', [contactarController::class, 'create'])->name('contactar');
 Route::post('contactar', [App\Http\Controllers\contactarController::class, 'enviar'])->name('envioContactar');


// categorias
Route::resource('categorias', categoriasController::class);

// NotificacionBot
Route::match(['get', 'post'], '/botelegram', [BotController::class, 'gestionar']);
Route::get('/notificacionBot',function(){
    BotController::gestionar();
    return redirect(route('post.index'))->with('estado', 'Publicación Creada Correctamente');
});
Route::get('/trading', [chartController::class, 'tradinView'])->name('trading');
Route::post('/tradinPost', [chartController::class, 'tradinViewPost'])->name('tradingPost');


// ADMIN
Route::resource('admin', adminController::class);

// SOCIALITE

Route::get('login/social/{provider}',[LoginController::class, 'redirectToProvider']);
Route::get('login/social/callback/{provider}',[LoginController::class, 'handleProviderCallBack']);
// GOOGLE ACCES OUTH
// 402135710973-hoofh5bgbpjqs85kdh4bjfgpfe5hvn48.apps.googleusercontent.com publica
// aA4fRfKV00i5hexiNmXpYqsp   privada
// 




// TEXTOS LEGALES

Route::get('/aviso_legal', function () {
    return view('TextosLegales.avisoLegal');
});
Route::get('/coockies', function () {
    return view('TextosLegales.Coockies');
});
Route::get('/politica_privacidad', function () {
    return view('TextosLegales.privacidad');
});
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
