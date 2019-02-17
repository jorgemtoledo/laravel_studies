@extends('layouts.master')
@section('content')
<form method="POST" action="/disciplinas">
  {{ csrf_field() }}
  Nome: <input name="titulo">
  Ementa: <textarea name="ementa"></textarea>
  <button type="submit">Salvar</button>
</form>
@endsection

