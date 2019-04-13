<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
  protected $fillable = [ 'id','name','cpf', 'birthdate','email','photo' ];

  public function phones() {
    return $this->hasMany(Phone::class, 'contact_id');
  }

  public static function indexLetra($letra)
  {
    return static::where('name', 'LIKE', $letra . '%')->get();
  }
  public static function search($criterio)
  {
    return static::where('name', 'LIKE', '%' . $criterio . '%')->get();
  }
  
}
