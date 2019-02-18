@extends('layouts.master')
@section('content')
<h1> {{ $disciplina->titulo }} </h1>
<p> {{ $disciplina->ementa }} </p>
<a href="/disciplinas/{{ $disciplina->id }}/turmas/create">Inserir Turma</a>

<h1>Turmas:</h1>
@foreach ($disciplina->turmas as $turma)
  <div>
    {{ $turma->ministrante }}
    {{ $turma->inicio }}
  </div>
@endforeach
@endsection