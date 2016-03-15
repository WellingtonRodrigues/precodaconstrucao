<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title>Preço da Construção</title>

<!-- Bootstrap -->
<link href="../../css/bootstrap.min.css" rel="stylesheet">
<link href="../../css/const.css" rel="stylesheet">

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
				<h1>Adicionar Nova Loja</h1>
				<br>
				<form action="http://localhost/precodaconstrucao/public/admin/lojas/add" method="post" class="form-horizontal" role="form">
					<div class="form-group">
						<label class="control-label col-sm-3" for="nomeLoja">Nome da loja:</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" name="nomeLoja" id="nomeLoja" required="true">
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<a href="http://localhost/precodaconstrucao/public/admin"
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
	<script src="js/bootstrap.min.js"></script>
	<script src="js/const.js"></script>
</body>
</html>