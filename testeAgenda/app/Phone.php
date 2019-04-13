<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
  protected $fillable = [ 'id','ddd','phone', 'typePhone','contact_id'];

  public function contact()
  {
    return $this->belongsTo(Contact::class, 'contact_id');
  }
  
}
