<?php
class ProdutoGeral{
	protected $produto;
	protected $arrayPrecoLojas;
	
	function __construct($produto){
		$this->produto = $produto;
		$arrayPrecoLojas = array();
	}
	
	function getProduto(){
		return $this->produto;
	}
	
	function getArrayPrecoLojas(){
		return $this->arrayPrecoLojas;
	}
	
	function addPrecoLoja($precoLoja){
		array_push($this->arrayPrecoLojas, $precoLoja);
	}
}