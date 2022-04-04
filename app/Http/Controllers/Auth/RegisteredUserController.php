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
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

     public function oi(Request $request)
     {
        dd($request->all());
     }

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
            return view('layouts.error',[
                'message' => "Não possível criar este usuário",
                'descricao' =>  "$request->nome_completo",
                'back' => "register"
            ]);
        }

    }
}
