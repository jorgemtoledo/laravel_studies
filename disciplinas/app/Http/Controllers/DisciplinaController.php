<?php

namespace App\Http\Controllers;

use App\Disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth')->except(['index', 'show', 'search']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Disciplina::all();
        $disciplinas = Disciplina::all();
        // return view('disciplinas.index', ['disciplinas' => $disciplinas]);
        return view('disciplinas.index', compact('disciplinas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('disciplinas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $disciplina = new Disciplina;
      $disciplina->titulo = $request->titulo;
      $disciplina->ementa = $request->ementa;
      $disciplina->save();
      return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function show(Disciplina $disciplina)
    {
        return view('disciplinas.show', compact('disciplina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function edit(Disciplina $disciplina)
    {
      return view('disciplinas.edit',compact('disciplina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Disciplina $disciplina)
    {
      $disciplina->titulo = $request->titulo;
      $disciplina->ementa = $request->ementa;
      $disciplina->save();

      return redirect("/disciplinas/$disciplina->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Disciplina  $disciplina
     * @return \Illuminate\Http\Response
     */
    public function destroy(Disciplina $disciplina)
    {
      $disciplina->delete();
      return redirect('/');
    }

    public function createTurma($disciplina_id)
    {
      return view('disciplinas.turmas.create',compact('disciplina_id'));
    }

    public function storeTurma(Request $request, $disciplina_id)
    {
      // dd($request->inicio); //Outra forma de debugar
      $turma = new \App\Turma;
      $turma->ministrante = $request->ministrante;
      $turma->inicio = $request->inicio;
      $turma->fim = $request->fim;
      $turma->bibliografia = $request->bibliografia;
      $turma->disciplina_id = $request->disciplina_id;
      Disciplina::find($disciplina_id)->turmas()->save($turma);
      return redirect("/disciplinas/$disciplina_id");
    }

    // Busca simples
    public function search(Request $request)
    {
      $text = $request->text;
      $disciplinas = Disciplina::where('titulo', 'LIKE', "%{$text}%")->get();
      return view('disciplinas.index',compact('disciplinas'));
    }


}
