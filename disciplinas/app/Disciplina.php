<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
  // A disciplina tem varias turmas
  public function turmas()
  {
    return $this->hasMany('App\Turma');
  }
}
