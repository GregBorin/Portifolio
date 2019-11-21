<?php

class Perfil{
    
    private $idPerfil;
    private $nome;
    private $foto;
    private $email;
    private $endereco;
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