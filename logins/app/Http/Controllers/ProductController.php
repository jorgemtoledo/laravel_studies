<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');  
  } 

  public function index(){
    echo "<h4>Lista de produtos</h4>";
    echo "<ul>";
    echo "<li>Macarrão</li>";
    echo "<li>Feijão</li>";
    echo "<li>Arroz</li>";
    echo "<li>Leite</li>";
    echo "</ul>";
    echo "<hr>";

    if(Auth::check()){
      $user = Auth::user();
      echo "Você está logado";
      echo "<br>";
      echo $user->id;
      echo "<br>";
      echo $user->name;
      echo "<br>";
      echo $user->email;
    }


  }
}
