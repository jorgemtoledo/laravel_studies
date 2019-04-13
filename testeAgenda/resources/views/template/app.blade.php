<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Teste Agenda!</title>

    <style>
      .jumbotron {
        position:relative;
        overflow:hidden;
        color: white;
      }

      .jumbotron .container {
        position:relative;
        z-index:2;
        
        background:rgba(0,0,0,0.2);
        padding:2rem;
        border:1px solid rgba(0,0,0,0.1);
        border-radius:3px;
      }

      .jumbotron-background {
        object-fit:cover;
        font-family: 'object-fit: cover;';
        position:absolute;
        top:0;
        z-index:1;
        width:100%;
        height:100%;
        opacity:0.5;
      }

      img.blur {
        -webkit-filter: blur(4px);
        filter: blur(4px);
        filter:progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
      }
    </style>
  </head>
  <body>
    <!--Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="/">Teste Agenda</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ações</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{ url('/') }}">Listar</a>
              <a class="dropdown-item" href="{{ url('/contacts/create') }}">Cadastrar</a>
            </div>
          </li>
        </ul>
      </div>
    </nav><!-- /.nav -->
    <!-- Main -->
    <main role="main">
      <div class="jumbotron">
        <div class="container">
          <h2 class="display-3">Sistema de Agenda</h2>
          <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem ab vitae adipisci voluptate cumque facilis odio nihil placeat sed fuga, laudantium provident praesentium maiores assumenda doloribus totam tempore numquam! Sit?</p>
        </div>

        <div class="jumbotron-background">
            <img src="https://images.projuris.com.br/wp-content/uploads/2017/10/agenda-para-software-jur%C3%ADdico-como-integrar.jpg" class="blur ">
          </div>
      </div>
      <!-- Container -->      
      <div class="container">
        <!-- Conteudo das outras paginas -->
        @yield('content')
      </div> <!-- /container -->      
    </main>
      
    <footer class="container">
      <p class="text-center">&copy; Agenda 2019</p>
    </footer> 
    
    <!-- JavaScript -->
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>     
  </body>
</html>