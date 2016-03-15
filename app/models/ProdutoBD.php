<?php
class ProdutoBD{
	function getQtdProdutos($idCategoria = 0, $key = 0){
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT COUNT(*) FROM tbl_produtos WHERE idProduto IN (SELECT DISTINCT idProduto FROM tbl_produtos_loja)";
		
		if($idCategoria){
			$sql.= " AND idCategoria = " . $idCategoria;
		}
		
		if($key){
			$sql.= " AND nomeProduto like '%" . $key . "%'";
		}
		
		$resposta = mysql_query($sql, $conexao);
		$row = mysql_fetch_array($resposta);
		
		return $row[0];
	}
	
	function buscarProdutos($idCategoria = 0, $key = 0, $page = 1){
		require_once '../app/models/ProdutoEstoque.php';
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "SELECT * FROM tbl_produtos WHERE idProduto IN (SELECT DISTINCT idProduto FROM tbl_produtos_loja)";
		
		if($idCategoria){
			$sql.= " AND idCategoria = " . $idCategoria;
		}
		
		if($key){
			$sql.= " AND nomeProduto like '%" . $key . "%'";
		}
		
		$qtdProdutos = $this->getQtdProdutos($idCategoria, $key);
		
		$limit = 8;
		
		if($page != 1){
			$offset = ($page - 1 ) * $limit;
		}
		else{
			$offset = 0;
		}
		
		$sql .= " ORDER BY tbl_produtos.idProduto DESC LIMIT $limit OFFSET $offset";

		$resposta = mysql_query($sql, $conexao);
		
		$arrayProdutos = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			$precos = $this->getArrayPrecos($row["idProduto"]);
			$produto = new ProdutoEstoque($row["idProduto"], $row["nomeProduto"], min($precos), max($precos), $row["idCategoria"], count($precos));
			array_push($arrayProdutos, $produto);
		}
		
		$retorno["produtos"] = $arrayProdutos;
		$retorno["qtdProdutos"] = $qtdProdutos;
		$retorno["itensPorPagina"] = $limit;
		return $retorno;
	}
	
	function getProdutos($idCategoria = 0, $key = 0){
		require_once '../app/models/Produto.php';
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "SELECT * FROM tbl_produtos WHERE 1=1";
		
		if($idCategoria){
			$sql.= " AND idCategoria = " . $idCategoria;
		}
		
		if($key){
			$sql.= " AND nomeProduto like '%" . $key . "%'";
		}
		
		$sql.= " ORDER BY idProduto DESC";
		
		$resposta = mysql_query($sql, $conexao);
		
		$arrayProdutos = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			$produto = new Produto($row["idProduto"], $row["nomeProduto"], $row["idCategoria"]);
			array_push($arrayProdutos, $produto);
		}
		
		return $arrayProdutos;
	}
	
	function getProdutosLoja($idLoja){
		require_once '../app/models/ProdutoLoja.php';
		require_once '../app/models/LojaBD.php';
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$lojaBD = new LojaBD();
		$loja = $lojaBD->getLoja($idLoja);
		
		$sql = "SELECT * FROM tbl_produtos INNER JOIN tbl_produtos_loja ON tbl_produtos.idProduto = tbl_produtos_loja.idProduto";
		$sql .= " WHERE idLoja = " . $idLoja;
		
		$resposta = mysql_query($sql, $conexao);
		
		$arrayProdutos = array();
		
		while($row = mysql_fetch_array($resposta, MYSQL_ASSOC)){
			$produtoLoja = new ProdutoLoja($row["idProduto"], $row["nomeProduto"], $row["preco"], $row["idCategoria"], $idLoja, $loja->getNomeLoja());
			array_push($arrayProdutos, $produtoLoja);
		}
		
		return $arrayProdutos;
	}
	
	function getNomeProduto($idProduto){
		include '../app/config/ConnectDB.php';
		$sql = "SELECT nomeProduto FROM tbl_produtos WHERE idProduto = " . $idProduto;
		$resposta = mysql_query($sql, $conexao);
		
		$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
		if($row["nomeProduto"]){
			return $row["nomeProduto"];
		}
		return false;
	}
	
	function produtoExiste($idProduto){
		include '../app/config/ConnectDB.php';
		$sql = "SELECT * FROM tbl_produtos WHERE idProduto = " . $idProduto;
		$resposta = mysql_query($sql, $conexao);
		
		if(mysql_num_rows($resposta) > 0){
			return true;
		}
		return false;
	}
	
	function getProduto($idProduto){
		require_once '../app/models/Produto.php';
		include '../app/config/ConnectDB.php';
		$sql = "SELECT * FROM tbl_produtos WHERE idProduto = " . $idProduto;
		$resposta = mysql_query($sql, $conexao);
		
		if(mysql_num_rows($resposta) > 0){
			$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
			$produto = new Produto($row["idProduto"], $row["nomeProduto"], $row["idCategoria"]);
			return $produto;
		}
		return false;
	}
	
	function getPrecosProduto($idProduto){
		require_once '../app/models/PrecoLoja.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_produtos_loja WHERE idProduto = " . $idProduto;
		$resposta = mysql_query($sql, $conexao);
		
		$arrayPrecosProduto = array();
		
		if(mysql_num_rows($resposta) > 0){
			while($row = mysql_fetch_array($resposta, MYSQL_ASSOC)){
				$precoLoja = new PrecoLoja($row["idLoja"], $row["preco"]);
				array_push($arrayPrecosProduto, $precoLoja);
			}
			return $arrayPrecosProduto;
		}
		return false;
	}
	
	function getArrayPrecos($idProduto){
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT preco FROM tbl_produtos_loja WHERE idProduto = " . $idProduto;
		$resposta = mysql_query($sql, $conexao);
		
		$arrayPrecos = array();
		while($row = mysql_fetch_array($resposta, MYSQL_ASSOC)){
			array_push($arrayPrecos, $row["preco"]);
		}
		
		return $arrayPrecos;
	}
	
	function addProduto($nomeProduto, $idCategoria){
		include '../app/config/ConnectDB.php';

		//TODO: Previnir SQL Injection
		
		$sql = "INSERT INTO tbl_produtos VALUES ('', '" . $nomeProduto . "', " . $idCategoria . ")";

		mysql_query($sql, $conexao);
		return mysql_insert_id();
	}
}