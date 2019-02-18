@extends('layouts.master')
@section('content')
<div class="row">
  <div class="col-12">
    <form method="POST" action="/disciplinas/{{ $disciplina_id }}/turmas">
    {{ csrf_field() }}
      <div class="card border-default"  style="width: 70rem;">
      <div class="card-header"> Cadastrar turma</div>
        <div class="card-body p-3">
          <div class="form-group">
            <label for="name">Ministrante</label>
            <input name="ministrante" class="form-control">
          </div>
          <div class="form-group">
            <label for="inicio">Data Inicio: </label>
            <input name="inicio" class="form-control">
          </div>
          <div class="form-group">
            <label for="fim">Data Fim: </label>
            <input name="fim" class="form-control">
          </div>
          <div class="form-group">
            <label for="bibliografia">Bibliografia</label>
            <textarea name="bibliografia" class="form-control" ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </div>        
      </div>        
    </form>
  </div>
</div>
@endsection