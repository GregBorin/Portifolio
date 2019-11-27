<?php

//session_start();
session_unset();

include_once '../model/Seccao.php';
include_once '../dao/SeccaoDAO.php';

//var_dump($_POST);
if(isset($_GET['op'])){
	switch($_GET['op']){
		case 'cad':

            if(isset($_POST['nomeSeccao']) && !empty($_POST['nomeSeccao'])){

                $seccao = new Seccao();
                $seccao->nomeSeccao = $_POST['nomeSeccao'];

                $sDAO = new SeccaoDAO();
                $sDAO->cadastrarSeccao($seccao);

                $_SESSION['seccao'] = serialize($seccao);
                
                header("Location: ../view/Portifolio.php");
                
            } else {
                header('Location:../view/Portifolio.php');
            }

        break;
		
    }

}

if(isset($_POST['action']) && !empty($_POST['action'])) {
    $action = $_POST['action'];
    switch($action) {
        case 'seccoes' : seccoes();
        break;
    }
}

function buscarSeccoes(){
    $sDAO = new SeccaoDAO();

    $arraySeccoes = array();
    $arraySeccoes = $sDAO->buscarSeccoes();
    $_SESSION['seccoes'] = serialize($arraySeccoes);
}
?>