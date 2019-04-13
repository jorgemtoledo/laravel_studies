@extends('template.app')
@section('content')

<div class="col-md-12">
  <h3>Excluir contato</h3>
</div>

<div class="row">
  <div class="col-md-6 well">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <h5 class="card-title"><h3>Deseja excluir esse contato?</h3></h5> 
        </div>
        <hr>
        <div>
          <a href="{{ url("/contacts") }}" class="btn btn-outline-secondary btn-sm btn-style">
            <i class="fa fa-reply" aria-hidden="true"></i>Cancelar
          </a> 
          <a href="{{ url("/contacts/$contact->id/destroy") }}" class="btn btn-outline-danger btn-sm btn-style">
            <i class="fa fa-trash" aria-hidden="true"></i> EXCLUIR
          </a>               
        </div>
      </div><!-- /card-body --> 
    </div><!-- /card  --> 
  </div><!-- /col-md-6 --> 
  <div class="col-md-3 col-sm-6">
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
      <div class="card-body">
        <div class="row">
          <div class="col-md-8">{{ $contact->name }}</div>
          <div class="col-md-4 ml-auto">
            <div>
              <a href="/contacts/" class="btn btn-outline-warning btn-sm"><i class="fa fa-align-justify" aria-hidden="true"></i></a> 
            </div>   
          </div>
          </div>
        <hr>
        <ul class="list-unstyled mt-3 mb-4">
          @foreach ($contact->phones as $phone)
          <li>({{ $phone->ddd }}) {{ $phone->phone }} - 
            <a href="/contacts/{{ $phone->id  }}/{{ $pessoa->id }}/editTelefone" class="btn btn-secondary btn-sm btn_style"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
            <a href="{{ url("/contacts/$phone->id/excluirPhone") }}" onclick="return confirm('Deseja realmente excluir, esse telefone?');" class="btn btn-danger btn-sm btn_style"><i class="fa fa-trash" aria-hidden="true"></i></a> 
          </li>          
          @endforeach          
        </ul>
      </div>
    </div>
  </div><!-- /card-deck mb-3  -->  
</div><!-- /row  --> 


@endsection