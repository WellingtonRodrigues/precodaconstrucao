<?php

class DetalhesProduto extends Controller{
	public function index(){
		if(isset($_POST["idProduto"])){
			$idProduto = $_POST["idProduto"];
			require_once '../app/models/ProdutoBD.php';
			
			$bdProduto = new ProdutoBD();
			$produto = $bdProduto->getProduto($idProduto);
			
			$arrayPrecosLoja = $bdProduto->getPrecosProduto($idProduto);
			
			$this->view('common/detalhesProduto', array("produto" => $produto, "precosLoja" => $arrayPrecosLoja));
		}
	}
}