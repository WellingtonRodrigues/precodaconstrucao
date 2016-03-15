<?php

class Endereco{
	protected $idEndereco;
	protected $idLoja;
	protected $logradouro;
	protected $numero;
	protected $complemento;
	protected $nomeCidade;
	protected $siglaEstado;
	
	function __construct($idEndereco, $idLoja, $logradouro, $numero, $complemento, $nomeCidade, $siglaEstado){
		$this->idEndereco = $idEndereco;
		$this->idLoja = $idLoja;
		$this->logradouro = $logradouro;
		$this->numero = $numero;
		$this->complemento = $complemento;
		$this->nomeCidade = $nomeCidade;
		$this->siglaEstado = $siglaEstado;
	}
	
	public function getIdEndereco(){
		return $this->idEndereco;
	}
	
	public function getIdLoja(){
		return $this->idLoja;
	}
	
	public function getLogradouro(){
		return $this->logradouro;
	}
	
	public function getNumero(){
		return $this->numero;
	}
	
	public function getComplemento(){
		return $this->complemento;
	}
	
	public function getNomeCidade(){
		return $this->nomeCidade;
	}
	
	public function getSiglaEstado(){
		return $this->siglaEstado;
	}
}