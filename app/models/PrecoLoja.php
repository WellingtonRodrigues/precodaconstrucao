<?php
class PrecoLoja{
	protected $idLoja;
	protected $preco;
	
	function __construct($idLoja, $preco){
		$this->idLoja = $idLoja;
		$this->preco = $preco;
	}
	
	public function getIdLoja(){
		return $this->idLoja;
	}
	
	public function getPreco(){
		return $this->preco;
	}
}