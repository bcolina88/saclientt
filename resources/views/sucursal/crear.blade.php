@extends('layout.template')
@section('title')
Crear sucursal | SACLIENT
@endsection


@section('content')
  <section class="content-header">
      <h1>
        Crear sucursal</h1>
        <small></small>
    </section>



 {!! Form::open(['route'=>'sucursales.store','enctype'=>'multipart/form-data','method'=>'POST','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('sucursal.forms.sucursal') 

{!! Form::close() !!}

@stop