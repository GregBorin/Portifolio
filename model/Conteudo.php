<?php

class Conteudo{
    
    private $idConteudo;
    private $titulo;
    private $subtitulo;
    private $descricao;
    private $seccao;

    public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atr, $valor){
		$this->$atr=$valor;
	}

}

?>