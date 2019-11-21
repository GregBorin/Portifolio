<?php

session_start();
session_unset();

include '../model/Seccao.php';
include '../persistence/SeccaoDAO.php';

if(isset($_POST['nomeSeccao'])){

    $seccao = new Seccao();
    $seccao->$_POST['nomeSeccao'];

    $sDAO = new SeccaoDAO();
    $sDAO->cadastrasSeccao($seccao);

    $_SESSION['seccao'] = serialize($seccao);
    //TODO index.php
    header('location:../index.php');
} else {
    //TODO error.php
    header('location:../view/error.php')
}


?>