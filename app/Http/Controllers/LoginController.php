<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('home.login');
    }

    public function entrar(Request $request)
    {
        $dados = $request->all();
        dd($dados['_token'] . ", " . $dados['username']);
        $user = Usuario::where('email', $dados['username'])->first();
        //dd($user->nome);
        return view('home.user_page', ['user' => $user]);
    }

    public function subscrive()
    {
        return view('home.subscrive');
    }

    public function store(Request $request)
    {
        $dados = $request->all();
        $usuario = new Usuario([
            'email' => $dados['email'],
            'nome' =>   $dados['nome'],
            'password' => bcrypt($dados['password'])
        ]);

        $saved = $usuario->save();
        return redirect('/boas-vindas');
        
    }
}
