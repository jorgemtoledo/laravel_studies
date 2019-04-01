<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{

	public function __construct()
	{
		// $this->middleware('primeiro');		
	}


	public function index(){
		return '<h3>Lista de Usuarios</h3>'.
		'<ul>'.
		'<li>Joao</li>'.
		'<li>Maria</li>'.
		'<li>Pedrinho</li>'.
		'<li>Marcos</li>'.
		'</ul>';
	}
}
