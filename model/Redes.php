<?php

class Redes{
    
    private $idRede;
    private $idPerfil;
    private $nomeRede;
    private $url;

    public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atr, $valor){
		$this->$atr=$valor;
	}

}

?>