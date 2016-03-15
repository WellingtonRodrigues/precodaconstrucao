<?php
class TelefoneBD{
	public function getTelefonesLoja($idLoja = 0){
		if($idLoja){
			require_once '../app/models/Telefone.php';
			include '../app/config/ConnectDB.php';
		
			$sql = "SELECT * FROM tbl_telefones WHERE idLoja = " . $idLoja;
				
			$resposta = mysql_query($sql, $conexao);
		
			$arrayTelefones = array();
		
			while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
				$telefone = new Telefone($row["idTelefone"], $row["idLoja"], $row["telefone"]);
				array_push($arrayTelefones, $telefone);
			}
		
			return $arrayTelefones;
		}
		return false;
	}
}