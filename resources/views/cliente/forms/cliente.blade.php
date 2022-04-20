<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  

                       <div class="row">
<div class="col-md-9">
  @if ($errors->any())
    <ul>
    <div class="alert alert-warning">
  <b>Corrige Los Siguientes Errores:</b>
  @foreach ($errors->all() as $error)
  <li>
  {{$error}}
</li>
@endforeach
</div>
</ul>

@endif
</div>
</div>
                </div><!-- /.box-header -->
                <!-- form start -->               
                <form role="form">
                  <div class="box-body">
                    <div class="col-md-12">
                    <div class="form-group">
                      
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Nombre</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>

                 
                

                     <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Código</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código', 'required']) !!}
                    </div>

                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Descripción</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción', 'required']) !!}
                    </div>

                     <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Rif</label> <span style="color: #E6674A;">*</span>
                 
                     {!! Form::text('rif', null, ['class' => 'form-control', 'placeholder' => 'Rif', 'required']) !!}
                    </div>


                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Correo Electronico</label> <span style="color: #E6674A;">*</span>
                      

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}


                    </div> 



                    <div class="col-md-4">
                    <br>
                        <label for="exampleInputPassword1">Telefono</label> 
                        {!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '(000)-000-0000', 'data-inputmask'=>'"mask": "(999) 999-9999"','data-mask']) !!}

                  
                    </div> 





                     <div class="col-md-12">
                       <br>
                      <label for="exampleInputPassword1">Dirección</label>
                  
                       {!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Dirección']) !!}
                    </div>

                

              

                  </div><!-- /.box-body --> 
                  </div><!-- /.box-body -->
                  </div><!-- /.box-body -->

                  <input type="hidden" name="tipo" id="tipo" value="{{$tipo}}">

                
                  <div class="box-footer">


                   <button type="submit" class="btn btn-primary">Guardar</button>
                  </div>
                  </div>
              </form>
              </div><!-- /.box -->
          </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('javascript')

<script>

  $('[data-mask]').inputmask()
  
  
  $('.select2').select2();

</script>
@endsection
