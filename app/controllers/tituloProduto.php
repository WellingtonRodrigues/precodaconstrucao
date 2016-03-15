<?php

class TituloProduto extends Controller{
	public function index(){	
		if(isset($_POST["idProduto"])){
			$idProduto = $_POST["idProduto"];
		}
		require_once '../app/models/ProdutoBD.php';
		$bd = new ProdutoBD();
		echo $bd->getNomeProduto($idProduto);
		//TODO: Tratar id incorreto ou não cadastrado.
	}
}