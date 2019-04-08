<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Paginação</title>
  <style>
    body{
      padding: 20px;
    }

    .card {
      margin-left: 12%;
    }
  
  </style>
</head>
<body>
  <div class="content">
    
    <!-- Card -->
    <div class="card text-center" style="width: 90rem;">
      <div class="card-header">
        Tabela Clientes
      </div>
      <div class="card-body">
        <h5 class="card-title" id="cardTitle"></h5>
        <table class="table table-hover" id="tabelaClientes">
          <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">E-mail</th>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>2</td>
              <td>3</td>
              <td>4</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <nav id="paginator">
          <ul class="pagination">
            <!--<li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item active">
              <a class="page-link" href="#">2</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next</a>
            </li> -->
          </ul>
        </nav>
      </div>
    </div>
  </div>


  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

  <script type="text/javascript">
  // $.get('/json', {page: 1}, function(resp) {console.log(resp);})

    // Monta itens da paginação
    function getItem(data,i){
      if(i == data.current_page)
        page = '<li class="page-item active">';
      else
        page = '<li class="page-item">';
      page += '<a class="page-link" pagina="' + i + '"href="javascript:void(0);">'+ i + '</a></li>';
      return page;
    }

    // Monta itens da paginação Previous
    function getItemPrevious(data){
      i = data.current_page - 1;
      if(1 == data.current_page)
        page = '<li class="page-item disabled">';
      else
        page = '<li class="page-item">';
      page += '<a class="page-link" pagina="' + i + '"href="javascript:void(0);"> Anterior </a></li>';
      return page;
    }

     // Monta itens da paginação Next
     function getItemNext(data){
      i = data.current_page + 1;
      if(data.last_page == data.current_page)
        page = '<li class="page-item disabled">';
      else
        page = '<li class="page-item">';
      page += '<a class="page-link" pagina="' + i + '"href="javascript:void(0);"> Proximo </a></li>';
      return page;
    }

    // Monta paginação
    function montarPaginator(data){
      $("#paginator>ul>li").remove();
      $("#paginator>ul").append(getItemPrevious(data));

      // Criando limites das pages
      n = 10;
      if(data.current_page - n/2 <= 1)
        inicio = 1;
      else if (data.last_page - data.current_page < n)
        inicio = data.last_page - n + 1;
      else
        inicio = data.current_page - n/2;
      fim = inicio + n - 1;
      
      for(i=inicio; i<=fim; i++){
        page = getItem(data,i);
        // console.log(page);
        $("#paginator>ul").append(page);
      }

      $("#paginator>ul").append(getItemNext(data));
    }

    // Function para montar as linhas da tabela
    function montarLinha(cliente){
      return '<tr>' + 
        '<td>'+ cliente.id + '</td>' +
        '<td>'+ cliente.nome + '</td>' +
        '<td>'+ cliente.sobrenome + '</td>' +
        '<td>'+ cliente.email + '</td>' +
        '</tr>';
    }

    function montarTabela(data){
      // Função jquyer para remover linhas da tabela
      $("#tabelaClientes>tbody>tr").remove();      

      // Carregar todas a linhas
      for(i=0; i<data.data.length; i++){
        // console.log(data.data[i]);
        row = montarLinha(data.data[i]);
        // console.log(row);
        // Carregar e mostrar as linhas
        $("#tabelaClientes>tbody").append(row);
      }   

    }
    
  
    // Cria a função principal
    function carregarClientes(pagina) {
      $.get('/json', {page: pagina}, function(resp) {
        console.log(resp);
        // Função para montar a estrutura da tabela
        montarTabela(resp);

        // Função para montar paginação
        montarPaginator(resp);

        // Links das paginas
        $("#paginator>ul>li>a").click(function(){ carregarClientes( $(this).attr('pagina') ); });

        // Title card
        $('#cardTitle').html("Exibindo "+ resp.per_page + " clientes de " + resp.total + "(" + resp.from + " a " + resp.to + ")" );
      })
    }

    // função para carrregar a função principal adicionando o numero da paginate/page
    $(function(){
      carregarClientes(1);
    });


  
  </script>


</body>
</html>