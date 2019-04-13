@extends('template.app')
@section('content')

  <div class="col-md-12">
    <h3>Editar contato</h3>
  </div>

  <div class="row">
    <div class="col-md-6 well">
      <form class="col-md-12 card p-3" action="{{ url('/contacts/update') }}" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $contact->id }}">
        <div class="from-group">
          <label class="control-label">Nome</label>
          <input name="name" value="{{ $contact->name }}" class="form-control   {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="Nome">
          @if($errors->has('name'))
            <div class="invalid-feedback">
              {{ $errors->first('name') }} 
            </div>
          @endif
        </div>

        <div class="form-row">
          <div class="from-group col-md-6">
            <label class="control-label">CPF</label>
            <input type="number" name="cpf" value="{{ $contact->cpf}}" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}">
            @if($errors->has('cpf'))
              <div class="invalid-feedback">
                {{ $errors->first('cpf') }} 
              </div>
            @endif
          </div>
          <div class="from-group col-md-6">
            <label class="control-label">Data de Nascimento</label>
            <input type="date" name="birthdate" value="{{ $contact->birthdate }}" class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : '' }}">
            @if($errors->has('birthdate'))
              <div class="invalid-feedback">
                {{ $errors->first('birthdate') }} 
              </div>
            @endif
          </div>
        </div>

        <div class="from-group">
          <label class="control-label">E-Mail</label>
          <input type="email" name="email" value="{{ $contact->email }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-Mil">
          @if($errors->has('email'))
            <div class="invalid-feedback">
              {{ $errors->first('email') }} 
            </div>
          @endif
        </div>

        {{-- <div class="from-group">
          <label class="control-label">Foto</label>
          <div class="custom-file">
            <input type="file"  class="custom-file-input" id="customFile" name="photo">
            <label class="custom-file-label" for="customFile">Inserir Foto</label>
          </div>
          @if($errors->has('photo'))
            <div class="invalid-feedback">
              {{ $errors->first('photo') }} 
            </div>
          @endif
        </div> --}}


        <div>
          <button style="margin-top: 5px;  margin-left: 15px;" class="btn btn-primary">Editar</button>
        </div>
      </form><!-- /form --> 
    </div><!-- /col-md-6  --> 
    <div class="col-md-3 col-sm-6">
       <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
           <div class="card-body">
            <div class="row">
              <div class="col-md-8">{{ $contact->nome }}</div>
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
                <a href="/contacts/{{ $phone->id  }}/{{ $phone->id }}/editPhone" class="btn btn-secondary btn-sm btn_style"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                <a href="{{ url("/contacts/$phone->id/excluirPhone") }}" onclick="return confirm('Deseja realmente excluir, esse telefone?');" class="btn btn-danger btn-sm btn_style"><i class="fa fa-trash" aria-hidden="true"></i></a> 
              </li>          
              @endforeach          
            </ul>
          </div>
        </div>
      </div><!-- /card-deck mb-3  -->  
  </div><!-- /row --> 

@endsection