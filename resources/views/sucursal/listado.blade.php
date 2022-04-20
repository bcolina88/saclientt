@extends('layout.template')
@section('title')
Listado de sucursales | SACLIENT
@endsection
@section('content')

  <section class="content-header">
      <h1>
        Listado de sucursales
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

            {!!Form::open(['route'=>'sucursales.index', 'method'=>'GET'])!!}
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
                    @forelse ($sucursales as $key => $sucursal)
                  <tr>

                  
                    <td>{{$sucursal->codigo}} </td>
                    <td>{{$sucursal->descripcion}} </td>
                    <td>{{$sucursal->rif}} </td>
                    <td>{{$sucursal->direccion}} </td>
                    <td>{{$sucursal->email}}</td>
                    <td>{{$sucursal->telefono}}</td>
     
                     
                     <td>
                    
                      <div class="btn-group">
          
                          {!! Form::model($sucursal, ['route'=>['sucursales.update', $sucursal->id], 'method'=>'DELETE']) !!}


                          <a href="{{route("sucursales.edit", ['sucursale' => $sucursal->id])}}" onclick="return confirm('Seguro que Desea Editar sucursal {{$sucursal->descripcion}}')" class="btn btn-default btn-warning fa fa-pencil"><b></b></a> 
            

                          <button type='submit' class="btn btn-default btn-danger fa fa-trash" onclick="return confirm('Seguro que Desea eliminar sucursal {{$sucursal->descripcion}}')" ></i></button>
                          
  

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

     
                <a href="{{route('sucursales.create')}}" class="btn btn-default btn-warning btn-flat pull-left"><b>Nuevo sucursal</b></a> 
  

              <ul class="pagination pagination-sm no-margin pull-right">
                {{ $sucursales->links() }}
              </ul>

            </div>

            <!-- /.box-footer -->
          </div>
          <!-- /.box -->

  </section>


@stop