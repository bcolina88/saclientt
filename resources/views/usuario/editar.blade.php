@extends('layout.template')
@section('title')
Editar Usuario | SACLIENT
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Editar Usuario
        <small></small>
    </section>



{!! Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'PUT','enctype'=>'multipart/form-data','files'=>'true','accept-charset'=>'UTF-8']) !!}


@include('usuario.forms.user')


{!! Form::close() !!}

@stop