<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Preço da Construção</title>

<!-- Bootstrap -->
<link href="http://localhost/precodaconstrucao/public/css/bootstrap.min.css" rel="stylesheet">
<link href="http://localhost/precodaconstrucao/public/css/const.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

	<div class="container">
		<div class="row text-center">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 well">
				<div id="alertErro"></div>
				<h1>Editar Usuário</h1>
				<br>
				<?php 
					$user = $data["user"];
					$url = "http://localhost/precodaconstrucao/public/admin/usuarios/editar/" . $user->getIdUser();
				echo '<form
					action="' . $url . '"
					method="post" class="form-horizontal" role="form" id="addUserForm">';
				?>
					<div class="form-group">
						<label class="control-label col-sm-4" for="emailUser">Email:</label>
						<div class="col-sm-8">
							<?php echo '<input type="email" class="form-control" name="emailUser"
								id="emailUser" required="true" value="' . $user->getEmailUser() . '">';?>
						</div>
					</div>			
					<div class="form-group">
						<label for="idLoja" class="control-label col-sm-4">Loja:</label>
						<div class="col-sm-8">
							<select class="form-control" id="idLoja" name="idLoja">
								<option value="0">Selecione...</option>
									<?php 
										foreach ($data["lojas"] as $loja){
											echo '<option value="' . $loja->getIdLoja() . '">';
											echo $loja->getNomeLoja();
											echo '</option>';
										}
									?>
							</select>
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<a
								href="http://localhost/precodaconstrucao/public/admin/usuarios/"
								class="btn btn-default btn-block" role="button">Voltar</a>
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-success btn-block">Salvar</button>
						</div>
						<div class="col-sm-3"></div>
					</div>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://localhost/precodaconstrucao/public/js/bootstrap.min.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/adm.js"></script>
</body>
</html>