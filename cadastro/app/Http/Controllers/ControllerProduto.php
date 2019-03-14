<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;

class ControllerProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $prods = Produto::all();
      return view('produtos.index', compact('prods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $cats = Categoria::all();
      return view('produtos.novoproduto', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $prod = new Produto();
      $prod->nome = $request->input('nomeProduto');
      $prod->estoque = $request->input('estoque');
      $prod->preco = $request->input('preco');
      $prod->categoria_id = $request->input('categoria');
      $prod->save();
      return redirect('/produtos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $prod = Produto::find($id);
      $cats = Categoria::all();
      if(isset($prod)){
        return view('/produtos/editarproduto', compact('prod','cats'));
      }
      return redirect('/produtos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $prod = Produto::find($id);
      if(isset($prod)){
        $prod = new Produto();
        $prod->nome = $request->input('nomeProduto');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria');
        $prod->save();
      }
      return redirect('/produtos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $prod = Produto::find($id);
      if(isset($prod)){
        $prod->delete();
      }
      return redirect('/produtos');
    }
}
