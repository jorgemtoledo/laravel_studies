@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cadastrar cliente <a class="pull-right" href="/clientes">Listar</a> </div>

                <div class="card-body">

                @if(Session::has('mensagem_sucesso'))
                  <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }} </div>
                @endif

                @if(Request::is('*/editar'))
                  <!-- {{ 'editando' }} -->
                  {!! Form::model($cliente, ['method' => 'PATCH', 'url' => 'clientes/'.$cliente->id]) !!}
                @else 
                <!-- {{ 'cadastrar' }} -->
                {!! Form::open(['url'=>'clientes/salvar']) !!}
                @endif
                <!-- Open form laravel collective -->
                <!-- {!! Form::open(['url'=>'clientes/salvar']) !!} -->

                {!! Form::label('nome', 'Nome') !!}
                {!! Form::input('text', 'nome', null, ['class' => 'form-control', 'autofocs', 'placeholder' => 'Nome']) !!}

                {!! Form::label('enereco', 'Endereço') !!}
                {!! Form::input('text', 'enereco', null, ['class' => 'form-control', '', 'placeholder' => 'Endereço']) !!}
                
                {!! Form::label('numero', 'Numero') !!}
                {!! Form::input('text', 'numero', null, ['class' => 'form-control', '', 'placeholder' => 'Numero']) !!}

                {!! Form::submit('Salvar', ['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
