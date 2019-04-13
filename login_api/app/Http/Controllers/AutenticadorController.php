<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use Illuminate\Support\Facades\Auth;

class AutenticadorController extends Controller
{
  public function registro(Request $request){
    $request->validate([
      'name' => 'required|string',
      'email' => 'required|string|email|unique:users',
      'password' => 'required|string|confirmed'
    ]);

    $user = new User([
      'name' => $request->name,
      'email' => $request->email,
      'passport' => bcrypt($request->password)
    ]);
    $user->save();
    return response()->json([
      'res' => 'Cadastro com sucesso'
    ], 201);

  }

  public function login(Request $request){
    $request->validate([
      'email' => 'required|string|email',
      'password' => 'required|string'
    ]);

    $credenciais = [
      'email' => $request->email,
      'passport' => $request->password
    ];

    if(!Auth::attempt($credenciais))
      return response()->json([
        'res' => 'Acesso neagado'
      ], 401);

      $user = $request->user();
      $token = $user->createToken('Token de acesso')->accessToken();
      
      return response()->json([
        'token' => $token
      ], 200);

  }

  public function logout(Request $request){
    $request->user()->token()->revoke();
    return response()->json([
      'res' => "Deslogado com sucesso!"
    ], 204);

  }


}
