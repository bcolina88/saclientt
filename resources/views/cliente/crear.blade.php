@extends('layout.template')
@section('title')
Crear cliente | SACLIENT
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear cliente</h1>
        <small></small>
    </section>



 {!! Form::open(['route'=>'clientes.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('cliente.forms.cliente') 

{!! Form::close() !!}

@stop