<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
use App\Categoria;
use function GuzzleHttp\json_decode;
use function GuzzleHttp\json_encode;

class ControllerProduto extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexView()
    {
      $prods = Produto::all();
      return view('produtos.indexAjax', compact('prods'));

    }

    public function index()
    {
      $prods = Produto::all();
      return $prods->toJson();
    }

    public function indexPincipal()
    {
      // echo request()->segment(2);
      // dd(Request::segments());
      // $url_segment = \Request::segment(1);
      // echo $url_segment ;
      // echo url()->current();
      // echo url()->full();
      // echo url()->previous();
      // die();
      // if($url_segment == "produtos"){
      // $prods = Produto::all();
      // return view('produtos.index', compact('prods'));
      // } else {
      //   $prods = Produto::all();
      //   return view('produtos.indexAjax', compact('prods'));
      // }

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
      // $prod->nome = $request->input('nomeProduto');
      // $prod->estoque = $request->input('estoque');
      // $prod->preco = $request->input('preco');
      // $prod->categoria_id = $request->input('categoria');
      // $prod->save();
      // return redirect('/produtos');

      $prod->nome = $request->input('nome');
      $prod->estoque = $request->input('estoque');
      $prod->preco = $request->input('preco');
      $prod->categoria_id = $request->input('categoria_id');
      $prod->save();
      return Response::json($prod);
      // return json_decode($prod);
    }

    public function storeView(Request $request)
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
      $prod = Produto::find($id);
      if(isset($prod)){
        return json_encode($prod);
      }
      return response('Produto não encontrado!', 404);
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
      // if(isset($prod)){
      //   $prod = new Produto();
      //   $prod->nome = $request->input('nomeProduto');
      //   $prod->estoque = $request->input('estoque');
      //   $prod->preco = $request->input('preco');
      //   $prod->categoria_id = $request->input('categoria');
      //   $prod->save();
      // }
      // return redirect('/produtos');

      // Ajax
      if(isset($prod)){
        $prod->nome = $request->input('nome');
        $prod->estoque = $request->input('estoque');
        $prod->preco = $request->input('preco');
        $prod->categoria_id = $request->input('categoria_id');
        $prod->save();
        return json_encode($prod);
      }
      return response('Produto não encontrado!', 404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      // No ajax
      // $prod = Produto::find($id);
      // if(isset($prod)){
      //   $prod->delete();
      // }
      // return redirect('/produtos');

      // Ajax
      $prod = Produto::find($id);
      if(isset($prod)){
        $prod->delete();
        return response('OK', 200);
      }
      return response('Produto não deletado!', 404);
    }
}
