<?php
class Telefone{
	protected $idTelefone;
	protected $idLoja;
	protected $telefone;
	
	function __construct($idTelefone, $idLoja, $telefone){
		$this->idTelefone = $idTelefone;
		$this->idLoja= $idLoja;
		$this->telefone = $telefone;
	}
	
	public function getIdTelefone(){
		return $this->idTelefone;
	}
	
	public function getIdLoja(){
		return $this->idLoja;
	}
	
	public function getTelefone(){
		return $this->telefone;
	}
}