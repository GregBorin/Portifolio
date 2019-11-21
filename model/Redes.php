<?php

class Redes{
    
    private $idRede;
    private $nomeRede;
    private $url;
    private $perfil;

    public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atr, $valor){
		$this->$atr=$valor;
	}

}

?>