<?php
class CategoriaBD{
	function getCategorias(){
		require_once '../app/models/Categoria.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_categorias";
		$resposta = mysql_query($sql, $conexao);
		
		$arrayCategorias = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			$categoria = new Categoria();
			$categoria->setIdCategoria($row["idCategoria"]);
			$categoria->setNomeCategoria($row["nomeCategoria"]);
			
			array_push($arrayCategorias, $categoria);
		}
		
		return $arrayCategorias;
	}
}