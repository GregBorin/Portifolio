<?php
session_start();
require_once "../control/SeccaoController.php";
buscarSeccoes();
require_once "../control/PerfilController.php";
buscarPerfil();
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
  <link href="../vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/resume.css" rel="stylesheet">

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
  <?php
  if (isset($_SESSION['perfil'])) {
    $perfil = unserialize($_SESSION['perfil']);
    if (isset($perfil)) {
      foreach ($perfil as $p) {
        $picture = $p->foto;
        if (!empty($picture)) {
          $image_src = "../img/" . $picture;
          echo '<img id="imgPerfilIcon" class="mr-2 float-left" title="Foto Perfil" src="' . $image_src . '" data-toggle="modal" data-target="#imgPerfilModal">';
        }
        echo '<a class="navbar-brand mr-0 js-scroll-trigger" href="#page-top">
                <span class="d-block d-lg-none">
                  ' . $p->nome . ' ' . $p->sobrenome . '
                </span>
              </a>
              <button class="navbar-toggler" type="button" onclick="removeSeccaoInput()" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul id="navbar-nav" class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#sobre">Sobre</a>
                  </li>';
      }
      if (isset($_SESSION['seccoes'])) {
        $seccoes = unserialize($_SESSION['seccoes']);
        foreach ($seccoes as $scc) {
          echo '<li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#' . $scc . '">' . $scc . '</a>
                </li>';
        }
      }
      echo '<div id="adicionarSeccao">
              <i id="plusIconSeccao" onclick="createSeccaoInput()" class="fas fa-plus fa-2x iconLink" title="Adicionar Secção"></i>
            </div>
            </ul>
            </div>';
    }
  }
  ?>
  </nav>

  <!-- Corpo das seccoes -->
  <div class="container-fluid p-0">

    <!-- Começo section de informações do perfil -->
    <section class="resume-section p-3 p-lg-5 d-flex align-items-center" id="sobre">
      <div class="w-100">
        <div class="editPerfil text-right">
          <i id="editPerfilIcon" class="fas fa-edit fa-2x iconLink" title="Editar Perfil" data-toggle="modal" data-target="#editPerfilModal"></i>
        </div>
        <?php
        if (isset($_SESSION['perfil'])) {
          $perfil = unserialize($_SESSION['perfil']);
          if (isset($perfil)) {
            foreach ($perfil as $p) {
              $picture = $p->foto;
              if (!empty($picture)) {
                $image_src = "../img/" . $picture;
                echo '<img class="img-perfil mr-4 mb-4 float-left" src="' . $image_src . '" alt="">';
              }
              echo '<h1 class="mb-0">' . $p->nome . '
                      <span class="text-primary">' . $p->sobrenome . '</span>
                    </h1>';
              echo '<div class="subheading mb-4">' . $p->endereco . '
                      <a href="mailto:' . $p->email . '">' . $p->email . '</a>
                    </div>';
              echo '<p class="lead mb-5">' . $p->descricao . '</p>';
              if ($p->redes) {
                echo '<div class="social-icons">';
                foreach ($p->redes as $r) {
                  echo '<a href="' . $r->url . '">
                          <i class="fab fa-' . $r->nomeRede . '"></i>
                        </a>';
                }
                echo '</div>';
              }
            }
          } else {
            echo '<h1 class="mb-0">Nenhum Perfil
                    <span class="text-primary">Cadastrado</span>
                  </h1>';
          }
        } else {
          echo '<h1 class="mb-0">Não exite 
                  <span class="text-primary">sessão</span>
                </h1>';
        }
        ?>
      </div>
    </section>
    <!-- Fim section de informações do perfil -->
     
    <!-- Loop Seccoes geradas -->
    <?php
    if (isset($_SESSION['seccoes'])) {
      $seccoes = unserialize($_SESSION['seccoes']);
      if (isset($seccoes) && isset($perfil)) {
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
    }
    ?>
    <!-- Fim do loop seccoes -->
  
  </div>
  <!-- Fim do corpa das seccoes -->

  <!-- Começo Modal de edição do Perfil  -->
  <div class="modal fade" id="editPerfilModal" tabindex="-1" role="dialog" aria-labelledby="editarInformacoesPerfil" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="editarInformacoesPerfil">Editar infromações do Perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php
          if (isset($_SESSION['perfil'])) {
            $perfil = unserialize($_SESSION['perfil']);
            $snowman = "../img/snowman.png";
            if (isset($perfil)) {
              foreach ($perfil as $p) {
                $picture = $p->foto;
                $image_src = "../img/" . $picture;
                echo '<form id="formPerfil" action="../control/PerfilController.php?op=edit" method="post" name="formPerfil" enctype="multipart/form-data">
                        <input type="hidden" id="idPerfil" name="idPerfil" value="' . $p->idPerfil . '">
                        <input type="hidden" id="nomeFoto" name="nomeFoto" value="' . $p->foto . '">
                        <div class="w-100">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="inputNome">Nome</label>
                              <input type="text" class="form-control rounded-0" id="inputNome" name="inputNome" value="' . $p->nome . '" required>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputSobrenome">Sobrenome</label>
                              <input type="text" class="form-control rounded-0" id="inputSobrenome" name="inputSobrenome" value="' . $p->sobrenome . '" required>
                            </div>
                          </div>
                          <div class="input-group mb-3" style="align-items: flex-end;">
                            <img id="previewProfilePic" class="previewProfilePic rounded-0 img-thumbnail" src="' . ($picture != "" ? $image_src : $snowman) . '">
                            <div class="custom-file">
                              <input type="file" accept="image/*" class="custom-file-input rounded-0" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)">
                              <label class="custom-file-label rounded-0" for="fileToUpload">Escolher imagem de perfil</label>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="inputEmail">E-mail</label>
                            <input type="email" class="form-control rounded-0" id="inputEmail" name="inputEmail" value="' . $p->email . '" placeholder="exemplo@email.com" required>
                          </div>
                          <div class="form-group">
                            <label for="inputEndereco">Endereço</label>
                            <input type="text" class="form-control rounded-0" id="inputEndereco" name="inputEndereco" value="' . $p->endereco . '" placeholder="Pais, Estado..." required>
                          </div>
                          <div class="form-group" id="descricaoForm">
                            <label for="inputDescricao">Descrição</label>
                            <textarea class="form-control rounded-0" id="inputDescricao" name="inputDescricao" rows="4" required>' . $p->descricao . '</textarea>
                          </div>';
                if ($p->redes) {
                  $sMCount = 0;
                  $placeholderURL = "https://www.socialexmplo.com/social.exemplo";
                  foreach ($p->redes as $r) {
                    $sMCount++;
                    $socialURL = 'socialURL' . $sMCount;
                    echo '<input type="hidden" id="idRede" name="idRede" value="' . $r->idRede . '">
                          <div id="' . $socialURL . '" class="input-group rounded-0 mb-3">
                              <input type="text" class="form-control rounded-0" id="inputSocialURL" name="inputSocialURL[]" value="' . $r->url . '" placeholder="' . $placeholderURL . '" title="Social Midia URL" required>
                              <div class="input-group-append rounded-0">
                                  <button class="btn btn-secondary rounded-0" type="button" title="Remover Social Midia" onclick="removeSocialInputEd(\'' . $socialURL . '\')">
                                      <i class="fas fa-times fa-1x rounded-0"></i>
                                  </button>
                              </div>
                          </div>';
                  }
                  echo '<input type="hidden" id="sMCount" name="sMCount" value="' . $sMCount . '">';
                }
                echo '</div>
                      <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-info rounded-0" id="inputEndereco" onclick="addSocialMedia()">
                          <i class="fas fa-plus" title="Adicionar Rede Social"></i>
                          Rede Social
                        </button>
                        <button type="submit" class="btn btn-dark rounded-0">Salvar mudanças</button>
                      </div>';
                echo '</form>';
              }
            } else {
              echo '<form id="formPerfil" action="../control/PerfilController.php?op=cad" method="post" name="formPerfil" enctype="multipart/form-data">
                      <div class="w-100">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label for="inputNome">Nome</label>
                            <input type="text" class="form-control rounded-0" id="inputNome" name="inputNome" required>
                          </div>
                          <div class="form-group col-md-6">
                            <label for="inputSobrenome">Sobrenome</label>
                            <input type="text" class="form-control rounded-0" id="inputSobrenome" name="inputSobrenome" required>
                          </div>
                        </div>
                        <div class="input-group mb-3">
                          <img id="previewProfilePic" class="previewProfilePic rounded-0 img-thumbnail" src="' . $snowman . '">
                          <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input rounded-0" name="fileToUpload" id="fileToUpload" onchange="loadFile(event)">
                            <label class="custom-file-label rounded-0" for="fileToUpload">Escolher imagem de perfil</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="inputEmail">E-mail</label>
                          <input type="email" class="form-control rounded-0" id="inputEmail" name="inputEmail" placeholder="exemplo@email.com" required>
                        </div>
                        <div class="form-group">
                          <label for="inputEndereco">Endereço</label>
                          <input type="text" class="form-control rounded-0" id="inputEndereco" name="inputEndereco" placeholder="Pais, Estado..." required>
                        </div>
                        <div class="form-group" id="descricaoForm">
                          <label for="inputDescricao">Descrição</label>
                          <textarea class="form-control rounded-0" id="inputDescricao" name="inputDescricao" rows="4" required></textarea>
                        </div>
                        <div class="modal-footer d-flex justify-content-between">
                          <button type="button" class="btn btn-info rounded-0" id="inputEndereco" onclick="addSocialMedia()">
                            <i class="fas fa-plus" title="Adicionar Rede Social"></i>
                            Rede Social
                          </button>
                          <button type="submit" class="btn btn-dark rounded-0">Salvar mudanças</button>
                        </div>
                      </div>
                    </form>';
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <!--Fim Modal de edição do Perfil  -->

  <!-- Começo Modal de edição da Seccao  -->
  <div class="modal fade" id="editSeccaoModal" tabindex="-1" role="dialog" aria-labelledby="editSeccaoModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="editarInformacoesPerfil">Editar infromações da Secção</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="formConteudo" action="../control/ConteudoController.php?op=cad" method="post" name="formConteudo">
            <div class="w-100">
              <div class="form-group">
                <label for="inputEmail">Titulo</label>
                <input type="email" class="form-control rounded-0" id="inputTitulo" name="inputTitulo" required>
              </div>
              <div class="form-group">
                <label for="inputEndereco">Subtitulo</label>
                <input type="text" class="form-control rounded-0" id="inputSubtitulo" name="inputSubtitulo" required>
              </div>
              <div class="form-group" id="descricaoForm">
                <label for="inputDescricao">Descrição</label>
                <textarea class="form-control rounded-0" id="inputDescricao" name="inputDescricao" rows="4" required></textarea>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <button type="submit" class="btn btn-dark rounded-0">Salvar mudanças</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Começo Modal de edição da seccao  -->
  
  <!-- Começo modal display foto mobile  -->
  <?php
  if (isset($_SESSION['perfil'])) {
    $perfil = unserialize($_SESSION['perfil']);
    if (isset($perfil)) {
      foreach ($perfil as $p) {
        $picture = $p->foto;
        if (!empty($picture)) {
          $image_src = "../img/" . $picture;
          echo '<div class="modal fade" id="imgPerfilModal" tabindex="-1" role="dialog" aria-labelledby="imagemPerfil" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content border-0 rounded-0">
          <div class="modal-body mb-0 p-0">';
          echo          '<img class="img-fluid" src="' . $image_src . '" alt="">
          </div>
          </div>
          </div>
          </div>';
        }
      }
    }
  }
  ?>
  <!-- Fim modal display foto mobile  -->

  <!-- Bootstrap core JavaScript -->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="../js/resume.min.js"></script>

  <script src="../js/impl.js"></script>
  <script>
    var loadFile = function(event) {
      var output = document.getElementById('previewProfilePic');
      output.src = URL.createObjectURL(event.target.files[0]);
    };
  </script>

</body>

</html>