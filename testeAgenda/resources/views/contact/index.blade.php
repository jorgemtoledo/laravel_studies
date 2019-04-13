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
      <li class="page-item {{ $letra === $criterio ? 'disabled' : '' }}"><a class="page-link" href="{{ url('contacts/' . $letra) }}">{{ $letra }}</a></li>
    @endforeach
    </ul>
  </div>
</div><!-- /row  -->

<div class="row">
  <div class="col-md-6 col-sm-6">
    <h3>Critério: {{ $criterio }}</h3>
  </div>
  <div class="col-md-6 col-sm-6 d-flex justify-content-end">
    <form class="form-inline my-lg-0" action="{{ url('contacts/busca') }}" method="POST">
      {{ csrf_field() }}
      <input class="form-control mr-sm-2" type="text" name="criterio" placeholder="Busca" aria-label="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
  </div>
</div><!-- /row  -->
<hr>
<div class="row">
  @foreach ($contacts  as $contact )
    <div class="col-md-3 col-sm-6">
      <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
        <div class="card-body">
          <div class="row">
            <div class="col-md-8">{{ $contact->name }}</div>
            <div class="col-md-4 ml-auto">
              <div class="dropdown">
                <button type="button" class="btn btn-outline-info btn-sm dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cogs" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{ url("/contacts/$contact->id/edit") }}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</a>
                  <a class="dropdown-item" href="{{ url("/contacts/$contact->id/delete") }}"><i class="fa fa-trash" aria-hidden="true"></i>  Excluir</a>
                  <a class="dropdown-item" href="{{ url("/contacts/$contact->id/addPhone") }}"><i class="fa fa-phone" aria-hidden="true"></i> Add Telefone</a>
                </div>
              </div>   
            </div>
          </div>
          <hr>
          <ul class="list-unstyled mt-3 mb-4">
            @foreach ($contact->phones as $phone)
            <li>({{ $phone->ddd }}) {{ $phone->phone }} - 
              <a href="/contacts/{{ $phone->id  }}/{{ $contact->id }}/editPhone" class="btn btn-secondary btn-sm btn_style"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
              <a href="{{ url("/contacts/$phone->id/excluirPhone") }}" onclick="return confirm('Deseja realmente excluir, esse telefone?');" class="btn btn-danger btn-sm btn_style"><i class="fa fa-trash" aria-hidden="true"></i></a> 
           </li>
            @endforeach          
          </ul>
        </div>
      </div>
    </div><!-- /card-deck mb-3  -->     
  @endforeach
</div><!-- /row  -->
@endsection

