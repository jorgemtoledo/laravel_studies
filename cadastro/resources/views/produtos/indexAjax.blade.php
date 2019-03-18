@extends('layout.app', ["current" => "produtos"])

@section('body')
  <div class="card border">
    <div class="card-body">
      <h5 class="card-title">Cadastro de Produtos</h5>
      @if(count($prods) > 0)
      <table class="table table-ordered table-hover" id="tabelaProdutos">
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
          
        </tbody>
      </table><!-- End table -->
      @endif
    </div><!-- End card body -->
    <div class="card-footer">
      {{-- <a href="/produtos/novo" class="btn btn-sm btn-primary">Novo Produto</a> --}}
      <button class="btn btn-sm btn-primary" role="button" onclick="novoProduto()">Novo Produto</button>
    </div><!-- End card footer -->
  </div><!-- End card border -->

  <div class="modal" tabindex="-1" role="dialog" id="dlgProdutos">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="form-horizontal" id="formProduto">
          <div class="modal-header">
            <h5 class="modal-title">Novo Produto</h5>
          </div>
          <div class="modal-body">
            <input type="hidden" id="id" class="form-control">
            <div class="form-group">
              <label for="nomeProduto" class="control-label">Nome do Produto</label>
              <div class="input-group">
                <input type="text" class="form-control" id="nomeProduto" placeholder="Nomde do Produto">
              </div>
            </div>

            <div class="form-group">
              <label for="precoProduto" class="control-label">Preço</label>
              <div class="input-group">
                <input type="number" class="form-control" id="precoProduto" placeholder="Preço do Produto">
              </div>
            </div>

            <div class="form-group">
              <label for="estoqueProduto" class="control-label">Estoque</label>
              <div class="input-group">
                <input type="number" class="form-control" id="estoqueProduto" placeholder="Estoque do Produto">
              </div>
            </div>

            <div class="form-group">
              <label for="categoriaProduto" class="control-label">Categoria do Produto</label>
              <div class="input-group">
                <select  class="form-control" id="categoriaProduto">
                </select>
              </div>
            </div>
          </div><!-- End modal -->
          <div class="modal-footer">
            <button class="btn btn-primary" type="submit">Salvar</button>
            <button class="btn btn-secondary" type="cancel" data-dismiss="modal">Cancelar</button>
          </div>

        </form>
      </div>
    </div>

  </div>
@endsection

@section('javascript')

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
<script type="text/javascript">

  // $.ajax({
  //   headers: {
  //     'X-CSRF-TOKEN': "{{ csrf_token() }}"
  //   }    
  // });

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function novoProduto() {
    $('#id').val('');
    $('#nomeProduto').val('');
    $('#precoProduto').val('');
    $('#quantidadeProduto').val('');
    $('#dlgProdutos').modal('show');
  }

  function carregarCategorias(){
    $.getJSON('/api/categorias', function(data){ 
      for(i=0; i<data.length; i++){
        opcao = '<option value="' + data[i].id + '">' + data[i].nome + '</option>';
        $('#categoriaProduto').append(opcao);        
      }
    });
  }

  // Create row table
  function montarLinha(p) {
    var linha = "<tr>" +
    "<td>" + p.id + "</td>" +
    "<td>" + p.nome + "</td>" +
    "<td>" + p.estoque + "</td>" +
    "<td>" + p.preco + "</td>" +
    "<td>" + p.categoria_id + "</td>" +
    "<td>" + 
      '<button class="btn btn-sm btn-primary" onclick="editar('+ p.id + ')" > Editar </button> ' +
      '<button class="btn btn-sm btn-danger" onclick="remover('+ p.id + ')" > Apagar </button>' +    
    "</td>" +
    "</tr>";
    return linha;
  }

  // Remover
  function remover(id) {
    $.ajax({
      type: "DELETE",
      url: "api/produtos/" + id,
      context: this,
      success: function() {
        console.log('OK - Excluido');
        linhas = $("#tabelaProdutos>tbody>tr");
        e = linhas.filter(function(i, elemento) {
          return elemento.cells[0].textContent == id;
        });
        if(e)
          e.remove();
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  // Editar
  function editar(id){
    $.getJSON('/api/produtos/'+id, function(data){ 
      console.log(data);
      $('#id').val(data.id);
      $('#nomeProduto').val(data.nome);
      $('#precoProduto').val(data.preco);
      $('#estoqueProduto').val(data.estoque);
      $('#categoriaProduto').val(data.categoria_id);
      $('#dlgProdutos').modal('show');
    });
  }


  // Get produtos
  function carregarProdutos(){
    $.getJSON('/api/produtos', function(produtos) { 
      // alert(produtos);
      for(i=0; i<produtos.length; i++){
        // alert(produtos[i].id); 
        linha = montarLinha(produtos[i]);
        $('#tabelaProdutos>tbody').append(linha);
      }
    });
  }

  function criarProduto() {
    prod = {
      nome: $("#nomeProduto").val(),
      preco: $("#precoProduto").val(),
      estoque: $("#estoqueProduto").val(),
      categoria_id: $("#categoriaProduto").val()

    };
    // console.log(prod);
    $.post('/api/produtos', prod, function(data) {
     produto = JSON.parse(data);
     linha = montarLinha(produto);
        $('#tabelaProdutos>tbody').append(linha);
    })
  }

  // Salvar produto update
  function salvarProduto() {
    prod = {
      id: $("#id").val(),
      nome: $("#nomeProduto").val(),
      preco: $("#precoProduto").val(),
      estoque: $("#estoqueProduto").val(),
      categoria_id: $("#categoriaProduto").val()

    };
    $.ajax({
      type: "PUT",
      url: "api/produtos/" + prod.id,
      context: this,
      data: prod,
      success: function() {
        // console.log('OK - Atualizado');
        prod = JSON.parse(data);
        linhas = $("#tabelaProdutos>tbody>tr");
        e = linhas.filter(function(i, e){
          return (e.cells[0].textContent == prod.id);
        });
        if(e){
          e[0].cells[0].textContent = prod.id,
          e[0].cells[1].textContent = prod.nome,
          e[0].cells[2].textContent = prod.estoque,
          e[0].cells[3].textContent = prod.preco,
          e[0].cells[4].textContent = prod.categoria_id
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  }

  $(document).ready(function(){
    var form = $('#formProduto');
    form.submit(function(event){
      event.preventDefault();
      // console.log('teste');
      if($("#id").val() != '')
        salvarProduto();
      else        
        criarProduto();
      $("#dlgProdutos").modal('hide');
    });
  });

  // Carrega as funções carregarCategorias
  $(function() {
    carregarCategorias();
    carregarProdutos();
  })



</script>

