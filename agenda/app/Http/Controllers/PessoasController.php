<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pessoa;
use App\Telefone;
use Illuminate\Support\Facades\Validator;

class PessoasController extends Controller
{
  private $telefones_controller;
  private $pessoa;
  private $listar_telefone;

  public function __construct(TelefonesController $telefones_controller)
  {
    $this->telefones_controller = $telefones_controller;
    $this->pessoa = new Pessoa();
    $this->listar_telefone = new Telefone();
  }

  public function index($letra){
    $list_pessoas = Pessoa::indexLetra($letra);
    return view('pessoas.index', ['pessoas' => $list_pessoas, 'criterio' => $letra]);
  }

  public function busca(Request $request){
    if($request->criterio == NULL){
      $criterio = "Favor digitar um nome!";
      $pessoas = Pessoa::busca('*&');
      return view('pessoas.index', [
        'pessoas' => $pessoas,
        'criterio' => $criterio
        ]
      );
    } else {    
      $pessoas = Pessoa::busca($request->criterio);
      return view('pessoas.index', [
        'pessoas' => $pessoas,
        'criterio' => $request->criterio
        ]
      );
    }
  }

  public function novoView(){
    return view('pessoas.create');
  }

  public function store(Request $request){
    // Iniciando a validação
    $validacao = $this->validacao($request->all());
    if($validacao->fails()){
      return redirect()->back()
      ->withErrors($validacao->errors())
      ->withInput($request->all());
    }

    if ($request->id){
      $telefone = new Telefone();
      $telefone->ddd = $request->ddd;
      $telefone->telefone = $request->telefone;
      $telefone->pessoa_id = $request->id;
      $this->telefones_controller->store($telefone);
      return redirect("/pessoas/{$request->id}/addTelefone")->with("message", "Telefone adicionado com sucesso!");
    } else {
      $pessoa = Pessoa::create($request->all());
      if ($request->ddd && $request->telefone) {
        $telefone = new Telefone();
        $telefone->ddd = $request->ddd;
        $telefone->telefone = $request->telefone;
        $telefone->pessoa_id = $pessoa->id;
        $this->telefones_controller->store($telefone);
      }
      return redirect("/pessoas")->with("message", "Pessoa criada com sucesso!");
    }
  }

  public function editarView($id){
    return view('pessoas.edit', ['pessoa' => $this->getPessoa($id)]); 
  }

  public function destroy($id){
    $this->getPessoa($id)->delete();
    return redirect(url('/pessoas'))->with('success', 'Excluído!');
  }

  public function update(Request $request){
    // Iniciando a validação
    $validacao = $this->validacao($request->all());
    if($validacao->fails()){
      return redirect()->back()
      ->withErrors($validacao->errors())
      ->withInput($request->all());
    }

    $pessoa = $this->getPessoa($request->id);
    $pessoa->update($request->all());
    return redirect("/pessoas")->with("message", "Pessoa editado com sucesso!");
  }

  public function excluirView($id){
    return view('pessoas.delete', ['pessoa' => $this->getPessoa($id)]); 
  }

  public function addTelefoneView($id){
    return view('pessoas.telefone', ['pessoa' => $this->getPessoa($id)]); 
  }

  public function editTelefoneView($id_telefone, $id){
    return view('pessoas.telefone', ['pessoa' => $this->getPessoa($id), 'telefone' => $this->getTelefone($id_telefone)]); 
  }

  public function getPessoa($id){
    return $this->pessoa->find($id);
  }

  public function getTelefone($id_telefone){
    return $this->listar_telefone->find($id_telefone);
  }

  public function updateTelefone(Request $request){
     // Iniciando a validação
     $validacao = $this->validacao($request->all());
     if($validacao->fails()){
       return redirect()->back()
       ->withErrors($validacao->errors())
       ->withInput($request->all());
     }

    $telefone = $this->listar_telefone->find($request->id_telefone);
    $telefone->ddd = $request->ddd;
    $telefone->telefone = $request->telefone;
    $telefone->pessoa_id = $request->id;
    $telefone->save();
    return redirect("/pessoas/{$request->id_telefone}/{$request->id}/editTelefone")->with("message", "Telefone adicionado com sucesso!");
  }

  public function excluirTelefone($id){
    $telefone = $this->listar_telefone->find($id);
    $telefone->delete();
    return redirect(url('/pessoas'))->with('success', 'Excluído!');
  }

  private function validacao($data){

    if (array_key_exists('ddd', $data) && array_key_exists('telefone', $data)) {
      if ($data['ddd'] || $data['telefone']) {
          $regras['ddd'] = 'required|size:2';
          $regras['telefone'] = 'required';
      }
    }
    $regras['nome'] = 'required|min:3';
    $mensagens = [
      'nome.required' => 'Campo nome é obrigatório',
      'nome.min' => 'O campo nome deve ter ao menos 3 letras!',
      'ddd.required' => 'O campo DDD é obrigatório',
      'ddd.size' => 'O campo DDD deve ter 2 digitos',
      'ddd.numeric' => 'Somente números!',
      'telefone.required' => 'O campo telefone é obrigatório',
      'telefone.numeric' => 'Somente numeros e sem espaço!',
    ];
    return Validator::make($data, $regras, $mensagens);
  }

}
