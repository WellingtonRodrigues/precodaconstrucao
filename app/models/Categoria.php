<?php
class Categoria{
	protected $idCategoria;
	protected $nomeCategoria;
	
	function getIdCategoria(){
		return $this->idCategoria;
	}
	
	function getNomeCategoria(){
		return $this->nomeCategoria;
	}
	
	function setIdCategoria($idCategoria){
		$this->idCategoria = $idCategoria;
	}
	
	function setNomeCategoria($nomeCategoria){
		$this->nomeCategoria = $nomeCategoria;
	}
}