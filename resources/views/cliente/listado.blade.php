@extends('layout.template')
@section('title')
Listado de clientes | SACLIENT
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de clientes
        <small></small>
    </section>


    <!-- Main content -->
  <section class="content">

            <!-- TABLE: LATEST ORDERS -->
          <div class="box box-success">
            <div class="box-header with-border">

            <br>
            @if (Session::has('message'))
             <p class="alert alert-info"><b>{{ Session::get('message')}}</b></p>
            @endif

            {!!Form::open(['route'=>'clientes.index', 'method'=>'GET'])!!}
            <div class="input-group">

                      <input type="text" name="search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Buscar..."/>
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>

            </div>
            {!!Form::close()!!}
 
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin table-striped  table-hover">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                     <th>Código</th>
                    <th>Descripción</th>
                    <th>Rif</th>
                    <th>Dirección</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    @forelse ($clientes as $key => $cliente)
                  <tr>

                  
                    <td>{{$cliente->nombre}} </td>
                    <td>{{$cliente->codigo}} </td>
                    <td>{{$cliente->descripcion}} </td>
                    <td>{{$cliente->rif}} </td>
                    <td>{{$cliente->direccion}} </td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->telefono}}</td>
     
                     
                     <td>
                    
                      <div class="btn-group">
          
                          {!! Form::model($cliente, ['route'=>['clientes.update', $cliente->id], 'method'=>'DELETE']) !!}


                          <a href="{{route("clientes.edit", ['cliente' => $cliente->id])}}" onclick="return confirm('Seguro que Desea Editar a {{$cliente->nombre}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
            

                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar a {{$cliente->nombre}}')" ></i></button>
                          
  

                          {!! Form::close() !!}

                      </div>
                                    
                      </td>
                     
                  </tr>
                     @empty

                  No hay Datos que Motrar.
                    @endforelse


                  </tbody>

                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">

     
                <a href="{{route('clientes.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo cliente</b></a> 
  

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $clientes->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop