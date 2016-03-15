<?php

class Home extends Controller{
	public function index(){
		require_once '../app/models/CategoriaBD.php';
		$bd = new CategoriaBD();
		$arrayCategorias = $bd->getCategorias();
		
		$dados = array("categorias" => $arrayCategorias);
		
		$this->view('home/index', $dados);
	}
}