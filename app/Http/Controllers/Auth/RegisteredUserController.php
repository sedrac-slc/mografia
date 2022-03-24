<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules;
use Illuminate\Database\QueryException;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $nacionalidades = DB::table('nacionalidades')->get();
        $provincias = DB::table('provincias')->get();

        return view('auth.register',compact('nacionalidades','provincias'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        try{

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nome_completo'=> ['required','string'],
            'genero' => ['required'],
            'telefone' => ['required'],
            'data_nascimento' => ['required','date']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nome_completo' => $request->nome_completo,
            'genero' => $request->genero,
            'telefone' => $request->telefone,
            'data_nascimento' => $request->data_nascimento
        ]);

        event(new Registered($user));

        Auth::login($user);

        return view('dashboard');

        }catch(QueryException $e){
            return "error sedrac";
        }

    }
}
