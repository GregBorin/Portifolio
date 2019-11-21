<?php
class Conexao extends PDO{
	private static $instancia;
	
	public function Conexao($dsn,$usuario,$senha){
		parent::__construct($dsn,$usuario,$senha);
	}
	
	public static function getInstancia(){
		if(!isset(self::$instancia)){
			try{
				self::$instancia = new Conexao("mysql:dbname=portifolio;host=localhost","xxxx","xxxx");
			}catch(Exception $e){
				echo 'Erro ao conectar';
				exit();
			}
		}
		return self::$instancia;
	}
}
?>
