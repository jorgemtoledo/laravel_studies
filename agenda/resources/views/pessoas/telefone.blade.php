@extends('template.app')
@section('content')

<style>
  .btn_style {
    margin-bottom: 5px;
  } 
</style>

<div class="col-md-12">
  <h3>{{ Request::is('*/editTelefone') ? 'Editar' : 'Cadastrar' }} telefone contato</h3>
</div>

<div class="row">
  <div class="col-md-6 well"> 
      @if(Request::is('*/editTelefone'))
        <form class="col-md-12 card p-3" action="{{ url('/pessoas/updateTelefone') }}" method="POST">
          <input type="hidden" name="id_telefone" value="{{ $telefone->id }}">
      @else
        <form class="col-md-12 card p-3" action="{{ url('/pessoas/store') }}" method="POST">
      @endif      
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $pessoa->id }}">
      <input type="hidden" name="nome" value="{{ $pessoa->nome }}">
      
      <div class="row">
        <div class="from-group col-md-4">
          <label class="control-label">DDD</label>
          @if(Request::is('*/editTelefone'))
            <input name="ddd" value="{{ $telefone->ddd }}" class="form-control {{ $errors->has('ddd') ? 'is-invalid' : '' }}" placeholder="DDD">
          @else
            <input name="ddd" value="{{ old('ddd') }}" class="form-control {{ $errors->has('ddd') ? 'is-invalid' : '' }}" placeholder="DDD">
          @endif
          @if($errors->has('ddd'))
            <div class="invalid-feedback">
              {{ $errors->first('ddd') }} 
            </div>
          @endif
        </div>
        <div class="from-group col-md-8">
          <label class="control-label">Telefone</label>
          @if(Request::is('*/editTelefone'))
            <input name="telefone" value="{{ $telefone->telefone }}" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" placeholder="Telefone">
          @else
            <input name="telefone" value="{{ old('telefone') }}" class="form-control {{ $errors->has('telefone') ? 'is-invalid' : '' }}" placeholder="Telefone">
          @endif      
          @if($errors->has('telefone'))
            <div class="invalid-feedback">
              {{ $errors->first('telefone') }} 
            </div>
          @endif
        </div>
        <div class="from-group col-md-12">          
          <button style="margin-top: 5px; float: right" class="btn btn-primary">salvar</button>
        </div>
      </div>          
    </form><!-- /form -->   
  </div><!-- /col-md-6 --> 
  <div class="col-md-3 col-sm-6">
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">{{ $pessoa->nome }}</div>
          <div class="col-md-4 ml-auto">
            <div>
              <a href="/pessoas/" class="btn btn-outline-warning btn-sm"><i class="fa fa-align-justify" aria-hidden="true"></i></a> 
            </div>   
          </div>
          </div>
        <hr>
        <ul class="list-unstyled mt-3 mb-4">
          @foreach ($pessoa->telefones as $telefone)
          <li>({{ $telefone->ddd }}) {{ $telefone->telefone }} - 
            <a href="/pessoas/{{ $telefone->id  }}/{{ $pessoa->id }}/editTelefone" class="btn btn-secondary btn-sm btn_style"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
            <a href="{{ url("/pessoas/$telefone->id/excluirTelefone") }}" onclick="return confirm('Deseja realmente excluir, esse telefone?');" class="btn btn-danger btn-sm btn_style"><i class="fa fa-trash" aria-hidden="true"></i></a> 
          </li>          
          @endforeach          
        </ul>
      </div>
    </div>
  </div><!-- /card-deck mb-3  -->  
</div><!-- /row  --> 
@endsection