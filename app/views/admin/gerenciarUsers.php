<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Preço da Construção</title>

<!-- Bootstrap -->
<link
	href="http://localhost/precodaconstrucao/public/css/bootstrap.min.css"
	rel="stylesheet">
<link href="http://localhost/precodaconstrucao/public/css/adm.css"
	rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<div class="container text-center">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<h1>Usuários</h1>
			</div>
			<div class="col-sm-1"></div>
		</div>
	</div>

	<br>

	<div class="container">
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-10">
				<table class="table">
					<tr>
						<th>ID</th>
						<th>Nome</th>
						<th>Loja</th>
						<th class="text-center">Editar</th>
						<th class="text-center">Excluir</th>
					</tr>
					<?php 
						require_once '../app/models/UserBD.php';
						$bdUser = new UserBD();
						foreach ($data["users"] as $user){
							echo '<tr><td>' . $user->getIdUser() . '</td><td>' . $user->getEmailUser() . '</td>';
							echo '<td>';
							foreach ($data["lojas"] as $loja){
								if($user->getIdLoja() == $loja->getIdLoja()){
									echo $loja->getNomeLoja();
									break;
								}
							}
							if ($bdUser->isAdmin ($user)) {
								echo '</td><td class="text-center"></td>';
								echo '<td class="text-center"></td></tr>';
							}
							else{
								echo '</td><td class="text-center">';
								echo '<a href="http://localhost/precodaconstrucao/public/admin/usuarios/editar/' . $user->getIdUser() . '">';
								echo '<span class="glyphicon glyphicon-pencil orange" aria-hidden="true"></span></a></td>';
								echo '<td class="text-center">';
								echo '<a href="http://localhost/precodaconstrucao/public/admin/usuarios/remover/' . $user->getIdUser() . '">';
								echo '<span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a></td></tr>';
							}
						}
					?>
				</table>
			</div>
			<div class="col-sm-1"></div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-2">
					<a
						href="http://localhost/precodaconstrucao/public/admin/usuarios/add"
						class="btn btn-success btn-block" role="button">Novo Usuário</a> <br>
					<a href="http://localhost/precodaconstrucao/public/admin/logout"
						class="btn btn-warning btn-block" role="button">Sair</a>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
	<script src="js/const.js"></script>
</body>
</html>