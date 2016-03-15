<?php
class ProdutoLoja{
	protected $idProduto;
	protected $nomeProduto;
	protected $precoProduto;
	protected $idCategoria;
	protected $idLoja;
	protected $nomeLoja;
	
	function __construct($idProduto, $nomeProduto, $precoProduto, $idCategoria, $idLoja, $nomeLoja){
		$this->idProduto = $idProduto;
		$this->nomeProduto = $nomeProduto;
		$this->precoProduto = $precoProduto;
		$this->idCategoria = $idCategoria;
		$this->idLoja = $idLoja;
		$this->nomeLoja = $nomeLoja;
	}
	
	function getIdProduto(){
		return $this->idProduto;
	}
	
	function getNomeProduto(){
		return $this->nomeProduto;
	}
	
	function getPrecoProduto(){
		return $this->precoProduto;
	}
	
	function getIdCategoria(){
		return $this->idCategoria;
	}
	
	function getIdLoja(){
		return $this->idLoja;
	}
	
	function getNomeLoja(){
		return $this->nomeLoja;
	}
}