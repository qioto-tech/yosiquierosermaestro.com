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
                    <h2><a href="#">Pago realizado</a></h2>
                      <?php
                      
                      
                    $personalidada=utf8_encode("A trav�s del mejoramiento y b�squeda de la calidad y excelencia en el dise�o de programas de capacitaci�n, ponemos a disposici�n de la comunidad docente tem�ticas de capacitaci�n, alternativas alineadas con las necesidades que busca el Ministerio de Educaci�n.");
                    $personalidad=utf8_encode("En esta ocasi�n se han realizado la investigaci�n de las diferentes pruebas psicom�tricas certificadas a nivel internacional que miden el nivel de personalidad que busca el Ministerio de Educaci�n y se han compilado en un sistema de capacitaci�n que simula un ambiente real de las pruebas que se tomar�an por el Ineval y el MinEduc");
                    $personalidad2=utf8_encode("Para poder acceder a esta plataforma se debe comprar el acceso al sistema que permitir� realizar un intento a la prueba psicom�trica por cada pago");
                    
                    $personalidad4=utf8_encode("Mientras m�s te capacites m�s preparado estar�s para las pruebas de personalidad y razonamiento y as� obtener tu elegibilidad.");
                    $personalidadfin=utf8_encode("Empieza a capacitarte ahora, ingresa tus datos para ingresar al simulador. Aceptamos tarjetas Visa y Mastercard de cr�dito y d�bito, recuerda que para poder realizar la transacci�n tu tarjeta deber� estar habilitada para realizar compras electr�nicas.");
                     
                    $personalidadven=utf8_encode("Nuestros cursos y pruebas de capacitaci�n se adaptan a tu tiempo y espacio, puedes acceder en el horario que se ajuste mejor a ti y desde el lugar que te encuentres. ");
                    $personalidadBAN=utf8_encode("Simulador de ex�men: Contamos con bancos de preguntas para repasar antes de presentar el examen. Se provee feedback sobre las preguntas, ayud�ndote a mejorar y reforzar tus conocimientos. ");
                    $personalidadesp=utf8_encode("Sigue los tips y recomendaciones para facilitarte el entrenamiento");
                    ?>
					<p>
			          <table class="table table-bordered  table-hover">
			            <thead>
			              <tr>
			                <th>#</th>
			                <th>Descripcion</th>
			              </tr>
			            </thead>
			            <tbody>
                    
                    @foreach($datos as $dato)
		              <tr> 
		              	<td>Cedula</td> 
		                <td>{{ $dato->customer_ci }}</td>
		              </tr>
		              <tr>
		                <td>Nombre</td>
		                <td>{{ $dato->customer_name }}</td>
		              </tr>
		              <tr> 
		              	<td>Apellido</td> 
		              	<td>{{ $dato->customer_lastname }}</td>
		              </tr>
		              <tr> 
		              	<td>Curso</td> 
		                <td>{{ $dato->product_description }}</td>
		              </tr>
		              <tr> 
		              	<td>Email</td> 
		                <td>{{ $dato->customer_email }}</td>
		              </tr>		              
		              <tr> 
		              	<td>Usuario</td> 
		                <td><span style="color: red">{{ $usuario }}</span></td>
		              </tr>
		              <tr> 
		              	<td>Password</td> 
		                <td><span style="color: red">{{ $password }}</span></td>
		              </tr>
                    
                    
                    @endforeach	 
                    
            </tbody>
          </table>
                    
                   </p> 
                    
                    <p>{!!$personalidada!!}</p>
                    <p>{!!$personalidad!!}</p>
                    <div><img style="visibility: visible; width: 90%;" src="{{ URL::asset('images/plataforma.png') }}" alt=""></div>
                    <p>{!!$personalidad2!!}</p>
                    <div><img style="visibility: visible; width: 200px;" src="{{ URL::asset('images/5usd.png') }}" alt=""></div>
                    <p>{!!$personalidadesp!!}</p>
                    <div><img style="visibility: visible; width: 10%;" src="{{ URL::asset('images/247.png') }}" alt=""></div>
                    <p>{!!$personalidadven!!}</p>
                    <div><img style="visibility: visible; width: 10%;" src="{{ URL::asset('images/computadora.png') }}" alt=""></div>
                    <p>{!!$personalidadBAN!!}</p>
                    
                    
                    
                    <p>{!!$personalidad4!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/"></a></p>
                    <div><img style="visibility: visible; width: 70%;" src="{{ URL::asset('images/visa.png') }}" alt=""></div>
                    <p>{!!$personalidadfin!!} <a target="_blank" href="https://educacion.gob.ec/quiero-ser-maestro-6/"></a></p>
                    
                  </div>
                </div>
              </div>
            </div>
<br><br>
@endsection

@section('content')

	<script>



    $(".imagens").attr("src","{{ URL::asset('images/capacitate.jpg') }}");

</script>
@endsection

