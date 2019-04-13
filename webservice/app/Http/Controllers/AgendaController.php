<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class AgendaController extends Controller
{

    public function index()
    {
        // $list = Agenda::all();
        $list = Agenda::paginate(10);
        return view('index', compact('list'));
    }


    // List Json
    public function indexjs()
    {
        return view('indexjs');
    }

    public function indexjson()
    {
        return Agenda::paginate(10);
    }



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
