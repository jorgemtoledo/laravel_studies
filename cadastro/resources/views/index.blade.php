@extends('layout.app', ["current" => "home"])

@section('body')
  <div class="jumbotron bg-light border border-secondary">
    <div class="row">
      {{-- Card-dark --}}
      <div class="card-deck">
        <div class="card border border-primary">
          <h5 class="card-title">Cadastro de produtos</h5>
          <p class="card-text">
            Aqui você cadastra todos os seus produtos.
            Só não se esqueça de cadastrar previamente as categorias.
          </p>
          <a href="/produtos" class="btn btn-primary">Cadastre os seu produtos</a>
        </div>
        <div class="card border border-primary">
          <h5 class="card-title">Cadastro de categorias</h5>
          <p class="card-text">
            Cadastre as categorias dos seus produtos.
          </p>
          <a href="/categorias" class="btn btn-primary">Cadastre os seu produtos</a>
        </div>
      </div><!-- End card-dark -->
    </div><!-- End row -->
  </div><!-- End jumbotron -->
@endsection