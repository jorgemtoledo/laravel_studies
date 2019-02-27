<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/ola', function () {
    return "<h1>Olá!</h1>";
});

// Route::get('/nome/{nome}', function ($nome){
//     return "<h1>Olá  $nome </h1>";
// });

// Route::get('/repetir/{nome}/{n}', function ($nome, $n){
//   for($i=0;$i<$n;$i++){
//     echo "<p>{$nome} - {$i}<p>";    
//   }
// });

Route::get('/repetir/{nome}/{n}', function ($nome, $n){
  if(is_integer($n)){
    for($i=0;$i<$n;$i++){
      echo "<p>{$nome} - {$i}<p>";    
    }
  } else {
    echo "Vc nao digitou um numero";
  }  
});

// Validação para receber somente numeros no 'n'
Route::get('/nomecomregra/{nome}/{n}', function ($nome, $n){
  for($i=0;$i<$n;$i++){
    echo "<p>{$nome} - {$i}<p>";    
  }
})->where('n', '[0-9]+')->where('nome', '[A-Za-z]+');

Route::get('/nomecomregra/{nome?}', function ($nome=null){
  if(isset($nome)) {
    echo "Olá {$nome}";
  } else {
    echo "vc nao digitou nome";
  }
});


// Agrupamento de rodas
Route::prefix('app')->group(function(){
  Route::get('/', function(){
    return "Pagina principal do APP";
  });

  Route::get('profile', function(){
    return "Pagina profile";
  });

  Route::get('about', function(){
    return "Pagina about";
  });

});

// Redirecionamento das rotas
Route::redirect('/aqui', '/ola', 301);

Route::get('/hello', function(){
  return view('hello');
});

Route::view('hello', 'hello');

Route::view('/viewnome', 'hellonome', 
  ['nome' => 'Jorge', 'sobrenome' => 'Toledo']
);

Route::get('/hellonome/{nome}/{sobrenome}', function($nome, $sn){
  return view('hellonome',
  ['nome' => $nome, 'sobrenome' => $sn]);

  // Exemplo url: http://localhost:8000/hellonome/Maria/teste

});

// Http Routes
// Method GET 
Route::get('/rest/hello', function(){
  return "Hello (GET)";
});
// Url: http://localhost:8000/rest/hello

// Method POST
Route::post('/rest/hello', function(){
  return "Hello (POST)";
});

// No method post caso apareça o error "Sorry, your session has expired. Please refresh and try again. "
// Vai precisar fazer uma configuração no arquivo CSRF no arquivo app/http/middeware/verifyCsrfToken.php

// Method DELETE
Route::delete('/rest/hello', function(){
  return "Hello (DELETE)";
});

// Method PUT
Route::put('/rest/hello', function(){
  return "Hello (PUT)";
});

// Method PATCH
Route::patch('/rest/hello', function(){
  return "Hello (PATCH)";
});

// Method OPTIONS
Route::options('/rest/hello', function(){
  return "Hello (OPTIONS)";
});


// Method POST, enviando parametros via rest
Route::post('/rest/imprimir', function(Request $request){
  $nome = $request->input('nome');
  $idade = $request->input('idade');
  return "Hello $nome, $idade !";
});

// Agrupando methods em uma unica rota
Route::match(['get','post'], '/rest/hello2', function(){
  return "Hello World 2";
});

// Agrupando methods em uma unica rota e acessar qualquer method
Route::any('/rest/hello3', function(){
  return "Hello World 3";
});


// Renomeando <i class="fas fa-route-interstate    "></i>
Route::get('/produtos', function(){
  echo "<h1>Produtos</h1>";
  echo "<ol>";
  echo "<li>Notebook<li>";
  echo "<li>Monitor<li>";
  echo "<li>Mouse<li>";
  echo "</ol>";
})->name('meusprodutos');

Route::get('/linkprodutos', function(){
  $url = route('meusprodutos');
  echo "<a href=\"".$url."\">Meus produtos</a>";
});

// Redirecionar rotas 
Route::get('/redirecionarprodutos', function(){
  return redirect()->route('meusprodutos');
});