<!DOCTYPE html>
<html>
<head>
<title>Quiero ser maestro  &mdash;  @yield('title')</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/css/font.css">
<link rel="stylesheet" href="assets/css/animate.css">
<link rel="stylesheet" href="assets/css/structure.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
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
            <li><a href="{{ URL::asset('/payment') }}">Capacitacion</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <form id="searchForm">
      <input type="text" placeholder="Search...">
      <input type="submit" value="">
    </form>
  </div>
</header>
<section id="contentbody">
  <div class="container">
    <div class="row">
      <div class=" col-sm-12 col-md-8 col-lg-8">
        <div class="row">
          <div class="leftbar_content">
            <h2>@yield('sub-title')</h2>
			<p> @yield('content') </p>

				<div class="col-md-10" id="result-elegible">
				@yield('grid-content')
				</div>
			
          </div>
        </div>
      </div>

      <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="row">
          <div class="rightbar_content">
            <div class="single_blog_sidebar wow fadeInUp">
              <h2 class="yellow_bg">Vinculos importantes</h2>
              <ul class="middlebar_nav">
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/Tips.jpg" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Tips para aprobar las pruebas de idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf"><img src="images/cronograma.png" alt=""></a> <a class="mbar_title" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf">Cronograma QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf"><img src="images/Lista.png" alt=""></a> <a class="mbar_title" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf">Acuerdo Ministerial QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/archivo.png" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Verifica tu idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/visto.png" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Verifica si eres elegible QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="www.educacion.gob.ec"><img src="images/indice.png" alt=""></a> <a class="mbar_title" href="#">Ministerio de Educacion</a> </li>
                
                
              </ul>
            </div>
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
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/custom.js"></script>

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


































