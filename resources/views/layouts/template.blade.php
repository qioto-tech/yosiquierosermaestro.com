<!DOCTYPE html>
<html>
<head>
<title>Quiero ser maestro  &mdash;  @yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/font.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/animate.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets/css/structure.css') }}">
<!--[if lt IE 9]>
<script src="{{ URL::asset('assets/js/html5shiv.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/respond.min.js') }}"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<header id="header">
  <div class="container">
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          <a class="navbar-brand" href="index.html"><span>Quiero</span> <span style="color:#1b82cd">Ser</span> <span style="color:#d9534f">Maestro</span> 6</a> </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav custom_nav">
            <li class=""><a href="index.html">Noticias</a></li>
            <li class=""> <a href="{{ URL::asset('/idoneo') }}">Consulta Idoneidad</a>
            </li>
            <li class=""> <a href="{{ URL::asset('/elegible') }}">Consulta Elegibilidad</a>
            </li>
            <li><a href="{{ URL::asset('/order') }}">Capacitacion</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <form id="searchForm" method="POST" action="/search/search">
      {{ csrf_field() }}
      <input type="text" placeholder="Buscar por cedula...">
      <input type="submit" value="">
    </form>
  </div>
</header>
<section id="contentbody">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="leftbar_content">
            
          
              @yield('info')
              
               @yield('content')
              
<!--               <div class="single_stuff wow fadeInDown"> -->
              
<!--               <div class="single_stuff_article"> -->
<!--                 <div class="single_sarticle_inner">  -->
<!--                   <div class="stuff_article_inner"> -->
<!--                      <h2></h2> -->
						
<!-- 						<p></p> -->

<!-- 							<div class="col-md-10" id="result-elegible"> -->
<!-- 							@yield('grid-content') -->
<!-- 							</div> -->
			               
                    
                                 
                    
<!--                   </div> -->
<!--                 </div> -->
<!--               </div> -->
<!--             </div> -->
          
        
         
            
          
          
           <!-- <div class="stuffpost_paginatinonarea wow slideInLeft">
              <ul class="newstuff_pagnav">
                <li><a class="active_page" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </div>-->
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2 col-lg-2">
        <div class="row">
          <div class="middlebar_content">
            <h2 class="yellow_bg">Vinculos importantes</h2>
            <div class="middlebar_content_inner wow fadeInUp">
              <ul class="middlebar_nav">
                <li> <a class="mbar_thubnail" target="_blank" href="http://www.yosiquierosermaestro.com/tips"><img src="{{ URL::asset('images/Tips.jpg') }}" alt=""></a> <a class="mbar_title" target="_blank" href="http://www.yosiquierosermaestro.com/teacher">Tips para aprobar las pruebas de idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" target="_blank"  href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf"><img src="{{ URL::asset('images/cronograma.png') }}" alt=""></a> <a class="mbar_title" target="_blank" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf">Cronograma QSM6</a> </li>
                <li> <a class="mbar_thubnail" target="_blank" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf"><img src="{{ URL::asset('images/Lista.png') }}" alt=""></a> <a class="mbar_title"  target="_blank" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf">Acuerdo Ministerial QSM6</a> </li>
                <li> <a class="mbar_thubnail" target="_blank" href="http://www.yosiquierosermaestro.com/teacher"><img src="{{ URL::asset('images/archivo.png') }}" alt=""></a> <a class="mbar_title" target="_blank" href="http://www.yosiquierosermaestro.com/teacher">Verifica tu idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" target="_blank" href="http://www.yosiquierosermaestro.com/teacher"><img src="{{ URL::asset('images/visto.png') }}" alt=""></a> <a class="mbar_title" target="_blank" href="http://www.yosiquierosermaestro.com/teacher">Verifica si eres elegible QSM6</a> </li>
                <li> <a class="mbar_thubnail" target="_blank" href="www.educacion.gob.ec"><img src="{{ URL::asset('images/indice.png') }}" alt=""></a> <a class="mbar_title"  target="_blank" href="www.educacion.gob.ec">Ministerio de Educacion</a> </li>
                
                
                
              </ul>
            </div>
            <!-- <div class="popular_categori  wow fadeInUp">
              <h2 class="limeblue_bg">Categorias</h2>
              <ul class="poplr_catgnva">
                <li><a href="#">QSM</a></li>
                <li><a href="#">QSD</a></li>
                <li><a href="#">QSAA</a></li>
                
              </ul>
            </div>!-->
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="row">
          <div class="rightbar_content">
            <div class="single_blog_sidebar wow fadeInUp">
              <h2>Relacionados</h2>
              <ul class="featured_nav">
                  
                  
                   <li> <a class="featured_img" target="_blank" href="http://www.yosiquierosermaestro.com/tips"><img src="{{ URL::asset('images/test.jpg') }}" alt=""></a>
                    <?php
                    $localx=  utf8_encode("Prepárate para las pruebas");
                    ?>
                  <div class="featured_title"> <a class="" target="_blank" href="http://www.yosiquierosermaestro.com/tips">{!!$localx!!}</a> </div>
                </li>
                
                
               
                
                  <li> <a class="featured_img" target="_blank"  href="http://www.yosiquierosermaestro.com/order"><img src="{{ URL::asset('images/5usd.png') }}" alt=""></a>
                    <?php
                    $local=  utf8_encode("Capacitate con el simulador de pruebas de personalidad completo para QSM6");
                    ?>
                  <div class="featured_title"> <a class="" target="_blank" href="http://www.yosiquierosermaestro.com/order">{!!$local!!}</a> </div>
                </li>
               
                
                
                    <li> <a class="featured_img" href="#"><img src="{{ URL::asset('images/demo.png') }}" alt=""></a>
                    <?php
                    $local2=  utf8_encode("Ingresa al demo del simulador de pruebas de personalidad");
                    ?>
                  <div class="featured_title"> <a class="" target="_blank" href="https://educacion.gob.ec">{!!$local2!!}</a> </div>
                </li>
                <li> <a class="featured_img" href="#"><img src="{{ URL::asset('images/QSMgalapagos.jpg') }}" alt=""></a>
                    <?php
                    $local=  utf8_encode("Encuentra el cronograma de méritos y oposición");
                    ?>
                  <div class="featured_title"> <a class="" target="_blank" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/09/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-Galapagos-2017-1.pdf">{!!$local!!}</a> </div>
                </li>
                
                    <li> <a class="featured_img" href="#"><img src="{{ URL::asset('images/bilingue.png') }}" alt=""></a>
                    <?php
                    $local2=  utf8_encode("Encuentra todo lo que necesitas saber");
                    ?>
                  <div class="featured_title"> <a class="" target="_blank" href="https://educacion.gob.ec">{!!$local2!!}</a> </div>
                </li>
              
              
              </ul>
            </div>
           <!-- <div class="single_blog_sidebar wow fadeInUp">
              <h2>Popular Posts</h2>
              <ul class="middlebar_nav wow">
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img2.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
              </ul>
            </div>-->
            <div class="single_blog_sidebar wow fadeInUp">
              <h2>Marcas Populares</h2>
              <ul class="poplr_tagnav">
                <li><a href="#">Maestros</a></li>
                <li><a href="#">pruebas maestros</a></li>
                <li><a href="#">qsm6</a></li>
                <li><a href="#">Conocimiento</a></li>
                <li><a href="#">Personalidad</a></li>
                <li><a href="#">noticias maestro</a></li>
                <li><a href="#">Videos maestros</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="footer_inner">
          <p class="pull-left">Copyright &copy; 2017 </p>
          <p class="pull-right">Developed By Qioto.tech</p>
        </div>
      </div>
    </div>
  </div>
</footer>
<script src="{{ URL::asset('assets/js/jquery.min.js') }}"></script> 
<script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script> 
<script src="{{ URL::asset('assets/js/wow.min.js') }}"></script> 
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>


<script>
	$(document).ready(function(){
		$('#result-elegible').hide(); 
		
		$("#btn-search-suitable").on("click", function() {
			if( $("#ci").val() === '' ){
				alert('Se requiere un numero de cedula');
			} else {
				$('#result-elegible').show();
				var url = "{{ url('/teacher-search-suitable/search') }}";
				$.ajax({
					type: "POST",
					url: url,
					data: $('#frmsearch').serialize(),
					success: function(data){
						$.each(data, function(i, item) {
							if(item.flag != 'No existe su cedula'){
								$('table tr').slice(1).remove();
								$("#grid-elegible tbody").append(item.value);

							} else {
								$('table tr').slice(1).remove();
								$("#grid-elegible tbody").append(item.value);
							}							
						});	
					}
				});
			}
			return false;
		});

		$("#btn-search-elegible").on("click", function() {
			if( $("#ci").val() === '' ){
				alert('Se requiere un numero de cedula');
			} else {
				$('#result-elegible').show();
				var url = "{{ url('/teacher-search-elegible/search') }}";
				$.ajax({
					type: "POST",
					url: url,
					data: $('#frmsearch').serialize(),
					success: function(data){
						$.each(data, function(i, item) {
							if(item.flag != 'No existe su cedula'){
								$('table tr').slice(1).remove();
								$("#grid-elegible tbody").append(item.value);

							} else {
								$('table tr').slice(1).remove();
								$("#grid-elegible tbody").append(item.value);
							}							
						});	
					}
				});
			}
			return false;
		});
		
	});
</script>

</body>
</html>