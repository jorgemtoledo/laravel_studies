<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Webservice</title>
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
        Agenda
      </div>
      <div class="card-body">
        {{-- <h5 class="card-title">Lista de cadastro {{ $list->count() }} de {{ $list->total() }}  ({{ $list->firstItem() }}  a {{ $list->lastitem() }} )</h5> --}}
        <table class="table table-hover" id="listAgenda">
          <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">CPF</th>
            <th scope="col">Data de nascimento</th>
            <th scope="col">Telefone fixo</th>
            <th scope="col">Celular</th>
            <th scope="col">E-mail</th>
            <th scope="col">Foto</th>
          </thead>
          <tbody>
            {{-- @foreach ($list as $cliente ) --}}
            <tr>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
                <td>1</td>
              {{-- <td>{{ $cliente->id }}</td>
              <td>{{ $cliente->name }}</td>
              <td>{{ $cliente->cpf }}</td>
              <td>{{ $cliente->birthdate }}</td>
              <td>{{ $cliente->phone }}</td>
              <td>{{ $cliente->mobile }}</td>
              <td>{{ $cliente->email }}</td>
              <td>{{ $cliente->photo }}</td> --}}
            </tr>
            {{-- @endforeach --}}
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        {{-- {{ $list->links() }} --}}
      </div>
    </div>
  </div>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

  <script type="text/javascript">

    function mountRow(data){
      // console.log(
      // '<tr>' + 
      //   '<td>'+ data.id + '</td>' +
      //   '<td>'+ data.name + '</td>' +
      //   '<td>'+ data.phone + '</td>' +
      //   '<td>'+ data.email + '</td>' +
      //   '</tr>');
      return '<tr><td>'+ data.name + '</td></tr>';
    }

    function getTable(data){
      $('#listAgenda>tbody>tr').remove();
      for(i=0; i<=data.data.length; i++){
        // console.log(data.data[i]);
        row = mountRow(data.data[i]);
      }
    }


    function listAll(numberPage){
      $.get('/json', {page: numberPage}, function(resp){
        console.log(resp);
        getTable(resp);
      });
    }
    
    $(function(){
      listAll(3);
    });
  </script>
</body>
</html>