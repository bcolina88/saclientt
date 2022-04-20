<section class="content">
<div class="row">
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-success">
                <div class="box-header">
                  <section class="content-header">
      <h1>
        Información personal <br>
    </section>
                  <hr>
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
                      <label for="exampleInputPassword1">Correo Electronico</label> <span style="color: #E6674A;">*</span>
                      

                      {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com','required']) !!}


                    </div> 



                 
                    <div class="col-md-4">
                      <br>
                      <label for="exampleInputPassword1">Contraseña</label> <span style="color: #E6674A;">*</span>
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                    </div>



                    <div class="col-md-4">
                            <br>
                            <label for="exampleInputPassword1">Sucursales</label> 
    
                             

                               {!! Form::select('sucursal_id',$sucursales , null, ['class' => 'form-control', 'required']) !!}
                              
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

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@section('javascript')
<script>

  alert();

  console.log('test');

   $("#sucursal").val(4).trigger('change');


    
</script>
@endsection