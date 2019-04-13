@extends('template.app')
@section('content')

<style>
  .btn_style {
    margin-bottom: 5px;
  } 
</style>

<div class="col-md-12">
  <h3>{{ Request::is('*/editPhone') ? 'Editar' : 'Cadastrar' }} telefone contato</h3>
</div>

<div class="row">
  <div class="col-md-6 well"> 
      @if(Request::is('*/editPhone'))
        <form class="col-md-12 card p-3" action="{{ url('/contacts/updatePhone') }}" method="POST">
          <input type="hidden" name="id_phone" value="{{ $phone->id }}">
      @else
        <form class="col-md-12 card p-3" action="{{ url('/contacts/store') }}" method="POST">
      @endif      
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $contact->id }}">
      <input type="hidden" name="name" value="{{ $contact->name }}">
      
      <div class="row">
        <div class="from-group col-md-4">
          <label class="control-label">DDD</label>
          @if(Request::is('*/editPhone'))
            <input name="ddd" value="{{ $phone->ddd }}" class="form-control {{ $errors->has('ddd') ? 'is-invalid' : '' }}" placeholder="DDD">
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
          @if(Request::is('*/editPhone'))
            <input name="phone" value="{{ $phone->phone }}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Telefone">
          @else
            <input name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Telefone">
          @endif      
          @if($errors->has('phone'))
            <div class="invalid-feedback">
              {{ $errors->first('phone') }} 
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
          <div class="col-md-8">{{ $contact->name }}</div>
          <div class="col-md-4 ml-auto">
            <div>
              <a href="/" class="btn btn-outline-warning btn-sm"><i class="fa fa-align-justify" aria-hidden="true"></i></a> 
            </div>   
          </div>
          </div>
        <hr>
        <ul class="list-unstyled mt-3 mb-4">
          @foreach ($contact->phones as $phone)
          <li>({{ $phone->ddd }}) {{ $phone->phone }} - 
            <a href="/contact/{{ $phone->id  }}/{{ $contact->id }}/editPhone" class="btn btn-secondary btn-sm btn_style"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
            <a href="{{ url("/contact/$phone->id/excluirPhone") }}" onclick="return confirm('Deseja realmente excluir, esse telefone?');" class="btn btn-danger btn-sm btn_style"><i class="fa fa-trash" aria-hidden="true"></i></a> 
          </li>          
          @endforeach          
        </ul>
      </div>
    </div>
  </div><!-- /card-deck mb-3  -->  
</div><!-- /row  --> 
@endsection