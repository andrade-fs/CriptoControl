<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\SocialLogin;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider = 'twitter'){

        if(!config("services.$provider")) abort('404');

        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider = 'twitter'){
        if(!config("services.$provider")) abort('404');
        //   dd(Socialite::driver($provider)->user());
        $userSocialite = Socialite::driver($provider)->user();

        if($userSocial = User::where('email',$userSocialite->email)->orWhere('email',$userSocialite->nickname)->first()){
            if($userSocial2 = SocialLogin::where('nick_email',$userSocialite->email)->orWhere('nick_email',$userSocialite->nickname)->first()){
                $input = [
                    'name' => Str::of($userSocialite->name)->explode(' ')[0],
                    // 'surname' => Str::of($userSocialite->name)->explode(' ')[1], // Andres Cruz VE
                    'fecha_nacimiento'=> $userSocial->fecha_nacimiento,
                    'correos'=>1,
                    'password' => $userSocial->password,
                    'fotografia' => $userSocialite->avatar,
                    'rol_id' => $userSocial->rol_id,
                    'email' => $userSocialite->email ? $userSocialite->email : $userSocialite->nickname,
                ];
                $userSocial->fill($input)->save();
                return $this->loginAndRedirect($userSocial2->user);
            }else{
                $input = [
                    'name' => Str::of($userSocialite->name)->explode(' ')[0],
                    // 'surname' => Str::of($userSocialite->name)->explode(' ')[1], // Andres Cruz VE
                    'fecha_nacimiento'=>  $userSocial->fecha_nacimiento,
                    'correos'=>1,
                    'password' =>  $userSocial->password,
                    'fotografia' => $userSocialite->avatar,
                    'rol_id' => $userSocial->rol_id,
                    'email' => $userSocialite->email ? $userSocialite->email : $userSocialite->nickname,
                ];
                
                SocialLogin::create([
                    'user_id' => $userSocial->id,
                    'provider'=> $provider,
                    'nick_email' => $userSocialite->email ? $userSocialite->email : $userSocialite->nickname,
                    'social_id' =>$userSocialite->id
                ]);
                $userSocial->fill($input)->save();

                return $this->loginAndRedirect($userSocial);
            }
        }else{
            // el usuario no existe
            //  dd($userSocialite->avatar);
            $user = User::create([
                'name' => Str::of($userSocialite->name)->explode(' ')[0],
                // 'surname' => Str::of($userSocialite->name)->explode(' ')[1], // Andres Cruz VE
                'fecha_nacimiento'=> date("Y-m-d H:i:s"),
                'correos'=>1,
                'password' => bcrypt(Str::random(10)),
                'fotografia' => $userSocialite->avatar,
                'rol_id' => 1,
                'email' => $userSocialite->email ? $userSocialite->email : $userSocialite->nickname,
            ]);

            SocialLogin::create([
                'user_id' => $user->id,
                'provider'=> $provider,
                'nick_email' => $userSocialite->email ? $userSocialite->email : $userSocialite->nickname,
                'social_id' =>$userSocialite->id
            ]);

            return $this->loginAndRedirect($user);

        }



       // dd($user);
    }
    // public function handleProviderCallBack($provider = 'google'){
    //     dd(Socialite::driver('google'));
    //     $user =Socialite::driver('google')->user();
    //     dd($user);
    // }
    private function loginAndRedirect($user){
        Auth::login($user);
        return redirect()->to('/');
    }

}
