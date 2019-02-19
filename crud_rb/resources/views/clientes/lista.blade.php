@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Clientes <a class="pull-right" href="/clientes/novo">Novo Cliente</a> </div>

          <div class="card-body">
            @if(Session::has('mensagem_sucesso'))
              <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }} </div>
            @endif
            <table class='table table-striped'>
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>Endereço</th>
                  <th>Numero</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $cliente)
                <tr>
                  <td>{{ $cliente->nome }}</td>
                  <td>{{ $cliente->enereco }}</td>
                  <td>{{ $cliente->numero }}</td>
                  <td>
                    <a href="clientes/{{ $cliente->id }}/editar" class="btn btn-secondary btn-sm">Editar</a>                    
                    {!! Form::open(['method' => 'DELETE', 'url' => '/clientes/'.$cliente->id, 'style' => 'display: inline;']) !!}
                      <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    {!! Form::close() !!}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</div>
@endsection
