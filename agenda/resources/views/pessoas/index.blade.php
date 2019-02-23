@extends('template.app')
@section('content')

<style>
  .card {
    margin-bottom: 10px;
  }

  .pagination>li>a, .pagination>li>span { 
    /* border-radius: 50% !important; */
    margin: 0 8px;
    background: #343a40;
    color: #ffffff;
  }

  .btn_style {
    margin-bottom: 5px;
  } 
</style>

<div class="row">
  <div class="col-md-12 col-sm-6">
    <ul class="pagination pagination-sm">
    @foreach (range('A','Z') as $letra )
      <li class="page-item {{ $letra === $criterio ? 'disabled' : '' }}"><a class="page-link" href="{{ url('pessoas/' . $letra) }}">{{ $letra }}</a></li>
    @endforeach
    </ul>
  </div>
</div><!-- /row  -->

<div class="row">
  <div class="col-md-6 col-sm-6">
    <h3>Critério: {{ $criterio }}</h3>
  </div>
  <div class="col-md-6 col-sm-6 d-flex justify-content-end">
    <form class="form-inline my-lg-0" action="{{ url('pessoas/busca') }}" method="POST">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="text" name="criterio" placeholder="Busca" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</div><!-- /row  -->
<hr>
<div class="row">
  @foreach ($pessoas as $pessoa )
    <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">{{ $pessoa->nome }}</div>
            <div class="col-md-4 ml-auto">
              <div class="dropdown">
                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ url("/pessoas/$pessoa->id/editar") }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                  <a class="dropdown-item" href="{{ url("/pessoas/$pessoa->id/excluir") }}"><i class="fa fa-trash" aria-hidden="true"></i>  Excluir</a>
                  <a class="dropdown-item" href="{{ url("/pessoas/$pessoa->id/addTelefone") }}"><i class="fa fa-phone" aria-hidden="true"></i> Add Telefone</a>
                </div>
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
  @endforeach
</div><!-- /row  -->
@endsection

