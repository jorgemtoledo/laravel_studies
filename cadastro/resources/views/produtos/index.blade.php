@extends('layout.app', ["current" => "produtos"])

@section('body')
  <div class="card border">
    <div class="card-body">
      <h5 class="card-title">Cadastro de Produtos</h5>
      @if(count($prods) > 0)
      <table class="table table-ordered table-hover">
        <thead>
          <tr>
            <th>Código</th>
            <th>Produto</th>
            <th>Estoque</th>
            <th>Preço</th>
            <th>Categoria</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($prods as $prod)
          <tr>
            <td>{{ $prod->id }}</td>
            <td>{{ $prod->nome }}</td>
            <td>{{ $prod->estoque }}</td>
            <td>{{ $prod->preco }}</td>
            <td>{{ $prod->categoria->nome }}</td>
            <td>
              <a href="/produtos/editar/{{ $prod->id }}" class="btn btn-sm btn-primary">Editar</a>
              <a href="/produtos/apagar/{{ $prod->id }}" class="btn btn-sm btn-danger">Apagar</a>
            </td>
          </tr>              
          @endforeach
        </tbody>
      </table><!-- End table -->
      @endif
    </div><!-- End card body -->
    <div class="card-footer">
      <a href="/produtos/novo" class="btn btn-sm btn-primary">Novo Produto</a>
    </div><!-- End card footer -->
  </div><!-- End card border -->
@endsection