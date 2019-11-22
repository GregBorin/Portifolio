<?php

session_start();
session_unset();

include '../model/Seccao.php';
include '../dao/SeccaoDAO.php';

//var_dump($_POST);
if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cad':

            if(isset($_POST['nomeSeccao'])){

                $seccao = new Seccao();
                $seccao->nomeSeccao = $_POST['nomeSeccao'];

                $sDAO = new SeccaoDAO();
                $sDAO->cadastrarSeccao($seccao);

                $_SESSION['seccao'] = serialize($seccao);
                
                header('location:../view/Portifolio.php');
                seccoes();
                
            } else {
                //TODO error.php
                //header('location:../view/error.php')
                echo "Não tem valor";
            }

        break;
		
		//case 'buscar':

            
            //break;
    }

}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'seccoes' : seccoes();break;
    }
}

function seccoes(){
    $sDAO = new SeccaoDAO();

    $arraySeccoes = array();
    $arraySeccoes = $sDAO->buscarSeccoes();
    $_SESSION['seccoes'] = serialize($arraySeccoes);
    var_dump($_SESSION['seccoes']);

    header('location:../view/Portifolio.php');
}

?>