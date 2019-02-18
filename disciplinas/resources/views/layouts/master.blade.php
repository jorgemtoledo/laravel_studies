<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Disciplinas/Turma</title>
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
		<link href="/css/app.css" rel="stylesheet">
  </head>
  <body class="d-flex flex-column h-100">
    <header>
			<!-- Fixed navbar -->
			<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
				<a class="navbar-brand" href="/">Sistema Facul</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarCollapse">
					<ul class="navbar-nav mr-auto">
						@auth
						<form id="logout-form" action="/logout" method="POST"> 
							{{ csrf_field() }}
							<li class="nav-item">
								<button type="submit" class="btn btn-warning">Sair </button>
							</li>
						</form>
						@else
							<li class="nav-item">
								<a href="/login" class="btn btn-info">Login</a>
							</li>
							<li class="nav-item">
								<a href="/register" class="btn btn-warning">Register</a>
							</li>
						@endauth
					</ul>
					<form method="POST" action="/disciplinas/search" class="form-inline mt-2 mt-md-0">
						{{ csrf_field() }}
						<input class="form-control mr-sm-2" type="text" name="text"  placeholder="Busca" aria-label="Search">
						<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
					</form>
				</div>
			</nav>
		</header>
		<!-- Begin page content -->
		<main role="main" class="flex-shrink-0">
			<div class="container">
				@section('content')
				@show
			</div>
		</main>
		<footer class="footer mt-auto py-3">
			<div class="container">
				<span class="text-muted">Place sticky footer content here.</span>
			</div>
		</footer>
		<script src="/js/app.js"></script>
	</body>
</html>
