<?php
class Produto{
	protected $idProduto;
	protected $nomeProduto;
	protected $idCategoria;
	
	function __construct($idProduto, $nomeProduto, $idCategoria){
		$this->idProduto = $idProduto;
		$this->nomeProduto = $nomeProduto;
		$this->idCategoria = $idCategoria;
	}
	
	function getIdProduto(){
		return $this->idProduto;
	}
	
	function getNomeProduto(){
		return $this->nomeProduto;
	}
	
	function getIdCategoria(){
		return $this->idCategoria;
	}
}