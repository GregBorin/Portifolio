<?php

include 'Conexao.php';

class SeccaoDAO{

    private $conexao = null;
	
	public function SeccaoDAO(){
		$this->conexao = Conexao::getInstancia();
	}

    public function cadastrarSeccao($seccao){
        try{
            $stat = $this->conexao->prepare("insert into seccoes (id_seccao, nome_seccao) values(null,?)");
                    
                    $stat->bindValue(1,$seccao->nomeSeccao);						
                    $stat->execute();
                    $this->conexao = null;													
                }catch(PDOException $e){
                    echo 'Erro ao cadastrar seccao';
                }
    }

    public function buscarSeccoes(){
		try{
			
			$stat = $this->conexao->query("select * from seccoes");
			$array = array();
			$array = $stat->fetchAll(PDO::FETCH_CLASS,'Seccao');
			$this->conexao = null;
			return $array;
			
		}catch(PDOException $e){
			echo 'Erro ao buscar seccoes';
		}
	}

}

?>