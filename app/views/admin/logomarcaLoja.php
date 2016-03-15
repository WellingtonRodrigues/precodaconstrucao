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
		  <li class="active">Logomarca</li>
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
				  <?php echo '<li role="presentation"><a href="' . $url . '">Nome da Loja</a></li>'; ?>
				  <li role="presentation" class="active"><a href="http://localhost/precodaconstrucao/public/admin/lojas/logo">Logomarca</a></li>
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
			<div class="col-sm-6">
				<?php 
					$urlImg = "img/lojas/" . $loja->getIdLoja() . ".jpg";
					if(!file_exists($urlImg)){
						$urlImg = "img/lojas/0.jpg";
					}
					echo '<img style="margin:0 auto;" class="img-responsive well" width="300px" alt="Logomarca da Loja" src="http://localhost/precodaconstrucao/public/' . $urlImg . '">';
				?>
				<br>
				<button type="button" class="btn btn-success" aria-label="Alterar Imagem" data-toggle="modal" data-target=".bs-example-modal-lg">
				  <span class="glyphicon glyphicon-camera" aria-hidden="true"></span> Alterar Imagem
				</button>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	

	<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="myModalLabel">Alterar Logomarca</h4>
	      </div>
	      <div class="modal-body text-center">

			<input type="file" id="myFile" name="myFile"/>
			<input type="button" id="upload" value="upload"/>
			<br>
			<progress id="prog" value="0" min="0" max="100"></progress>
			
	      </div>
	    </div>
	  </div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://localhost/precodaconstrucao/public/js/bootstrap.min.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/imgUpload.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/const.js"></script>
</body>
</html>