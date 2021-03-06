<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Components\Html\ListDashNav;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;

use Laravel\Socialite\Facades\Socialite;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        try{
            $request->authenticate();
            $request->session()->regenerate();
            return redirect()
                    ->route('painel')
                    ->with('message','Autenticação feita com sucesso');
        }catch(QueryException $e){
            return view('layouts.error',[
                'message' => "Senha ou email, errado",
                'descricao' =>  "",
                'back' => "register"
            ]);
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


    public function redirectToProvider($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider){
        $userProvider = Socialite::driver($provider)->stateless()->user();
        $user = User::firstOrCreate(['email'=>$userProvider->getEmail()],[
           "provider"=>$provider,
           "provider_id"=>$userProvider->getId(),
           "name"=>$userProvider->getName() ?? $userProvider->getNickname()
        ]);
        Auth::login($user);
        return view('dashboard');
    }

}
