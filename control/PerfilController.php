<?php

session_start();
session_unset();

include '../model/Perfil.php';
include '../dao/PerfilDAO.php';

//var_dump($_POST);

//if(isset($_POST['nomeSeccao'])){

    $seccao = new Seccao();
    $seccao->nomeSeccao = $_POST['nomeSeccao'];

    $sDAO = new SeccaoDAO();
    $sDAO->cadastrarSeccao($seccao);

    $_SESSION['seccao'] = serialize($seccao);
    //TODO index.php
    header('location:../view/Portifolio.html');
//} else {
    //TODO error.php
    //header('location:../view/error.php')
    //echo "Não tem valor";
//}


?>