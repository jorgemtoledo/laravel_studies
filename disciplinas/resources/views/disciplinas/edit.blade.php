@extends('layouts.master')
@section('content')

<div class="row">
  <div class="col-12">
    <form method="POST" action="/disciplinas/{{ $disciplina->id  }}">
    {{ csrf_field() }}
    {{ method_field('patch') }}
      <div class="card border-default"  style="width: 70rem;">
      <div class="card-header"> Editar </div>
        <div class="card-body p-3">
          <div class="form-group">
            <label for="name">Disciplina</label>
            <input name="titulo" class="form-control" value="{{ $disciplina->titulo }}" >
          </div>
          <div class="form-group">
            <label for="ementa">Ementa</label>
            <textarea name="ementa" class="form-control" >{{ $disciplina->ementa }}</textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>        
      </div>        
    </form>
  </div>
</div>

@endsection