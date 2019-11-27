<?php

//session_start();
//session_unset();

include_once '../model/Perfil.php';
include_once '../model/Redes.php';
include_once '../dao/PerfilDAO.php';

//var_dump($_POST);

if (isset($_GET['op'])) {
    switch ($_GET['op']) {
        case 'edit':

            if (
                isset($_POST['inputNome']) && !empty($_POST['inputNome']) &&
                isset($_POST['inputSobrenome']) && !empty($_POST['inputSobrenome']) &&
                !empty($_FILES['fileToUpload']['name']) &&
                isset($_POST['inputEmail']) && !empty($_POST['inputEmail']) &&
                isset($_POST['inputEndereco']) && !empty($_POST['inputEndereco']) &&
                isset($_POST['inputDescricao']) && !empty($_POST['inputDescricao'])
            ) {


                $profilePicture = $_FILES['fileToUpload']['name'];
                $target_dir = "../img/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $extensions_arr = array("jpg", "jpeg", "png", "gif");

                if (in_array($imageFileType, $extensions_arr)) {

                    $perfil = new Perfil();
                    $perfil->nome = $_POST['inputNome'];
                    $perfil->sobrenome = $_POST['inputSobrenome'];
                    $perfil->foto = $profilePicture;
                    $perfil->email = $_POST['inputEmail'];
                    $perfil->endereco = $_POST['inputEndereco'];
                    $perfil->descricao = $_POST['inputDescricao'];

                    if(isset($_POST['inputSocailURL']) && !empty($_POST['inputSocailURL'])){
                        
                        $socialList = $_POST['inputSocailURL'];
                        foreach ($socialList as $sl) {
                            $redes = new Redes();
                            $partURL = explode(".", $sl);
                            $redes->nomeRede = $partURL[1];
                            $redes->url = $sl;
                            $arrayRedes[] = $redes;
                        }

                    }
                    
                    move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $profilePicture);

                    $pDAO = new PerfilDAO();
                    $pDAO->editarPerfil($perfil, $arrayRedes);

                    $_SESSION['perfil'] = serialize($perfil);
                    header('location:../view/Portifolio.php');
                    
                } else {
                    //TODO Warning alert
                    echo "<script type='text/javascript'>
                    alert('Formato de arquivo inválido!');
                    window.location='../view/Portifolio.php';
                    </script>";
                }
            } else {
                header('location:../view/Portifolio.php');
            }

            break;

            //case 'buscar':


            //break;
    }
}


if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'perfil' : buscarPerfil();
        break;
    }
}

function buscarPerfil(){

    $pDAO = new PerfilDAO();
    $perfil = $pDAO->buscarPerfil();
    var_dump($perfil);
    
    $_SESSION['perfil'] = serialize($perfil);

}

?>
