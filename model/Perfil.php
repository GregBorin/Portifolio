<?php

class Perfil{
    
    private $idPerfil;
    private $nome;
    private $sobrenome;
    private $foto;
    private $email;
    private $endereco;
    private $descricao;
    private $redes = [];

    public function __get($atributo){
		return $this->$atributo;
	}
	public function __set($atr, $valor){
		$this->$atr=$valor;
	}

}

?>