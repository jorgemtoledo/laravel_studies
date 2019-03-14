@extends('layout.app', ["current" => "produtos"])

@section('body')
  <div class="card border">
    <div class="card-body">
      <form action="/produtos" method="POST">
        @csrf
        <div class="form-group">
          <label for="nomeProduto">Nome do Produto</label>
          <input type="text" class="form-control" name="nomeProduto" id="nomeProduto" placeholder="Produto">
        </div>
        <div class="form-row">
          <div class="form-group col-md-3">
            <label for="estoque">Estoque(Qtd)</label>
            <input type="number" name="estoque" class="form-control" id="estoque">
          </div>
          <div class="form-group col-md-3">
            <label for="preco">Preço R$</label>
            <input type='number' name="preco"  step='0.01' value='0.00' class="form-control" id="preco" placeholder='0.00' />
          </div>
          <div class="form-group col-md-6">
            <label for="categoria">Categoria</label>
            <select id="categoria" name="categoria" class="form-control">
              <option selected>Selecione.</option>
                @foreach ($cats as $cat)
                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
              @endforeach
            </select>
          </div>
        </div>        
        <button type="submit" class="btn btn-primary btn-sm">Salvar</button>
        <button type="cancel" class="btn btn-danger btn-sm">Cancelar</button>
      </form>
    </div>
  </div>
@endsection