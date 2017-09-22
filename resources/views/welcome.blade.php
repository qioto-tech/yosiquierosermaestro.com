<!DOCTYPE html>
<html>
<head>
<title>Quiero ser maestro  &mdash;  </title>
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
      <div class=" col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <div class="leftbar_content">
            <h2>Noticias</h2>
          
              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="images/pruebas.jpg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">QSM6</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Sep <strong>1</strong></span>
                    <h2><a href="#">Pruebas de personalidad</a></h2>
                      <?php
                    $personalidad=utf8_encode("Docentes contratados y aspirantes interesados en obtener la elegibilidad docente deberán rendir las pruebas de personalidad. El Ministerio de Educación con coordinación con el Ineval están preparando estas pruebas cuyo objetivo es determinar variantes como drogadicción, alcholismo, maltrato entre otras."
                            . " "
                            . "Entra aqui para ver los listados de idoneidad y los pasos a seguir ");
                    ?>
                    
                    <p>{!!$personalidad!!}</p>
                  </div>
                </div>
              </div>
            </div>
         
            
              <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="pages/single.html"><img src="images/quiero-ser-maestro.jpeg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">QSM-6</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Ago <strong>1</strong></span>
                    <h2><a href="pages/single.html">Inicio proceso de Elegibilidad</a></h2>
                    
                    <?php
                    $local1=  utf8_encode("El Ministerio de Educación anunció que el concurso de méritos y oposición 'Quiero Ser Maestro 6' se abre del 1 al 10 de agosto.
Durante este periodo, los maestros del país podrán participar por una plaza de trabajo en instituciones de educación pública.
El ministro de Educación, Fander Falcolní, señaló este lunes en rueda de prensa, que unos 26.000 docentes que ya están vinculados a la educación pública a través de contratos, podrán participar en este concurso para obtener un nombramiento fijo.
El proceso inicia con la postulación a través del sitio web del Ministerio");
                    ?>
                    <p>
                        {!!$local1!!}
                    </p>
                  </div>
                </div>
              </div>
            </div>
              
            <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="images/stuff_img1.jpg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Technology</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Nov <strong>17</strong></span>
                    <h2><a href="#">Duis quis erat non nunc fringilla</a></h2>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulputate ut nisi. Aliquam accumsan, nulla sed feugiat vehicula...</p>
                  </div>
                </div>
              </div>
            </div>
             <div class="single_stuff wow fadeInDown">
              <div class="single_stuff_img"> <a href="#"><img src="images/pruebas.jpg" alt=""></a> </div>
              <div class="single_stuff_article">
                <div class="single_sarticle_inner"> <a class="stuff_category" href="#">Technology</a>
                  <div class="stuff_article_inner"> <span class="stuff_date">Ago <strong>9</strong></span>
                    <h2><a href="#">Pruebas de personalidad</a></h2>
                    <p>Nunc tincidunt, elit non cursus euismod, lacus augue ornare metus, egestas imperdiet nulla nisl quis mauris. Suspendisse a pharetra urna. Morbi dui lectus, pharetra nec elementum eget, vulputate ut nisi. Aliquam accumsan, nulla sed feugiat vehicula...</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="stuffpost_paginatinonarea wow slideInLeft">
              <ul class="newstuff_pagnav">
                <li><a class="active_page" href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-2 col-lg-2">
        <div class="row">
          <div class="middlebar_content">
            <h2 class="yellow_bg">Vinculos importantes</h2>
            <div class="middlebar_content_inner wow fadeInUp">
              <ul class="middlebar_nav">
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/Tips.jpg" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Tips para aprobar las pruebas de idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf"><img src="images/cronograma.png" alt=""></a> <a class="mbar_title" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/08/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-6.pdf">Cronograma QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf"><img src="images/Lista.png" alt=""></a> <a class="mbar_title" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/07/MINEDUC-MINEDUC-2017-00065-A-2.pdf">Acuerdo Ministerial QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/archivo.png" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Verifica tu idoneidad QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="http://www.yosiquierosermaestro.com/teacher"><img src="images/visto.png" alt=""></a> <a class="mbar_title" href="http://www.yosiquierosermaestro.com/teacher">Verifica si eres elegible QSM6</a> </li>
                <li> <a class="mbar_thubnail" href="www.educacion.gob.ec"><img src="images/indice.png" alt=""></a> <a class="mbar_title" href="#">Ministerio de Educacion</a> </li>
                
                
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
                  
                  
                   <li> <a class="featured_img" href="#"><img src="images/test.jpg" alt=""></a>
                    <?php
                    $localx=  utf8_encode("Prepárate para las pruebas");
                    ?>
                  <div class="featured_title"> <a class="" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/09/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-Galapagos-2017-1.pdf">{!!$localx!!}</a> </div>
                </li>
                <li> <a class="featured_img" href="#"><img src="images/QSMgalapagos.jpg" alt=""></a>
                    <?php
                    $local=  utf8_encode("Encuentra el cronograma de méritos y oposición");
                    ?>
                  <div class="featured_title"> <a class="" href="https://educacion.gob.ec/wp-content/uploads/downloads/2017/09/Cronograma-Elegibilidad-Meritos-y-Oposicion-QSM-Galapagos-2017-1.pdf">{!!$local!!}</a> </div>
                </li>
                
                    <li> <a class="featured_img" href="#"><img src="images/bilingue.png" alt=""></a>
                    <?php
                    $local2=  utf8_encode("Encuentra todo lo que necesitas saber");
                    ?>
                  <div class="featured_title"> <a class="" href="https://educacion.gob.ec">{!!$local2!!}</a> </div>
                </li>
              
              
              </ul>
            </div>
            <div class="single_blog_sidebar wow fadeInUp">
              <h2>Popular Posts</h2>
              <ul class="middlebar_nav wow">
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img2.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
                <li> <a href="#" class="mbar_thubnail"><img alt="" src="images/hot_img1.jpg"></a> <a href="#" class="mbar_title">Sed luctus semper odio aliquam rhoncus</a> </li>
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
</body>
</html>