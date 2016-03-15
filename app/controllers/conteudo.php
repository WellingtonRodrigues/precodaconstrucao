<?php

class Conteudo extends Controller{
	public function index(){
		$idCategoria = 0;
		$key = 0;
		
		if(isset($_POST["idCategoria"])){
			$idCategoria = $_POST["idCategoria"];
		}
		
		if(isset($_POST["key"])){
			$key = $_POST["key"];
		}
		
		//TODO: Verificar se os valores enviados são válidos / evitar sql injection
		
		if(isset($_POST["page"]) && is_numeric($_POST["page"])){
			$page = $_POST["page"];
		}
		else{
			$page = 1;
		}
			
		require_once '../app/models/ProdutoBD.php';
		$bd = new ProdutoBD();
		$retorno = $bd->buscarProdutos($idCategoria, $key, $page);
		
		$dados["produtos"] = $retorno["produtos"];
		$dados["qtdProdutos"] = $retorno["qtdProdutos"];
		$dados["idCategoria"] = $idCategoria;
		$dados["key"] = $key;
		$dados["itensPorPagina"] = $retorno["itensPorPagina"];
		$dados["page"] = $page;
		
		unset($retorno);
		
		$this->view('common/conteudoHome', $dados);
	}
}