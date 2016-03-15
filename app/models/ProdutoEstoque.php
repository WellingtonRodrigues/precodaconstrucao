<?php
class ProdutoEstoque{
	protected $idProduto;
	protected $nomeProduto;
	protected $precoMinimo;
	protected $precoMaximo;
	protected $idCategoria;
	protected $numeroLojas;
	
	function __construct($idProduto, $nomeProduto, $precoMinimo, $precoMaximo, $idCategoria, $numeroLojas){
		$this->idProduto = $idProduto;
		$this->nomeProduto = $nomeProduto;
		$this->precoMinimo = $precoMinimo;
		$this->precoMaximo = $precoMaximo;
		$this->idCategoria = $idCategoria;
		$this->numeroLojas = $numeroLojas;
	}
	
	function getIdProduto(){
		return $this->idProduto;
	}
	
	function getNomeProduto(){
		return $this->nomeProduto;
	}
	
	function getPrecoMinimoProduto(){
		return $this->precoMinimo;
	}
	
	function getPrecoMaximoProduto(){
		return $this->precoMaximo;
	}
	
	function getIdCategoria(){
		return $this->idCategoria;
	}
	
	function getNumeroLojas(){
		return $this->numeroLojas;
	}
}