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
<link href="http://localhost/precodaconstrucao/public/css/adm.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<?php 
		include '../app/views/admin/common/navbarTopo.php';
	?>
	<div class="container">
		<ol class="breadcrumb">
		  <li><a href="http://localhost/precodaconstrucao/public/admin">Página Inicial</a></li>
		  <li class="active">Informações da Loja</li>
		</ol>
	</div>
	<?php 
		$loja = $data["loja"];
		$url = "http://localhost/precodaconstrucao/public/admin/lojas/editar/" . $loja->getIdLoja();
	?>
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			</div>
			<div class="col-sm-8">
				<ul class="nav nav-pills nav-justified">
				  <?php echo '<li role="presentation" class="active"><a href="' . $url . '">Nome da Loja</a></li>'; ?>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/lojas/logo">Logomarca</a></li>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/enderecos">Endereços</a></li>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/telefones">Telefones</a></li>
				</ul>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-3"></div>
			<div class="col-sm-6 well">
				<br>
				<?php 			
					echo '<form action="' . $url . '" method="post" class="form-horizontal" role="form">';
				?>
					<div class="form-group">
						<label class="control-label col-sm-3" for="email">Nome da loja:</label>
						<div class="col-sm-9">
							<?php
								echo '<input type="text" class="form-control" 
								name="nomeLoja" required="true" value = "' . $loja->getNomeLoja() . '">';
							?>
						</div>
					</div>
					<br>
					<div class="form-group">
						<div class="col-sm-3"></div>
						<div class="col-sm-3">
							<a href="http://localhost/precodaconstrucao/public/admin/lojas"
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