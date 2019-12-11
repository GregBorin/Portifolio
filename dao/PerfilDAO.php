<?php

include_once '../persistence/Conexao.php';

class PerfilDAO {

	private $conexao = null;

	public function PerfilDAO() {
		$this->conexao = Conexao::getInstancia();
	}

	public function cadastrarPerfil($perfil, $arrayRedes) {
		try {
			
			$insPerf = $this->conexao->prepare("insert into perfil (id_perfil, nome, sobrenome, foto, email, endereco, descricao) values (null,?,?,?,?,?,?)");

			$insPerf->bindValue(1, $perfil->nome);
			$insPerf->bindValue(2, $perfil->sobrenome);
			$insPerf->bindValue(3, $perfil->foto);
			$insPerf->bindValue(4, $perfil->email);
			$insPerf->bindValue(5, $perfil->endereco);
			$insPerf->bindValue(6, $perfil->descricao);
			$insPerf->execute();
			$idGerado = $this->conexao->lastInsertId();

			//$this->conexao = null;

			$this->cadastrarRedes($arrayRedes, $idGerado);
		} catch (PDOException $e) {
			echo 'Erro ao editar perfil';
		}
	}

	public function cadastrarRedes($arrayRedes, $idGerado) {
		try {

			$stat = $this->conexao->prepare("insert into redes (id_rede, id_perfil, nome_rede, url) values(null,?,?,?)");
			foreach ($arrayRedes as $ar) {
				$stat->bindValue(1, $idGerado);
				$stat->bindValue(2, $ar->nomeRede);
				$stat->bindValue(3, $ar->url);
				$stat->execute();
			}

			$this->conexao = null;
		} catch (PDOException $e) {
			echo 'Erro ao cadastrar rede';
		}
	}

	public function buscarPerfil(){

		try{
			
			function montaPerfil($idPerfil, $nome, $sobrenome, $foto, $email, $endereco, $descricao) {

				$perfil = new Perfil();
				$perfil->idPerfil = $idPerfil;
				$perfil->nome = $nome;
				$perfil->sobrenome = $sobrenome;
				$perfil->foto = $foto;
				$perfil->email = $email;
				$perfil->endereco = $endereco;
				$perfil->descricao = $descricao;
				
				return $perfil;
			}

			$queryPerfil = $this->conexao->query("select * from perfil");
			$perfilResponse = $queryPerfil->fetchAll(PDO::FETCH_FUNC,'montaPerfil');
			//$this->conexao = null;
			if(!empty($perfilResponse)){
				
				$idPerfilResponse = $perfilResponse[0]->idPerfil;
				$perfilResponse[0]->redes = $this->buscarRedes($idPerfilResponse);

				return $perfilResponse;
			}

			
			
		}catch(PDOException $e){
			echo 'Erro ao buscar perfil';
		}
	}

	public function buscarRedes($idPerfil){
		try{
			function montaRedes($idRede, $idPerfil, $nomeRede, $url){
				$redes = new Redes();
				$redes->idRede = $idRede;
				$redes->idPerfil = $idPerfil;
			 	$redes->nomeRede = $nomeRede;
			 	$redes->url = $url;
				
			 	return $redes;
			}

			$queryRedes = $this->conexao->query("select * from redes where redes.id_perfil = $idPerfil");
			$redesResponse = array();
			$redesResponse = $queryRedes->fetchAll(PDO::FETCH_FUNC,'montaRedes');
			$this->conexao = null;

			return $redesResponse;

		} catch(PDOException $e){
			echo 'Erro ao buscar redes';
		}
	}

	public function editarPerfil($perfil, $arrayRedes) {
		try {
			
			$insPerf = $this->conexao->prepare("update perfil set nome = ?, sobrenome = ?, foto = ?, email = ?, endereco = ?, descricao = ?  where id_perfil = ?");

			$insPerf->bindValue(1, $perfil->nome);
			$insPerf->bindValue(2, $perfil->sobrenome);
			$insPerf->bindValue(3, $perfil->foto);
			$insPerf->bindValue(4, $perfil->email);
			$insPerf->bindValue(5, $perfil->endereco);
			$insPerf->bindValue(6, $perfil->descricao);
			$insPerf->bindValue(7, $perfil->idPerfil);
			
			$insPerf->execute();
			$idPerfil = $perfil->idPerfil;

			//$this->conexao = null;
			if($arrayRedes > 0){
				//$redesResponse = $this->buscarRedes($idPerfil);
				//$saveNewRedes = new Redes();

				//$saveNewRedes = array_diff($arrayRedes, $redesResponse);

				$this->cadastrarRedes($arrayRedes, $idPerfil);
				//$this->editarRedes($arrayRedes, $idPerfil);
			}else { 
				var_dump($idPerfil);
				$this->deletarRede($idPerfil);
			}
		} catch (PDOException $e) {
			echo 'Erro ao editar perfil';
		}
	}

	public function editarRedes($arrayRedes, $idPerfil) {
		try {

			$stat = $this->conexao->prepare("update redes set id_perfil = ?, nome_rede = ?, url = ? where id_rede = ?");
			foreach ($arrayRedes as $ar) {
				$stat->bindValue(1, $idPerfil);
				$stat->bindValue(2, $ar->nomeRede);
				$stat->bindValue(3, $ar->url);
				$stat->bindValue(3, $ar->idRede);
				$stat->execute();
			}

			$this->conexao = null;
		} catch (PDOException $e) {
			echo 'Erro ao editar rede';
		}
	}

	public function deletarRede($idPerfil){
		try{
			$stat = $this->conexao->prepare("delete from redes where id_perfil = ?");
			
			$stat->bindValue(1,$idPerfil);
			
			$stat->execute();
			
			$this->conexao = null;
		}catch(PDOException $e){
			echo 'Erro ao deletar rede';
		}//fecha catch
	}

}

?>