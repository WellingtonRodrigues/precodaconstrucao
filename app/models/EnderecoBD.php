<?php
class EnderecoBD{
	function getEnderecosLoja($idLoja = 0){
		if($idLoja){
			require_once '../app/models/Endereco.php';
			include '../app/config/ConnectDB.php';
		
			$sql = "SELECT * FROM tbl_enderecos INNER JOIN tbl_cidades ";
			$sql .= "ON tbl_enderecos.idCidade = tbl_cidades.idCidade ";
			$sql .= "WHERE idLoja = " . $idLoja;
			
			$resposta = mysql_query($sql, $conexao);
		
			$arrayEnderecos = array();
		
			while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
				$endereco = new Endereco($row["idEndereco"], $row["idLoja"], $row["logradouro"], 
										 $row["numero"], $row["complemento"], $row["nomeCidade"], $row["siglaEstado"]);
				array_push($arrayEnderecos, $endereco);
			}
		
			return $arrayEnderecos;
		}
		return false;
	}
}