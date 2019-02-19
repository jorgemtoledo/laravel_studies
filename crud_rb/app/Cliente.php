<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
  // Campos autorizados para cadastrar e altearar.
  protected $fillable = [
    'nome', 'enereco', 'numero',
  ];



}
