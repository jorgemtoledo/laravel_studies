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
        <h5 class="card-title">Lista de clientes {{ $clientes->count() }} de {{ $clientes->total() }}  ({{ $clientes->firstItem() }}  a {{ $clientes->lastitem() }} )</h5>
        <table class="table table-hover">
          <thead>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">Sobrenome</th>
            <th scope="col">E-mail</th>
          </thead>
          <tbody>
            @foreach ($clientes as $cliente )
            <tr>
              <td>{{ $cliente->id }}</td>
              <td>{{ $cliente->nome }}</td>
              <td>{{ $cliente->sobrenome }}</td>
              <td>{{ $cliente->email }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="card-footer">
        {{ $clientes->links() }}
      </div>
    </div>
  </div>


  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>  
</body>
</html>