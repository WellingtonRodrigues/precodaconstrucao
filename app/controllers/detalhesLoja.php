<?php

class DetalhesLoja extends Controller{
	public function index(){
		if(isset($_POST["idLoja"])){
			$idLoja = $_POST["idLoja"];

			require_once '../app/models/LojaBD.php';
			require '../app/models/EnderecoBD.php';
			require '../app/models/TelefoneBD.php';
			
			$bdLoja = new LojaBD();
			$bdEndereco = new EnderecoBD();
			$bdTelefone = new TelefoneBD();
			
			$loja = $bdLoja->getLoja($idLoja);
			$enderecos = $bdEndereco->getEnderecosLoja($idLoja);
			$telefones = $bdTelefone->getTelefonesLoja($idLoja);
			
			$this->view('common/detalhesLoja', array("loja" => $loja, "enderecos" => $enderecos, "telefones" => $telefones));
		}
	}
}