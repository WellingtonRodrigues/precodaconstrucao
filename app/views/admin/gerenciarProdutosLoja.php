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
		  <li class="active">Gerenciar Produtos</li>
		</ol>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			</div>
			<div class="col-sm-4">
				<ul class="nav nav-pills nav-justified">
				  <li role="presentation" class="active"><a href="http://localhost/precodaconstrucao/public/admin/produtos/">Meus Produtos</a></li>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/produtos/add">Adicionar Produtos</a></li>
				</ul>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
	
	<div class="container text-center">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1>Meus Produtos</h1></div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	
	<br>
	
	<div class="container" id="listaProdutos">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table class="table">
					<tr><th style="display:none;">ID</th><th>Nome</th>
					<th  class="text-center">Preço</th>
					<th  class="text-center">Editar</th>
					<th  class="text-center">Remover</th></tr>
					<?php 
						foreach ($data["produtos"] as $produto){
							echo '<tr><td style="display:none;">' . $produto->getIdProduto() . '</td><td>' . $produto->getNomeProduto() . '</td>';
							echo '<td width="150" class="text-center">';
							echo '<b class="green">R$ ' . number_format($produto->getPrecoProduto(), 2) . '</b>';
							echo '</td><td class="text-center">';
							echo '<a class="botaoEditar" href="javascript:;" data-toggle="modal" data-target="#modalEditarPreco">';
							echo '<span class="glyphicon glyphicon-pencil orange" aria-hidden="true"></span></a></td>';
							echo '<td class="text-center">';
							echo '<a href="http://localhost/precodaconstrucao/public/admin/produtos/remover/' . $produto->getIdProduto() . '">';
							echo '<span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a></td></tr>';
						}
					?>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modalEditarPreco">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tituloModal"></h4>
	      </div>
	      <div class="modal-body">
	      	<div class="input-group">
			  <span class="input-group-addon" id="basic-addon1">R$ </span>
			  <input type="text" class="form-control" id="inputPrecoModal">
			  <input type="hidden" id="idProdutoModal">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="salvarPreco">Salvar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://localhost/precodaconstrucao/public/js/bootstrap.min.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/const.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/editarPreco.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/jquery.maskMoney.js"></script>
</body>
</html>