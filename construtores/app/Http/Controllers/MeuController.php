<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuController extends Controller
{
  public function getNome()
  {
    return 'Ze Pequeno';
  }

  public function getIdade()
  {
    return '20 anos';
  }

  public function multiplicar($n1, $n2)
  {
    return  $n1 * $n2;
  }

  public function getNomeByID($id)
  {
    $v = ['Mario', 'Edson', 'Roberto', 'Jean'];
    if($id >= 0 && $id < count($v))
    {
      return $v[$id];
    }
    return "Não encontrado";
  }



}
