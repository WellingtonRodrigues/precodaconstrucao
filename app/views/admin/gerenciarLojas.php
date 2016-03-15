<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Preço da Construção</title>

<!-- Bootstrap -->
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/adm.css" rel="stylesheet">

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
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1>Lojas</h1></div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	
	<br>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table class="table">
					<tr><th>ID</th><th>Nome</th>
					<th  class="text-center">Editar</th>
					<th  class="text-center">Excluir</th></tr>
					<?php 
						foreach ($data["lojas"] as $loja){
							echo '<tr><td>' . $loja->getIdLoja() . '</td><td>' . $loja->getNomeLoja() . '</td>';
							echo '<td class="text-center">';
							echo '<a href="http://localhost/precodaconstrucao/public/admin/lojas/editar/' . $loja->getIdLoja() . '">';
							echo '<span class="glyphicon glyphicon-pencil orange" aria-hidden="true"></span></a></td>';
							echo '<td class="text-center">';
							echo '<a href="http://localhost/precodaconstrucao/public/admin/lojas/remover/' . $loja->getIdLoja() . '">';
							echo '<span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a></td></tr>';
						}
					?>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-sm-5"></div>
				<div class="col-sm-2">
					<a href="http://localhost/precodaconstrucao/public/admin/lojas/add"
					class="btn btn-success btn-block" role="button">Nova Loja</a>
					<br>
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