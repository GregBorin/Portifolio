<?php

class Seccao{
    
    private $idSeccao;
    private $nomeSeccao;

    // public function Seccao($idSeccao, $nomeSeccao){
    //     $this->__set($idSeccao);
    //     $this->__set($nomeSeccao);
    // }

    public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atr, $valor){
		$this->$atr=$valor;
	}

    // public function getIdSeccao(){
    //     return $this->idSeccao;
    // }

    // public function setIdSeccao($idSeccao){
    //     $this->idSeccao = $idSeccao;
    // }

    // public function getNomeSeccao(){
    //     return $this->nomeSeccao;
    // }

    // public function setNomeSeccao($nomeSeccao){
    //     $this->nomeSeccao = $nomeSeccao;
    // }
    public function __toString(){
		return $this->nomeSeccao;
	}
}

?>