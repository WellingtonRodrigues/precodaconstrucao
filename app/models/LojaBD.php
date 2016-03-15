<?php

class LojaBD{
	public function lojaExiste($id){
		include '../app/config/ConnectDB.php';
	
		$sql = "SELECT * FROM tbl_lojas WHERE idLoja = " . $id;
	
		$resposta = mysql_query($sql, $conexao);
	
		if(mysql_num_rows($resposta) > 0){
			return true;
		}
		return false;
	}
	
	public function getLojas(){
		require_once '../app/models/Loja.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_lojas";
		$resposta = mysql_query($sql, $conexao);
		
		$arrayLojas = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			$loja = new Loja($row["idLoja"], $row["nomeLoja"]);		
			array_push($arrayLojas, $loja);
		}
		
		return $arrayLojas;
	}
	
	public function getLoja($idLoja){
		require_once '../app/models/Loja.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_lojas WHERE idLoja = " . $idLoja;
		$resposta = mysql_query($sql, $conexao);
		
		if($resposta){
			$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
			$loja = new Loja($row["idLoja"], $row["nomeLoja"]);
			return $loja;
		}
		return false;
	}
	
	public function addLoja($nomeLoja){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "INSERT INTO tbl_lojas VALUES ('', '" . $nomeLoja . "')";
		return mysql_query($sql, $conexao);
	}
	
	public function editarLoja($idLoja, $nomeLoja){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "UPDATE tbl_lojas SET nomeLoja = '" . $nomeLoja . "' WHERE idLoja = " . $idLoja;
		return mysql_query($sql, $conexao);
	}
	
	public function removerLoja($idLoja){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "DELETE FROM tbl_lojas WHERE idLoja = " . $idLoja;
		return mysql_query($sql, $conexao);
	}
	
	public function getProdutosLoja($idLoja){
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_produtos_loja WHERE idLoja = " . $idLoja;
		$resposta = mysql_query($sql, $conexao);
		
		$arrayProdutos = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			array_push($arrayProdutos, $row["idProduto"]);
		}
		
		return $arrayProdutos;
	}
	
	public function addProdutoLoja($idProduto, $idLoja, $preco){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "INSERT INTO tbl_produtos_loja VALUES (" . $idLoja . ", " . $idProduto . ", " . $preco . ")";
		return mysql_query($sql, $conexao);
	}
	
	public function removerProdutoLoja($idProduto, $idLoja){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "DELETE FROM tbl_produtos_loja WHERE idProduto = " . $idProduto . " AND idLoja = " . $idLoja;
		return mysql_query($sql, $conexao);
	}
	
	public function atualizarPrecoProduto($idProduto, $idLoja, $preco){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "UPDATE tbl_produtos_loja SET preco = " . $preco . " WHERE idProduto = " . $idProduto . " AND idLoja = " . $idLoja;
		return mysql_query($sql, $conexao);
	}
	
	public function getEnderecosLoja($idLoja){
		require_once '../app/models/Endereco.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_enderecos INNER JOIN tbl_cidades ON tbl_enderecos.idCidade = tbl_cidades.idCidade";
		$sql .= " WHERE idLoja = " . $idLoja . " ORDER BY idEndereco DESC";
		
		$resposta = mysql_query($sql, $conexao);
		
		$enderecos = array();
		
		while($row = mysql_fetch_array($resposta, MYSQL_ASSOC)){
			$endereco = new Endereco($row["idEndereco"], $row["idLoja"], $row["logradouro"], $row["numero"], $row["complemento"], $row["nomeCidade"], $row["siglaEstado"]);
			array_push($enderecos, $endereco);
		}
		return $enderecos;
	}
	
	public function addEndereco($idLoja, $logradouro, $numero, $complemento, $idCidade){
		include '../app/config/ConnectDB.php';
		
		$sql = "INSERT INTO tbl_enderecos VALUES ('', " . $idLoja . ", '" . $logradouro . "', '" . $numero . "', '" . $complemento . "', " . $idCidade . ")";
		
		if(mysql_query($sql, $conexao)){
			return mysql_insert_id();
		}
		return false;
	}
	
	public function editarEndereco($idEndereco, $logradouro, $numero, $complemento, $idCidade){
		include '../app/config/ConnectDB.php';
		
		$sql = "UPDATE tbl_enderecos SET logradouro = '" .  $logradouro . "', numero = '" . $numero . "', complemento = '" . $complemento . "', idCidade = " . $idCidade;
		$sql .= " WHERE idEndereco = " . $idEndereco;
		
		return mysql_query($sql, $conexao);
	}
	
	public function removerEndereco($idEndereco){
		include '../app/config/ConnectDB.php';
		
		$sql = "DELETE FROM tbl_enderecos WHERE idEndereco = " . $idEndereco;
		
		return mysql_query($sql, $conexao);
	}
	
	public function autenticarEndereco($idLoja, $idEndereco){
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * from tbl_enderecos WHERE idLoja = " . $idLoja . " AND idEndereco = " . $idEndereco;
		
		$resposta = mysql_query($sql, $conexao);
		
		if(mysql_num_rows($resposta) > 0){
			return true;
		}
		return false;
	}
}