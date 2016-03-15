<?php

class UserBD{
	public function autenticarUser($email, $senha){
		require_once '../app/models/User.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_users WHERE emailUser = '" . $email . "' AND senhaUser = '" . sha1($senha) . "'";
		
		$resposta = mysql_query($sql, $conexao);
		
		if(mysql_num_rows ($resposta) > 0){
			$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
			$user = new User($row["idUser"], $row["emailUser"], $row["senhaUser"], $row["idLoja"]);
			return $user;
		}
		else{
			return false;
		}
	}
	
	public function isAdmin($user){
		if($user->getEmailUser()=="admin@localhost"){
			return true;
		}
		return false;
	}
	
	public function getUser($idUser){
		require_once '../app/models/User.php';
		include '../app/config/ConnectDB.php';
	
		$sql = "SELECT * FROM tbl_users WHERE idUser = " . $idUser;
		$resposta = mysql_query($sql, $conexao);
	
		if($resposta){
			$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
			$user = new User($row["idUser"], $row["emailUser"], $row["senhaUser"], $row["idLoja"]);
			return $user;
		}
		return false;
	}
	
	public function getUserByEmail($email){
		require_once '../app/models/User.php';
		include '../app/config/ConnectDB.php';
	
		$sql = "SELECT * FROM tbl_users WHERE emailUser = '" . $email . "'";
		$resposta = mysql_query($sql, $conexao);
	
		if($resposta){
			$row = mysql_fetch_array($resposta, MYSQL_ASSOC);
			$user = new User($row["idUser"], $row["emailUser"], $row["senhaUser"], $row["idLoja"]);
			return $user;
		}
		return false;
	}
	
	public function userExiste($email){
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_users WHERE emailUser = '" . $email . "'";
		
		$resposta = mysql_query($sql, $conexao);
		
		if(mysql_num_rows($resposta) > 0){
			return true;
		}
		return false;
	}
	
	public function getUsers(){
		require_once '../app/models/User.php';
		include '../app/config/ConnectDB.php';
		
		$sql = "SELECT * FROM tbl_users";
		$resposta = mysql_query($sql, $conexao);
		
		$arrayUsers = array();
		
		while ($row = mysql_fetch_array($resposta, MYSQL_ASSOC)) {
			$user = new User($row["idUser"], $row["emailUser"], $row["senhaUser"], $row["idLoja"]);
			array_push($arrayUsers, $user);
		}
		
		return $arrayUsers;
	}
	
	public function addUser($email, $senha, $idLoja){
		include '../app/config/ConnectDB.php';
		
		//TODO: Previnir SQL Injection
		
		$sql = "INSERT INTO tbl_users VALUES ('', '" . $email . "', '" . sha1($senha) . "', " . $idLoja . ")";
		return mysql_query($sql, $conexao);
	}
	
	public function editarUser($idUser, $emailUser, $idLoja){
		include '../app/config/ConnectDB.php';
	
		//TODO: Previnir SQL Injection
	
		$sql = "UPDATE tbl_users SET emailUser = '" . $emailUser . "'";
		$sql .= ", idLoja = " .$idLoja;
		$sql .= " WHERE idUser = " . $idUser;
		return mysql_query($sql, $conexao);
	}
	
	public function removerUser($idUser){
		include '../app/config/ConnectDB.php';
	
		//TODO: Previnir SQL Injection
	
		$sql = "DELETE FROM tbl_users WHERE idUser = " . $idUser;
		return mysql_query($sql, $conexao);
	}
}