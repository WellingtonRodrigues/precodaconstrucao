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
				  <?php echo '<li role="presentation"><a href="' . $url . '">Nome da Loja</a></li>'; ?>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/lojas/logo">Logomarca</a></li>
				  <li role="presentation" class="active"><a href="http://localhost/precodaconstrucao/public/admin/enderecos">Endereços</a></li>
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/telefones">Telefones</a></li>
				</ul>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<br>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table class="table">
					<tr  id="linhaCabeçalho"><th class="text-center" style="display:none;">ID</th><th>Logradouro</th>
					<th  class="text-center">Número</th>
					<th  class="text-center">Complemento</th>
					<th  class="text-center">Cidade</th>
					<th  class="text-center">Editar</th>
					<th  class="text-center">Remover</th></tr>
					<?php 
						foreach ($data["enderecos"] as $endereco){
							echo '<tr><td class="text-center" style="display:none;">' . $endereco->getIdEndereco() . '</td><td>' . $endereco->getLogradouro() . '</td>';
							echo '<td class="text-center">' . $endereco->getNumero() . '</td>';
							echo '<td class="text-center">' . $endereco->getComplemento() . '</td>';
							echo '<td class="text-center">' . $endereco->getNomeCidade() . '</td>';
							echo '<td class="text-center">';
							echo '<a class="botaoEditar" href="javascript:;" data-toggle="modal" data-target="#modalEditarEndereco">';
							echo '<span class="glyphicon glyphicon-pencil orange" aria-hidden="true"></span></a></td>';
							echo '<td class="text-center">';
							echo '<a href="http://localhost/precodaconstrucao/public/admin/enderecos/remover/' . $endereco->getIdEndereco() . '">';
							echo '<span class="glyphicon glyphicon-remove red" aria-hidden="true"></span></a></td></tr>';
						}
					?>
				</table>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4 text-center">
				<a href="javascript:;" data-toggle="modal" data-target="#modalAddNovoEndereco"
				class="btn btn-success btn-block" id="botaoNovoEndereco" role="button">Adicionar Endereço</a>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
	<div class="modal fade bs-example-modal-sm" id="modalAddNovoEndereco">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Adicionar Endereço</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alertModal" class="text-center"></div>
	      	<div id="camposAddEndereco">
	      		<div class="form-group">
				  <label for="logradouro">Logradouro:</label>
				  <textarea class="form-control" rows="2" id="logradouro"></textarea>
				</div>
				<div class="form-group">
				  <label for="numero">Número:</label>
				  <input type="text" class="form-control"id="numero">
				</div>
				<div class="form-group">
				  <label for="complemento">Complemento:</label>
				  <textarea class="form-control" rows="2" id="complemento"></textarea>
				</div>
				<div class="form-group">
				  <label for="cidade">Cidade:</label>
				  <select class="form-control" id="cidade">
				  	<option value="1">Lavras</option>
				  </select>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="salvar">Adicionar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade bs-example-modal-sm" id="modalEditarEndereco">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Editar Endereço</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="ealertModal" class="text-center"></div>
	      	<div id="ecamposAddEndereco">
	      		<div class="form-group">
				  <label for="logradouro">Logradouro:</label>
				  <textarea class="form-control" rows="2" id="elogradouro"></textarea>
				</div>
				<div class="form-group">
				  <label for="numero">Número:</label>
				  <input type="text" class="form-control"id="enumero">
				</div>
				<div class="form-group">
				  <label for="complemento">Complemento:</label>
				  <textarea class="form-control" rows="2" id="ecomplemento"></textarea>
				</div>
				<div class="form-group">
				  <label for="cidade">Cidade:</label>
				  <select class="form-control" id="ecidade">
				  	<option value="1">Lavras</option>
				  </select>
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="esalvar">Salvar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script
		src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://localhost/precodaconstrucao/public/js/bootstrap.min.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/addEndereco.js"></script>
</body>
</html>