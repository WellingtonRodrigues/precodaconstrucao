<?php
class teste extends Controller{
	public function index(){
		if(!empty($_FILES)) {
			$file = array_shift($_FILES);
			var_dump($file);exit;
			$target_dir = "img/temp/";
			$imageFileType = pathinfo($target_dir . basename($file["name"]),PATHINFO_EXTENSION);
			$target_file = $target_dir . "loja1." . $imageFileType; // nome do arquivo a ser movido
			$target_file_final = $target_dir . "loja1.png"; // nome do arquivo após conversão para PNG

			$check = getimagesize($file["tmp_name"]);
			if(!$check) {
				header('Content-type: application/json');
				$mensagem = "Erro! O arquivo enviado não é uma imagem.";
				$resposta = array("status" => 'erro', "mensagem" => $mensagem);
				echo json_encode($resposta);
				exit;
			}
			
			// Check if file already exists
			if (file_exists($target_file)) {
				unlink($target_file);
			}
			
			// Check file size
			if ($file["size"] > 2000000) { //TODO: checar tamanho real
				header('Content-type: application/json');
				$mensagem = "Erro! O arquivo não pode ser maior que 2MBs.";
				$resposta = array("status" => 'erro', "mensagem" => $mensagem);
				echo json_encode($resposta);
				exit;
			}
			
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
				header('Content-type: application/json');
				$mensagem = "Erro! Somente os formatos JPG, JPEG e PNG são suportados.";
				$resposta = array("status" => 'erro', "mensagem" => $mensagem);
				echo json_encode($resposta);
				exit;
			}
			
			if (move_uploaded_file($file["tmp_name"], $target_file)) {
				//TODO: Converter para PNG
				header('Content-type: application/json');
				$resposta = array("status" => 'sucesso');
				echo json_encode($resposta);
				exit;
			}else {
				header('Content-type: application/json');
				$mensagem = "Ocorreu um erro inesperado. Tente novamente ou contate o administrador do sistema.";
				$resposta = array("status" => 'erro', "mensagem" => $mensagem);
				echo json_encode($resposta);
				exit;
			}
		}
		else{
			echo 'vazio';
			//$this->view("testes/upload");
		}
	}
	
	function crop(){
		if(file_exists('img/temp/loja1.jpg')){
			$this->view("testes/crop");
		}
	}
}