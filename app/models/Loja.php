<?php

class Loja{
	protected $idLoja;
	protected $nomeLoja;
	
	function __construct($idLoja, $nomeLoja){
		$this->idLoja = $idLoja;
		$this->nomeLoja = $nomeLoja;
	}
	
	public function getIdLoja(){
		return $this->idLoja;
	}
	
	public function getNomeLoja(){
		return $this->nomeLoja;
	}
}