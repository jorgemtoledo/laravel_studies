@extends('template.app')
@section('content')

<div class="col-md-12">
  <h3>Novo contato</h3>
</div>

<div class="col-md-6 well">
  <form class="col-md-12 card p-3" action="{{ url('/pessoas/store') }}" method="POST">
    {{ csrf_field() }}
    <div class="from-group col-md-12">
      <label class="control-label">Nome</label>
      <input name="nome" value="{{ old('nome') }}" class="form-control  {{ $errors->has('nome') ? 'is-invalid' : '' }}" placeholder="Nome">
      @if($errors->has('nome'))
        <div class="invalid-feedback">
          {{ $errors->first('nome') }} 
        </div>
      @endif
    </div>
    <div class="from-group col-md-4">
      <label class="control-label">DDD</label>
      <input name="ddd" value="{{ old('ddd') }}" class="form-control {{ $errors->has('ddd') ? 'is-invalid' : '' }}" placeholder="DDD">
      @if($errors->has('ddd'))
        <div class="invalid-feedback">
          {{ $errors->first('ddd') }} 
        </div>
      @endif
    </div>
    <div class="from-group col-md-8">
      <label class="control-label">Telefone</label>
      <input name="telefone" value="{{ old('telefone') }}" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" placeholder="Telefone">
      @if($errors->has('telefone'))
        <div class="invalid-feedback">
          {{ $errors->first('telefone') }} 
        </div>
      @endif
    </div>
      <button style="margin-top: 5px; float: right" class="btn btn-primary">salvar</button>
  </form><!-- /form --> 
</div><!-- /card-deck mb-6  --> 

@endsection