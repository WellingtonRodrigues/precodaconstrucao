<?php

class Admin extends Controller{
	public function index(){
		require_once '../app/models/UserBD.php';
		require_once '../app/models/LojaBD.php';
		$bd = new UserBD();
		$bdLoja = new LojaBD();
		session_start();
		
		if(isset($_POST["email"]) && isset($_POST["senha"])){
			$email = $_POST["email"];
			$senha = $_POST["senha"];
			
			$user = $bd->autenticarUser($email, $senha);
			if($user){
				$_SESSION['email'] = $email;
				$_SESSION['senha'] = $senha;
				
				if($bd->isAdmin($user)){
					$this->view('admin/paineladm', array("user" => $user));
				}
				else{
					$nomeLoja = $bdLoja->getLoja($user->getIdLoja())->getNomeLoja();
					$this->view('admin/painel', array("user" => $user, "nomeLoja" => $nomeLoja));
				}
			}
			else{
				$this->view('admin/login', array("alert" => true));
			}
		}
		else if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
			$user = $bd->autenticarUser($_SESSION["email"], $_SESSION["senha"]);
			if($user){
				if($bd->isAdmin($user)){
					$this->view('admin/paineladm', array("user" => $user));
				}
				else{
					$nomeLoja = $bdLoja->getLoja($user->getIdLoja())->getNomeLoja();
					$this->view('admin/painel', array("user" => $user, "nomeLoja" => $nomeLoja));
				}
			}
			else{
				header("Location:http://localhost/precodaconstrucao/public/admin");
			}
		}
		else{
			$this->view('admin/login', array("alert" => false));
		}
	}
	
	public function lojas($op = 'index', $idLoja = 0){
		require_once '../app/models/UserBD.php';
		require_once '../app/models/LojaBD.php';
		
		$bdUser = new UserBD();
		$bdLoja = new LojaBD();
		
		session_start();

		if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
			$user = $bdUser->autenticarUser($_SESSION["email"], $_SESSION["senha"]);
			if($user && $bdUser->isAdmin($user)){
				if($op == 'index'){
					$lojas = $bdLoja->getLojas();
					$this->view('admin/gerenciarLojas', array("lojas" => $lojas));
				}
				else if($op == 'add'){
					if(isset($_POST["nomeLoja"])){
						$bdLoja->addLoja($_POST["nomeLoja"]);
						header("Location:http://localhost/precodaconstrucao/public/admin/lojas");
					}
					else{
						$this->view('admin/addLoja');
					}	
				}
				else if($op == 'remover'){
					if($idLoja != 0){
						$bdLoja->removerLoja($idLoja);
						header("Location:http://localhost/precodaconstrucao/public/admin/lojas");
					}
				}
				else if($op == 'editar'){
					if($idLoja != 0){
						if(isset($_POST["nomeLoja"])){
							$bdLoja->editarLoja($idLoja, $_POST["nomeLoja"]);
							header("Location:http://localhost/precodaconstrucao/public/admin/lojas");
						}
						else{
							$loja = $bdLoja->getLoja($idLoja);
							$this->view('admin/editarLoja', array("loja" => $loja));
						}
					}
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else if($user){
				if($op == 'editar'){
					// Editar informações da Loja - Usuário comum
					if($idLoja == $user->getIdLoja()){
						if(isset($_POST["nomeLoja"])){
							$bdLoja->editarLoja($idLoja, $_POST["nomeLoja"]);
							header("Location:http://localhost/precodaconstrucao/public/admin/lojas");
						}
						else{
							$loja = $bdLoja->getLoja($idLoja);
							$this->view('admin/editarLoja', array("loja" => $loja, "nomeLoja" => $loja->getNomeLoja()));
						}
					}
					else{
						header("Location:http://localhost/precodaconstrucao/public/admin");
					}
				}
				else if($op == 'logo'){
					$loja = $bdLoja->getLoja($user->getIdLoja());
					$this->view('admin/logomarcaLoja', array("loja" => $loja, "nomeLoja" => $loja->getNomeLoja()));
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else{
				header("Location:http://localhost/precodaconstrucao/public/admin");
			}
		}
		else{
			header("Location:http://localhost/precodaconstrucao/public/admin");
		}
	}

	public function enderecos($op = 'index', $idEndereco = 0){
		require_once '../app/models/UserBD.php';
		require_once '../app/models/LojaBD.php';
		
		$bdUser = new UserBD();
		$bdLoja = new LojaBD();
		
		session_start();
		
		if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
			$user = $bdUser->autenticarUser($_SESSION["email"], $_SESSION["senha"]);
			if($user && $bdUser->isAdmin($user)){
				if($op == 'index'){
					//TODO: Gerencia de Endereços - Admin
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else if($user){
				if($op == 'index'){
					$loja = $bdLoja->getLoja($user->getIdLoja());
					$nomeLoja = $loja->getNomeLoja();
					$enderecos = $bdLoja->getEnderecosLoja($user->getIdLoja());
					$this->view('admin/gerenciarEnderecosLoja', array("loja" => $loja, "nomeLoja" => $nomeLoja, "enderecos" => $enderecos));
				}
				else if($op=='addEndereco'){
					if(isset($_POST["logradouro"]) && isset($_POST["numero"]) && isset($_POST["complemento"]) && isset($_POST["cidade"])){
						if($_POST["logradouro"] != "" && $_POST["numero"] != ""){
							$idEndereco = $bdLoja->addEndereco($user->getIdLoja(), $_POST["logradouro"], $_POST["numero"], $_POST["complemento"], $_POST["cidade"]);
							if($idEndereco){
								header('Content-type: application/json');
								$resposta = array("status" => 'success', "id" => $idEndereco);
								echo json_encode($resposta);
							}
							else{
								header('Content-type: application/json');
								$resposta = array("status" => 'erro');
								echo json_encode($resposta);
							}
						}
						else{
							header('Content-type: application/json');
							$resposta = array("status" => 'erro');
							echo json_encode($resposta);
						}
					}
					else{
						header('Content-type: application/json');
						$resposta = array("status" => 'erro');
						echo json_encode($resposta);
					}
				}
				else if($op=='editarEndereco'){
					if(isset($_POST["idEndereco"]) && isset($_POST["logradouro"]) && isset($_POST["numero"]) && isset($_POST["complemento"]) && isset($_POST["cidade"])){
						if($bdLoja->autenticarEndereco($user->getIdLoja(), $_POST["idEndereco"])){
							if($_POST["logradouro"] != "" && $_POST["numero"] != ""){
								if($bdLoja->editarEndereco($_POST["idEndereco"], $_POST["logradouro"], $_POST["numero"], $_POST["complemento"], $_POST["cidade"])){
									header('Content-type: application/json');
									$resposta = array("status" => 'success');
									echo json_encode($resposta);
								}
								else{
									header('Content-type: application/json');
									$resposta = array("status" => 'erro');
									echo json_encode($resposta);
								}
							}
							else{
								header('Content-type: application/json');
								$resposta = array("status" => 'erro');
								echo json_encode($resposta);
							}
						}
						else{
							header('Content-type: application/json');
							$resposta = array("status" => 'erro');
							echo json_encode($resposta);
						}
					}
					else{
						header('Content-type: application/json');
						$resposta = array("status" => 'erro');
						echo json_encode($resposta);
					}
				}
				else if($op=='remover'){
					if($bdLoja->autenticarEndereco($user->getIdLoja(), $idEndereco)){
						$bdLoja->removerEndereco($idEndereco);
						header("Location:http://localhost/precodaconstrucao/public/admin/enderecos");
					}
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else{
				header("Location:http://localhost/precodaconstrucao/public/admin");
			}
		}
		else{
			header("Location:http://localhost/precodaconstrucao/public/admin");
		}
	}
	
	public function usuarios($op = 'index', $idUser = 0){
		require_once '../app/models/UserBD.php';
		require_once '../app/models/LojaBD.php';
		
		$bdUser = new UserBD();
		$bdLoja = new LojaBD();
		
		session_start();
		
		if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
			$user = $bdUser->autenticarUser($_SESSION["email"], $_SESSION["senha"]);
			if($user && $bdUser->isAdmin($user)){
				if($op == 'index'){
					$users = $bdUser->getUsers();
					$lojas = $bdLoja->getLojas();
					$this->view('admin/gerenciarUsers', array("users" => $users, "lojas" => $lojas));
				}
				else if($op == 'add'){
					if(isset($_POST["emailUser"]) && isset($_POST["senhaUser"]) && isset($_POST["confSenhaUser"]) && isset($_POST["idLoja"])){
						$email = $_POST["emailUser"];
						$senha = $_POST["senhaUser"];
						$confSenha = $_POST["confSenhaUser"];
						$idLoja = $_POST["idLoja"];
						
						if($senha==$confSenha){
							if(!$bdUser->userExiste($email)){
								if($bdLoja->lojaExiste($idLoja)){
									$bdUser->addUser($email, $senha, $idLoja);
									header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/");
								}
								else{
									//TODO: Encaminhar mensagens de erro para a view
									header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/add");
								}
							}
							else{
								//TODO: Encaminhar mensagens de erro para a view
								header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/add");
							}
						}
						else{
							header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/add");
						}
					}
					else{
						$lojas = $bdLoja->getLojas();
						$this->view('admin/addUser', array("lojas" => $lojas));
					}
				}
				else if($op == 'remover'){
					if($idUser != 0){
						$bdUser->removerUser($idUser);
						header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/");
					}
				}
				else if($op == 'editar'){
					if($idUser != 0){
						if(isset($_POST["emailUser"]) && isset($_POST["idLoja"])){
							$email = $_POST["emailUser"];
							$idLoja = $_POST["idLoja"];
							
							$user = $bdUser->getUserByEmail($email);
							if(!$bdUser->userExiste($email) || $user->getEmailUser() == $email){
								if($bdLoja->lojaExiste($idLoja)){
									$bdUser->editarUser($idUser, $email, $idLoja);
									header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/");
								}
								else{
									//TODO: Encaminhar mensagens de erro para a view
									header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/");
								}
							}
							else{
								//TODO: Encaminhar mensagens de erro para a view
								header("Location:http://localhost/precodaconstrucao/public/admin/usuarios/");
							}
						}
						else{
							$lojas = $bdLoja->getLojas();
							$user = $bdUser->getUser($idUser);
							$this->view('admin/editarUser', array("user" => $user, "lojas" => $lojas));
						}
					}
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else{
				header("Location:http://localhost/precodaconstrucao/public/admin");
			}
		}
		else{
			header("Location:http://localhost/precodaconstrucao/public/admin");
		}
	}
	
	public function produtos($op = 'index', $idProduto = 0){
		require_once '../app/models/UserBD.php';
		require_once '../app/models/ProdutoBD.php';
		require_once '../app/models/LojaBD.php';
		require_once '../app/models/CategoriaBD.php';
		
		$bdUser = new UserBD();
		$bdProduto = new ProdutoBD();
		$bdLoja = new LojaBD();
		$bdCategoria = new CategoriaBD();
		session_start();

		if(isset($_SESSION["email"]) && isset($_SESSION["senha"])){
			$user = $bdUser->autenticarUser($_SESSION["email"], $_SESSION["senha"]);
			if($user && $bdUser->isAdmin($user)){
				//TODO: Gerência de produtos (admin)
			}
			else if($user){
				if($op == 'index'){
					$produtosLoja = $bdProduto->getProdutosLoja($user->getIdLoja());
					$nomeLoja = $bdLoja->getLoja($user->getIdLoja())->getNomeLoja();
					$this->view('admin/gerenciarProdutosLoja', array("produtos" => $produtosLoja, "nomeLoja" => $nomeLoja));
				}
				else if($op == 'add'){
					// Add produto - Usuário comum
					if(isset($_POST["key"])){
						$produtos = $bdProduto->getProdutos(0, $_POST["key"]);
					}
					else{
						$produtos = $bdProduto->getProdutos();
					}
					$categorias = $bdCategoria->getCategorias();
					$produtosLoja = $bdLoja->getProdutosLoja($user->getIdLoja());
					$nomeLoja = $bdLoja->getLoja($user->getIdLoja())->getNomeLoja();
					$this->view('admin/addProdutoLoja', array("produtos" => $produtos, "produtosLoja" => $produtosLoja, "categorias" => $categorias, "nomeLoja" => $nomeLoja));
				}
				else if($op == 'remover'){
					// Remover Produto da Loja - Usuário Comum
					if($idProduto != 0){
						$bdLoja->removerProdutoLoja($idProduto, $user->getIdLoja());
					}
					header("Location:http://localhost/precodaconstrucao/public/admin/produtos");
				}
				else if($op == 'editar'){
					// Editar informações da Loja - Usuário comum
					if($idLoja == $user->getIdLoja()){
						if(isset($_POST["nomeLoja"])){
							$bdLoja->editarLoja($idLoja, $_POST["nomeLoja"]);
							header("Location:http://localhost/precodaconstrucao/public/admin/lojas");
						}
						else{
							$loja = $bdLoja->getLoja($idLoja);
							$this->view('admin/editarLoja', array("loja" => $loja, "nomeLoja" => $loja->getNomeLoja()));
						}
					}
					else{
						header("Location:http://localhost/precodaconstrucao/public/admin");
					}
				}
				else if($op == 'atualizarPrecoProduto'){
					if(isset($_POST["idProduto"]) && isset($_POST["preco"]) && is_numeric(str_replace(",", "", $_POST["preco"]))){
						$preco = (float)str_replace(",", "", $_POST["preco"]);
						$bdLoja->atualizarPrecoProduto($_POST["idProduto"], $user->getIdLoja(), $preco);
						header('Content-type: application/json');
						$resposta = array("status" => 'success', "preco" => $preco);
						echo json_encode($resposta);
					}
					else{
						//TODO: Encaminhar mensagens de erro
						header('Content-type: application/json');
						$resposta = array("status" => 'erro');
						echo json_encode($resposta);
					}
				}
				else if($op == 'addProdutoLoja'){
					if(isset($_POST["idProduto"]) && isset($_POST["preco"]) && is_numeric(str_replace(",", "", $_POST["preco"]))){
						if($bdProduto->produtoExiste($_POST["idProduto"])){
							$preco = (float)str_replace(",", "", $_POST["preco"]);
							$bdLoja->addProdutoLoja($_POST["idProduto"], $user->getIdLoja(), $preco);
							header('Content-type: application/json');
							$resposta = array("status" => 'success');
							echo json_encode($resposta);
						}
						else{
							//TODO: Encaminhar mensagens de erro
							header('Content-type: application/json');
							$resposta = array("status" => 'erro');
							echo json_encode($resposta);
						}
					}
					else{
						//TODO: Encaminhar mensagens de erro
						header('Content-type: application/json');
						$resposta = array("status" => 'erro');
						echo json_encode($resposta);
					}
				}
				else if($op == 'addNovoProduto'){
					if(isset($_POST["nome"]) && isset($_POST["preco"]) && isset($_POST["categoriaProduto"]) && is_numeric(str_replace(",", "", $_POST["preco"])) && $_POST["nome"]!=""){
						$preco = (float)str_replace(",", "", $_POST["preco"]);
						
						$idProdutoAdicionado = $bdProduto->addProduto($_POST["nome"], $_POST["categoriaProduto"]);
						$bdLoja->addProdutoLoja($idProdutoAdicionado, $user->getIdLoja(), $preco);
						
						header('Content-type: application/json');
						$resposta = array("status" => 'success');
						echo json_encode($resposta);
					}
					else{
						//TODO: Encaminhar mensagens de erro
						header('Content-type: application/json');
						$resposta = array("status" => 'erro');
						echo json_encode($resposta);
					}
				}
				else{
					header("Location:http://localhost/precodaconstrucao/public/admin");
				}
			}
			else{
				header("Location:http://localhost/precodaconstrucao/public/admin");
			}
		}
		else{
			header("Location:http://localhost/precodaconstrucao/public/admin");
		}
	}
	
	public function teste(){
		echo sha1("test2e");
	}
	
	public function logout(){
		session_start();
		session_destroy();
		header("Location:http://localhost/precodaconstrucao/public/admin/");
	}
}