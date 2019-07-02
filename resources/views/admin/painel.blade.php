<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>ESPCMIL</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo asset('lib/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('lib/animate/animate.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('lib/ionicons/css/ionicons.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('lib/owlcarousel/assets/owl.carousel.min.css') ?>" rel="stylesheet">
  <link href="<?php echo asset('lib/lightbox/css/lightbox.min.css') ?>" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo asset('css/style.css') ?>" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Rapid
    Theme URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>

    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light" style="color: white;"><a href="#intro" class="scrollto"><span>ESPCMIL</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class=""><a href="/">Home</a></li>
          <li><a href="#about">Sobre Nós</a></li>
          @if(session()->has('auth'))
            @if((session()->get('auth')->nivel_acesso) == 2)
              <li class="drop-down"><a href="#">Banco de Questões</a>
                <ul>
                  <a href="/prof/{{ session()->get('authProf')->nivel_acesso }}/{{ session()->get('authProf')->id }}/{{ session()->get('authProf')->tb_materia_id_materia }}">Adicionar</a>
                </ul>
              </li>
            @elseif((session()->get('auth')->nivel_acesso) == 1)
              <li class="drop-down active"><a href="/admin/{{ session()->get('authAdmin')->nivel_acesso }}/{{ session()->get('authAdmin')->id }}">Painel</a>
                <ul>
                  <a href="/admin/{{ session()->get('authAdmin')->nivel_acesso }}/{{ session()->get('authAdmin')->id }}/aluno/add">Aluno</a>
                  <a href="/admin/{{ session()->get('authAdmin')->nivel_acesso }}/{{ session()->get('authAdmin')->id }}/professor/add">Professor</a>
                  <a href="/admin/{{ session()->get('authAdmin')->nivel_acesso }}/{{ session()->get('authAdmin')->id }}/concurso/add">Concursos</a>
                  <a href="/admin/{{ session()->get('authAdmin')->nivel_acesso }}/{{ session()->get('authAdmin')->id }}/materia/add">Materia</a>
                </ul>
              </li>
            @else
              <li><a href="#team">Exercicios</a></li>
            @endif
          @endif
          @if(session()->has('authProf') || session()->has('authAdmin') || session()->has('authUser'))
            <li class="drop-down" style="margin-top: -10px"><a href="#">Bem vindo <p align="center" style="color: gray">{{ session()->get('auth')->nome }}</p></a>
              <ul>
                <li><a href="/logout">Sair</a></li>
              </ul>
            </li>
          @else
            <li class="drop-down"><a href="#">Area Restrita</a>
              <ul>
                <li><a href="/restrito/prof">PROFESSOR</a></li>
                <li><a href="/restrito/user">USUARIO</a></li>
              </ul>
            </li>
          @endif
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container d-flex h-100">
      <div class="row justify-content-center align-self-center">
        <div class="col-md-3 intro-info order-md-first order-last">
          <h2><br><span>Professor</span></h2>
        </div>
        <div class="col-md-6 intro-info">
          <h2><br><span>Aluno</span></h2>
        </div>
  
        <div class="col-md-6 intro-img order-md-last order-first">
          
        </div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">

      <div class="container">
        <div class="row">

          <div class="col-lg-5 col-md-6">
            <div class="about-img">
              <img src="<?php echo asset('img/about.jpg') ?>" alt="">
            </div>
          </div>

          <div class="col-lg-7 col-md-6">
            <div class="about-content">
              <h2>Sobre nós</h2>
              <h3>Missão</h3>
              <p>Nossa missão é preparar e capacitar os candidatos aos testes de admissão de concursos militares e forças de segurança auxiliar, baseado ao que for publicado nos editais e trabalhando com verdade e transparência aos nossos clientes, prezamos pelo serviço de qualidade e satisfação a todos com que servimos.</p>
              
            </div>
          </div>
        </div>
      </div>

    </section><!-- #about -->


    <!--==========================
      Services Section
    ============================-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <!-- Uncomment below i you want to use a preloader -->
  <!-- <div id="preloader"></div> -->

  <!-- JavaScript Libraries -->
  <script src="<?php echo asset('lib/jquery/jquery.min.js')?>"></script>
  <script src="<?php echo asset('lib/jquery/jquery-migrate.min.js')?>"></script>
  <script src="<?php echo asset('lib/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
  <script src="<?php echo asset('lib/easing/easing.min.js')?>"></script>'
  <script src="<?php echo asset('lib/mobile-nav/mobile-nav.js')?>"></script>
  <script src="<?php echo asset('lib/wow/wow.min.js')?>"></script>
  <script src="<?php echo asset('lib/waypoints/waypoints.min.js')?>"></script>
  <script src="<?php echo asset('lib/counterup/counterup.min.js')?>"></script>
  <script src="<?php echo asset('lib/owlcarousel/owl.carousel.min.js')?>"></script>
  <script src="<?php echo asset('lib/isotope/isotope.pkgd.min.js')?>"></script>
  <script src="<?php echo asset('lib/lightbox/js/lightbox.min.js')?>"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo asset('contactform/contactform.js')?>"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo asset('js/main.js')?>"></script>

</body>
</html>
