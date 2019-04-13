<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Phone;

class PhoneController extends Controller
{
  public function store(Phone $phone){
    try {
      $phone->save();
    } catch (\Exception $e) {
        return "ERRO: " . $e->getMessage();
    }
  }
}
