@extends('template.app')
@section('content')

<div class="col-md-12">
  <h3>Novo contato</h3>
</div>

<div class="col-md-8 well">
  <form class="col-md-12 card p-3" action="{{ url('contacts/store') }}" method="POST">
    {{ csrf_field() }}
    <div class="from-group">
      <label class="control-label">Nome</label>
      <input name="name" value="{{ old('name') }}" class="form-control  {{ $errors->has('name') ? 'is-invalid' : '' }}" placeholder="name">
      @if($errors->has('name'))
        <div class="invalid-feedback">
          {{ $errors->first('name') }} 
        </div>
      @endif
    </div>

    <div class="form-row">
      <div class="from-group col-md-6">
        <label class="control-label">CPF</label>
        <input type="number" name="cpf" value="{{ old('cpf') }}" class="form-control {{ $errors->has('cpf') ? 'is-invalid' : '' }}" placeholder="CPF">
        @if($errors->has('cpf'))
          <div class="invalid-feedback">
            {{ $errors->first('cpf') }} 
          </div>
        @endif
      </div>
      <div class="from-group col-md-6">
        <label class="control-label">Data de Nascimento</label>
        <input type="date" name="birthdate" value="{{ old('birthdate') }}" class="form-control {{ $errors->has('birthdate') ? 'is-invalid' : '' }}">
        @if($errors->has('birthdate'))
          <div class="invalid-feedback">
            {{ $errors->first('birthdate') }} 
          </div>
        @endif
      </div>
    </div>

    <div class="from-group">
      <label class="control-label">E-Mail</label>
      <input type="email" name="email" value="{{ old('email') }}" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" placeholder="E-Mil">
      @if($errors->has('email'))
        <div class="invalid-feedback">
          {{ $errors->first('email') }} 
        </div>
      @endif
    </div>
    <div class="form-row">
      <div class="from-group col-md-3">
        <label class="control-label">DDD</label>
        <input type="number" name="ddd" value="{{ old('ddd') }}" class="form-control {{ $errors->has('ddd') ? 'is-invalid' : '' }}" placeholder="DDD">
        @if($errors->has('ddd'))
          <div class="invalid-feedback">
            {{ $errors->first('ddd') }} 
          </div>
        @endif
      </div>
      <div class="from-group col-md-9">
        <label class="control-label">Telefone</label>
        <input type="number" name="phone" value="{{ old('phone') }}" class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" placeholder="Telefone">
        @if($errors->has('phone'))
          <div class="invalid-feedback">
            {{ $errors->first('phone') }} 
          </div>
        @endif
      </div>
    </div>

    <div class="from-group">
      <label class="control-label">Tefone Fixo ou Celular?</label>
      <div class="from-group col-md-4">
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="typePhone" id="phone" value="0" checked>
          <label class="form-check-label" for="phone">Fixo</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="typePhone" id="cell" value="1">
          <label class="form-check-label" for="cell">Celular</label>
        </div>
      </div> 
    </div>

    <div class="from-group col-md-12">
      <label class="control-label">Foto</label>
      <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="photo">
        <label class="custom-file-label" for="customFile">Inserir Foto</label>
      </div>
      @if($errors->has('photo'))
        <div class="invalid-feedback">
          {{ $errors->first('photo') }} 
        </div>
      @endif
    </div>
      <button style="margin-top: 5px; float: right" class="btn btn-primary">salvar</button>
  </form><!-- /form --> 
</div><!-- /card-deck mb-6  --> 

@endsection