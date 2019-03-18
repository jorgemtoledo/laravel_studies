<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <title>Cadastro de Produtos</title>
  <style>
    body{
      padding: 20px;
    }
    .navbar {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>
  <div class="container">
    @component('components.component_navbar', ["current" => $current])
    @endcomponent
    <main role="main">
      @hasSection('body')
        @yield('body')
      @endif
    </main>

  </div>
  <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
  @hasSection('javascript')
    @yeld('javascript')
  @endif

</body>
</html>