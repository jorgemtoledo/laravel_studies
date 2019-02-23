@extends('template.app')
@section('content')

  <div class="col-md-12">
    <h3>Editar contato</h3>
  </div>

  <div class="row">
    <div class="col-md-6 well">
      <form class="col-md-12 card p-3" action="{{ url('/pessoas/update') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $pessoa->id }}">
        <div class="from-group col-md-12">
          <label class="control-label">Nome</label>
          <input name="nome" value="{{ $pessoa->nome }}" class="form-control   {{ $errors->has('nome') ? 'is-invalid' : '' }}" placeholder="Nome">
          @if($errors->has('nome'))
            <div class="invalid-feedback">
              {{ $errors->first('nome') }} 
            </div>
          @endif
        </div>
        <div>
          <button style="margin-top: 5px;  margin-left: 15px;" class="btn btn-primary">Editar</button>
        </div>
      </form><!-- /form --> 
    </div><!-- /col-md-6  --> 
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
  </div><!-- /row --> 

@endsection