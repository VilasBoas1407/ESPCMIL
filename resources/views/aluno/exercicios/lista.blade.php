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
              <li><a href="/aluno/{{ session()->get('authUser')->nivel_acesso }}/{{ session()->get('authUser')->id }}/exercicios">Exercicios</a></li>
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

  <section id="testimonials">
      <div class="container">
      <br>
        <header class="section-header">
          <h3>Exercicios</h3>
        </header>

        <div class="row justify-content-center">
          <div class="" style="width:100%;">

            <div class="owl-carousel testimonials-carousel wow fadeInUp">

              @foreach($exercicios as $exercicio)
              <div class="testimonial-item col-md-12">
                <div style="width: 50%; height: 50%; position: relative; top:50%; left:53%;">
                <form action=".../{{$exercicio['id_questoes']}}" method="post" style="margin-left: -180px;"><center>
                <h3><p style="word-wrap: break-word;white-space: normal;">{{$exercicio['enunciado']}}</p></h3>
                @if(session()->has($exercicio['id_questoes']))
                  <input type="hidden" name="idQuestao" value="{{ $exercicio['id_questoes'] }}" disabled="">
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_a" disabled="">{{$exercicio['alternativa_a']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_b" disabled="">  {{$exercicio['alternativa_b']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_c" disabled="">  {{$exercicio['alternativa_c']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_d" disabled="">  {{$exercicio['alternativa_d']}}</input><br><br>
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                @else
                  <input type="hidden" name="idQuestao" value="{{ $exercicio['id_questoes'] }}">
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_a">  {{$exercicio['alternativa_a']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_b">  {{$exercicio['alternativa_b']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_c">  {{$exercicio['alternativa_c']}}</input><br><br>
                  <input style="word-wrap: break-word;" type="radio" class="form-check-input" name="resposta" value="alternativa_d">  {{$exercicio['alternativa_d']}}</input><br><br>
                  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                @endif
                <button class="btn lg btn-info" type="submit">Avançar</button><br><br>
                @if(session()->has('questao'))
                @if(session()->get('questao') == $exercicio['id_questoes'])
                @if(session()->has('cont'))
                    <?php $correta = session()->get('cont', ['']); $id = $correta['id']; ?>
                    @if($id  == 1)
                      <div align="middle" class="col-md-6" style="position: relative;top:80%;left:0%;">
                        <div style="width:150px;" class="alert alert-info">
                          <center><strong>Resposta Correta (<?php $correta = session()->get('cont', ['']); echo $correta['correta']; ?>)</strong></center>
                        </div>
                        <div class="col-md-6">
                            <strong>Resolução</strong>
                            <p style="word-wrap: break-word;"><?php $correta = session()->get('cont', ['']); echo $correta['explicacao']; ?></p>
                        </div>
                      </div>
                      <br>
                      <br>
                    @else
                        <div align="middle" class="col-md-6" style="position: relative;top:70%;left:0%;">
                        <div style="width:150px;" class="alert alert-info">
                          <center><strong>Resposta Incorreta (<?php $correta = session()->get('cont', ['']); echo $correta['correta']; ?>)</strong></center>
                        </div>
                        <div class="col-md-6">
                            <strong>Resolução</strong>
                          <p style="word-wrap: break-word;"><?php $correta = session()->get('cont', ['']); echo $correta['correta']; ?></p> 
                        </div>
                      </div>
                    @endif
                @endif
                @endif
                @endif
                </center></form>
                </div>
              </div>
              @endforeach 

            </div>

          </div>
        </div>
        <br><br>
        <dir class="col-md-12">
          <i><a href=".../finalizar"><p align="right" style="font-size: 19px;">Finalizar</p></a></i>
        </dir>


      </div>
    </section><!-- #testimonials -->

 <!--==========================
      Services Section
    ============================-->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->


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
