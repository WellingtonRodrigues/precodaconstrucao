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
	<div class="container alert-senha">
		<?php 
		if($data["alert"]){?>
		<div class="row text-center">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<div class="alert alert-danger" role="alert"><b>Ops!</b> Usuário ou senha incorretos.</div>
			</div>
		</div>
		<?php }?>
	</div>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 well">
				<h1>Área Administrativa</h1>
				<br>
				<form action="http://localhost/precodaconstrucao/public/admin" method="post" class="form-horizontal" role="form">
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email:</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" required="true">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="senha">Senha:</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="senha" name="senha" required="true">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<a href="http://localhost/precodaconstrucao/public/"
								class="btn btn-default btn-block" role="button">Voltar</a>
						</div>
						<div class="col-sm-3">
							<button type="submit" class="btn btn-success btn-block">Entrar</button>
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/const.js"></script>
</body>
</html>