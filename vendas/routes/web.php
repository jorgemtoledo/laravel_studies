<?php
use Illuminate\Support\Facades\DB;

// Model categoria
use App\Categoria;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/categorias', function(){
    $cats = DB::table('categorias')->get();
    foreach($cats as $cat){
        echo "ID: " . $cat->id . ": ";
        echo "Nome: " . $cat->nome . "<br>";
    }

    echo "<hr>";

    $nomes = DB::table('categorias')->pluck('nome');
    foreach($nomes as $nome){
        echo "$nome  <br>";
    }

    echo "<hr>";

    $cats_2 = DB::table('categorias')->where('id',1)->get();
    print_r($cats_2[0]->nome);

    $cats_3 = DB::table('categorias')->where('id',1)->first();
    print_r($cats_3->nome);



    echo "<p>Retorna um array utilizando like</p>";
    $cats_like = DB::table('categorias')->where('nome','like','p%')->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . ";<br>";
      echo "Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Setenças logicas</p>";
    $cats_like = DB::table('categorias')->where('id',1)->orWhere('id',2)->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Intervalos</p>";
    $cats_like = DB::table('categorias')->whereBetween('id',[1,2])->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Não estão no intervalos</p>";
    $cats_like = DB::table('categorias')->whereNotBetween('id',[1,2])->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Conjuntos</p>";
    $cats_like = DB::table('categorias')->whereIn('id',[1,2,4])->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Não no Conjuntos</p>";
    $cats_like = DB::table('categorias')->whereNotIn('id',[1,2,4])->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Sentenças </p>";
    $cats_like = DB::table('categorias')->where([
      ['id',1],
      ['nome', 'Roupas']
    ])->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Ordenar por nome </p>";
    $cats_like = DB::table('categorias')->orderBy('nome')->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

    echo "<p>Ordenar por nome (desc) </p>";
    $cats_like = DB::table('categorias')->orderBy('nome', 'desc')->get();
    foreach($cats_like as $like){
      echo "id: ". $like->id . "; ";
      echo " Nome: ". $like->nome . ";<br>";
    }

});

Route::get('/novacategorias', function(){
  DB::table('categorias')->insert([
    ['nome'=>'Cama mesa e banho'],
    ['nome'=>'Informatica'],
    ['nome'=>'Cozinha']
  ]);
});

Route::get('/novacategoriasgetid', function(){
  $id = DB::table('categorias')->insertGetId(
    ['nome'=>'Carros']
  );
  echo "Get o novo ID = $id <br>";
});

Route::get('/atualizandocategorias', function(){
  $cats_3 = DB::table('categorias')->where('id',1)->first();
  echo "<p>Antea da atualização</p>";
  echo "id: " .$cats_3->id . "; ";
  echo "nome : " .$cats_3->nome . "<br>";

  // Atualizando
  DB::table('categorias')->where('id',1)->update(['nome'=>'Roupas infantis']);
  $cats_3 = DB::table('categorias')->where('id',1)->first();
  echo "<p>Depois da atualização</p>";
  echo "id: " .$cats_3->id . "; ";
  echo "nome : " .$cats_3->nome . "<br>";
});

// Inserir categoria via rota
Route::get('categorias/inserir/{nome}', function($nome){
  $cat = new Categoria();
  $cat->nome = $nome;
  $cat->save();
  return redirect('/categorias');
});

// Listar categoria pelo id
Route::get('categorias/{id}', function($id){
  $cat = Categoria::findOrFail($id);
  if(isset($cat)){
    echo "id: " .$cat->id . "; ";
    echo "nome : " .$cat->nome . "<br>";
  } else {
    echo "Categoria não existe!";
  }
});

// Atualizar categoria
Route::get('categorias/atualizar/{id}/{nome}', function($id, $nome){
  $cat = Categoria::find($id);
  if(isset($cat)){
    $cat->nome = $nome;
    $cat->save();
    return redirect('/categorias');
  } else {
    echo "Categoria não existe!";
  }
});

// Deletar categoria
Route::get('categorias/deletar/{id}', function($id){
  $cat = Categoria::find($id);
  if(isset($cat)){
    $cat->delete();
    return redirect('/categorias');
  } else {
    echo "Categoria não existe!";
  }
});

// Categoria por nome
Route::get('categorias/categoriapornome/{nome}', function($nome){
  $categorias = Categoria::where('nome', $nome)->get();
  foreach($categorias as $cat){
    echo "Id: " . $cat->id . ", ";
    echo "Nome: " . $cat->nome . "<br>";
  }
});

// Categoria por id maior que
Route::get('categorias/categoriadmaiorque/{id}', function($id){
  $categorias = Categoria::where('id', '>=', $id)->get();
  foreach($categorias as $cat){
    echo "Id: " . $cat->id . ", ";
    echo "Nome: " . $cat->nome . "<br>";
  }
  $count = Categoria::where('id', '>=', $id)->count();
  echo "<h1>Count: $count </h1>";

  $max = Categoria::where('id', '>=', $id)->max('id');
  echo "<h1>Count: $max </h1>";
});

// Categoria por lista de ids
Route::get('categorias/ids/ids123', function(){
  $categorias = Categoria::find([1,2,3]);
  foreach($categorias as $cat){
    echo "Id: " . $cat->id . ", ";
    echo "Nome: " . $cat->nome . "<br>";
  }
});

// Lista todos os itens e tb apagados/desativado com soft deletes
Route::get('/categorias/todas/all', function(){
  $categorias = Categoria::withTrashed()->get();
  foreach($categorias as $cat){
    echo "Id: " . $cat->id . ", ";
    echo "Nome: " . $cat->nome;
    if($cat->trashed())
    {
      echo '(Apagado/Desativado) <br>';
    } else {
      echo '<br>';
    }
  }
});

// Lista somente os apagados/desativado com soft deletes
Route::get('/categorias/todas/apagados', function(){
  $categorias = Categoria::onlyTrashed()->get();
  foreach($categorias as $cat){
    echo "Id: " . $cat->id . ", ";
    echo "Nome: " . $cat->nome;
    if($cat->trashed())
    {
      echo '(Apagado/Desativado) <br>';
    } else {
      echo '<br>';
    }
  }
});

// Restaurando itens apagados com softdeletes
Route::get('/categorias/todas/restaura/{id}', function($id){
  $cat = Categoria::withTrashed()->find($id);
  if(isset($cat)) {
    $cat->restore();
    echo "Categoria Restaurada: " . $cat->id . "<br>";
    echo "<a href=\"/categorias\">Listar todas</a>";
  } else {
    echo "Categoria não existe.";
  }  
});

// Apagando permante os itens com softdeletes
Route::get('/categorias/todas/apagarpermanente/{id}', function($id){
  $cat = Categoria::withTrashed()->find($id);
  if(isset($cat)) {
    $cat->forceDelete();
    return redirect('/categorias');
  } else {
    echo "Categoria não existe.";
  }  
});
