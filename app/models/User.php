<?php

class User{
	protected $idUser;
	protected $emailUser;
	protected $senhaUser;
	protected $idLoja;
	
	function __construct($idUser, $emailUser, $senhaUser, $idLoja){
		$this->idUser = $idUser;
		$this->emailUser = $emailUser;
		$this->senhaUser = $senhaUser;
		$this->idLoja = $idLoja;
	}
	
	public function getIdUser(){
		return $this->idUser;
	}
	
	public function getEmailUser(){
		return $this->emailUser;
	}
	
	public function getSenhaUser(){
		return $this->senhaUser;
	}
	
	public function getIdLoja(){
		return $this->idLoja;
	}
}