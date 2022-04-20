@extends('layout.template')
@section('title')
Editar cliente | SACLIENT
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar cliente
        <small></small>
    </section>



{!! Form::model($cliente, ['route'=>['clientes.update', $cliente->id], 'method'=>'PUT','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('cliente.forms.cliente')


{!! Form::close() !!}

@stop