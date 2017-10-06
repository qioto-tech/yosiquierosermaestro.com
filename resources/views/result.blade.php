@extends('layouts.template')

@section('title', 'Inscripto')

@section('script')

@endsection



@section('info')
              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="{{ URL::asset('images/capacitate.jpg') }}" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Ingreso al simulador</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Sep <strong>1</strong></span>
                    <h2><a href="#">Resultado de las pruebas</a></h2>
                    <p>
						{!! Form::open([null, null, 'class'=>'form-horizontal', 'role'=>'form','name'=>'frmvalidate','id'=>'frmvalidate']) !!}
						  <div class="form-group">
						  	<label class="control-label col-sm-2" for="name">Usuario</label>
						  	<div class="col-sm-8">
						    	{!!	Form::text('usuario',null,['class'=>'form-control', 'placeholder'=>'Introduce el numero el usuario','size'=>'40', 'id'=>'usuario', 'name'=>'usuario']) !!}       
						  	</div>
						  </div>	
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="name">Contrase&ntilde;a</label>
						    <div class="col-sm-8">
						    	{!!	Form::password('password',['class'=>'form-control', 'id'=>'password', 'name'=>'password']) !!}       
						  	</div>
						  </div>
						  <div class="form-group">
						    <label class="control-label col-sm-2" for="name">Sexo</label>
						    <div class="col-sm-8">
						    	{!!	Form::select('sexo',['1' => 'Hombre', '2' => 'Mujer'],null,['class'=>'form-control', 'placeholder'=>'Selecciona tu sexo', 'id'=>'sexo', 'name'=>'sexo']) !!}       
						  	</div>
						  </div>
						  <div class="form-group">
    						<div class="col-sm-offset-2 col-sm-8">						  
						  		<button type="button" class="btn btn-default" id="btn-validate">Ver resultados</button>
							</div>
  						  </div>
						{!! Form::close() !!}
                    
                    </p>
					<p>
					<div class="panel panel-default" id="resultado-test">
    					<div class="panel-heading">Resultado</div>
    					<div class="panel-body" id="content-body">
	          			</div>
  					</div>
					</p>	
                  </div>
                </div>
              </div>
            </div>
<br><br>

@endsection

@section('content')

	<script>





</script>
@endsection