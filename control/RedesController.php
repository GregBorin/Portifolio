<?php

session_start();
session_unset();

include_once '../model/Redes.php';
include_once '../dao/RedesDAO.php';

//var_dump($_POST);

//if(isset($_POST['nomeSeccao'])){

    $seccao = new Seccao();
    $seccao->nomeSeccao = $_POST['nomeSeccao'];

    $sDAO = new SeccaoDAO();
    $sDAO->cadastrarSeccao($seccao);

    $_SESSION['seccao'] = serialize($seccao);
    //TODO index.php
   // header('location:../index.php');
//} else {
    //TODO error.php
    //header('location:../view/error.php')
    //echo "Não tem valor";
//}


?>