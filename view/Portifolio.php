<?php
session_start();
require_once "../control/SeccaoController.php";
seccoes();
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
  <link href="../css/resume.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
    <a class="testtet">
      <img id="imgPerfilIcon" class="mr-2 float-left" title="Foto Perfil" src="../img/perfil.jpg" alt="" data-toggle="modal" data-target="#imgPerfilModal">
    </a>
    <a class="navbar-brand mr-0 js-scroll-trigger" href="#page-top">
      <span class="d-block d-lg-none">
        Gregory Borin
      </span>
    </a>
    <button class="navbar-toggler" type="button" onclick="closeTextField()" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul id="navbar-nav" class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a>
        </li>
        <?php
        if (isset($_SESSION['seccoes'])) {
          $seccoes = unserialize($_SESSION['seccoes']);
          foreach ($seccoes as $scc) {
            echo '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#' . $scc . '">' . $scc . '</a>
                </li>';
          }
        }

        ?>
        <div id="adicionarSeccao">
          <i id="plusIconSeccao" onclick="createTextField()" class="fas fa-plus fa-2x" title="Adicionar Secção"></i>
        </div>
      </ul>
    </div>
  </nav>

  <div class="container-fluid p-0">

    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="sobre">
      <div class="editPerfil">
        <i id="editPerfilIcon" class="fas fa-edit fa-2x" title="Editar Perfil" data-toggle="modal" data-target="#editPerfilModal"></i>
      </div>
      <div class="w-100">
        <img class="img-perfil mr-4 mb-4 float-left" src="../img/perfil.jpg" alt="">
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

    <?php
    if (isset($_SESSION['seccoes'])) {
      $seccoes = unserialize($_SESSION['seccoes']);
      foreach ($seccoes as $scc) {
        echo '<hr class="m-0">
              <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="' . $scc . '">
                <div class="w-100">
                  <h2 class="mb-5">' . $scc . '</h2>
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
                </div>
              </section>';
      }
    }
    ?>

  </div>

  <div class="modal fade" id="editPerfilModal" tabindex="-1" role="dialog" aria-labelledby="editarInformacoesPerfil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editarInformacoesPerfil">Editar infromações do Perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form>
          <div class="modal-body">
              <div class="w-100">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Nome" required>
                  </div>
                  <div class="form-group col-md-6">
                    <input type="text" class="form-control" placeholder="Sobrenome" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="competencia">Competência</label>
                  <input type="text" class="form-control" id="competencia" placeholder="" required>
                </div>

                <div class="form-group">
                  <label for="tipos">Tipo</label>
                  <select class="form-control" id="tipos">
                    <option>Técnica</option>
                    <option>Comportamental</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="avaliacaoDesc">Avaliação</label>
                  <textarea class="form-control" id="avaliacaoDesc" rows="3" required></textarea>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary rounded-0" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-primary rounded-0">Salvar mudanças</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="imgPerfilModal" tabindex="-1" role="dialog" aria-labelledby="imagemPerfil" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-body mb-0 p-0">
            <img class="img-fluid" src="../img/perfil.jpg" alt="">
          </div>
        </div>
    </div>
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