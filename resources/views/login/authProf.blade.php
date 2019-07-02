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

  <main id="main">
    <div class="container">

      <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>ESPCMIL</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
      </div>

      <nav class="main-nav float-right d-none d-lg-block">
        <ul>
          <li class="active"><a href="/">Home</a></li>
          <li><a href="#about">Sobre Nós</a></li>
          <li class="active drop-down"><a href="#">Area Restrita</a>
            <ul>
              <li><a href="/restrito/prof">PROFESSOR</a></li>
              <li><a href="/restrito/user">USUARIO</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->
      <div class="container">
        <div class="row justify-content-center align-self-center" style="padding-top: 150px;">
          <div class="col-lg-4">

            <div class="form">
              
              <h4>Login - (Area Restrita)</h4>
              <p></p>
              <form action="/restrito/prof" method="post">

                <div class="form-group">
                  <label>E-mail</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="exemplo@exemplo.com" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <label>Senha</label>
                  <input type="password" name="senha" class="form-control" id="senha" data-rule="minlen:4" data-msg="" />
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button class="btn btn-success" type="submit">Entrar</button></div>
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
              </form>
            </div>

          </div>
        </div>
      </div>
    </main>
  
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
