<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portifólio</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/resume.min.css" rel="stylesheet">  
    <script>
      window.onload = function() {
        $.ajax({
          type: 'POST',
          url:'../control/SeccaoController.php',
          data:{ action:'seccoes'}
        });
      };
    </script>

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">
        <span class="d-block d-lg-none">Gregory Borin</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul id="navbar-nav" class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          <?php
            //include_once '../control/SeccaoController.php';

            //$sec = new SeccaoController();
            //$sec->seccoes();

            if(isset($_SESSION['seccoes'])){
              include_once '../model/Seccao.php';
              
              $seccoes = unserialize($_SESSION['seccoes']);
              foreach($seccoes as $scc){
                echo '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#'.$scc.'">'.$scc.'</a>
                </li>';
              }
            }

          ?>
        </ul>
        
      </div>
      <div id="adicionarSeccao">
          <i id="plusIconSeccao" onclick="createTextField(this)" class="fas fa-plus fa-2x" title="Adicionar Secção"></i>
      </div>
    </nav>

    <div class="container-fluid p-0">

      <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="about">
        <img class="img-fluid mr-4 float-left" src="../img/profile.jpg" alt="">
        <div class="w-100">
          <h1 class="mb-0">Clarence
            <span class="text-primary">Taylor</span>
          </h1>
          <div class="subheading mb-5">3542 Berry Street · Cheyenne Wells, CO 80810 · (317) 585-8468 ·
            <a href="mailto:name@email.com">name@email.com</a>
          </div>
          <p class="lead mb-5">I am experienced in leveraging agile frameworks to provide a robust synopsis for high level
            overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall
            value proposition.</p>
          <div class="social-icons">
            <a href="#">
              <i class="fab fa-linkedin-in"></i>
            </a>
            <a href="#">
              <i class="fab fa-github"></i>
            </a>
            <a href="#">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#">
              <i class="fab fa-facebook-f"></i>
            </a>
          </div>
        </div>
      </section>

      <hr class="m-0">

      <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="experience">
        <div class="w-100">
          <h2 class="mb-5">Experience</h2>

          <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
            <div class="resume-content">
              <h3 class="mb-0">Senior Web Developer</h3>
              <div class="subheading mb-3">Intelitec Solutions</div>
              <p>Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day,
                going forward, a new normal that has evolved from generation X is on the runway heading towards a
                streamlined cloud solution. User generated content in real-time will have multiple touchpoints for
                offshoring.</p>
            </div>
            <div class="resume-date text-md-right">
              <span class="text-primary">March 2013 - Present</span>
            </div>
          </div>

      </section>

      <hr class="m-0">

    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/resume.min.js"></script>

    <script src="../js/impl.js"></script>

  </body>
</html>