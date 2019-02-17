<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{

  // A turma pertente a uma disciplina
  public function disciplina()
  {
    return $this->belongsTo('App\Disciplina');
  }
}
