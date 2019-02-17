@extends('layouts.master')
@section('content')
<p><a href="/disciplinas/create" class="btn btn-success">Cadastrar nova disciplina</a></p>

<!-- Commando para criar a tabela == table.table>thead>tr>th*3 -->

<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th>Disciplina</th>
      <th>Editar</th>
      <th>Apagar</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($disciplinas as $disciplina)
      <tr>
        <td>
        <a href="/disciplinas/{{ $disciplina->id }}">
          {{ $disciplina->titulo }}
        </a>
        </td>
        <td>
        <a href="/disciplinas/{{ $disciplina->id }}/edit" class="btn btn-primary"> Editar </a>
        </td>
        <td>
        <form method="POST" action="/disciplinas/{{ $disciplina->id }}">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <button type="submit" class="btn btn-danger">Apagar</button>
        </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

@endsection