@extends('layouts.master')
@section('content')
<form method="POST" action="/disciplinas/{{ $disciplina->id  }}">
  {{ csrf_field() }}
  {{ method_field('patch') }}
  Nome: <input name="titulo" value="{{ $disciplina->titulo }}">
  Ementa: <textarea name="ementa"> {{ $disciplina->ementa }} </textarea>
  <button type="submit"> Salvar </button>
</form>
@endsection