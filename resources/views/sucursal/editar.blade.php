@extends('layout.template')
@section('title')
Editar sucursal | SACLIENT
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar sucursal
        <small></small>
    </section>


{!! Form::model($sucursal, ['route'=>['sucursales.update', $sucursal->id], 'method'=>'PUT','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('sucursal.forms.sucursal')


{!! Form::close() !!}

@stop