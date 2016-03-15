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
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<ul class="nav nav-pills nav-justified">
				  <li role="presentation"><a href="http://localhost/precodaconstrucao/public/admin/produtos/">Meus Produtos</a></li>
				  <li role="presentation" class="active"><a href="http://localhost/precodaconstrucao/public/admin/produtos/add">Adicionar Produtos</a></li>
				</ul>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>
	
	<div class="container text-center">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8"><h1>Lista de Produtos</h1></div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	
	<br>
	
	<div class="container" id="listaProdutos">
		<div class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<table class="table" id="tabelaProdutos">
					<tr id="linhaCabeçalho"><th style="display:none;">ID</th><th>Nome</th>
					<th class="text-center">Adicionar à minha Loja</th></tr>
					<?php 
						foreach ($data["produtos"] as $produto){
							echo '<tr><td style="display:none;">' . $produto->getIdProduto() . '</td><td>' . $produto->getNomeProduto() . '</td>';
							echo '<td class="text-center">';
							if(!in_array($produto->getIdProduto(), $data["produtosLoja"])){
								echo '<a class="addProdutoLoja" href="javascript:;" data-toggle="modal" data-target="#modalAddProdutoLoja">';
								echo '<span class="glyphicon glyphicon-plus green" aria-hidden="true"></span></a></td></tr>';
							}
							else{
								echo 'Você já adicionou este item!</td></tr>';
							}
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
				<div class="col-sm-2 text-center">
					Não encontrou na lista?
					<a href="javascript:;" data-toggle="modal" data-target="#modalAddNovoProduto"
					class="btn btn-success btn-block" id="botaoNovoProduto" role="button">Novo Produto</a>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade bs-example-modal-sm" id="modalAddProdutoLoja">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title" id="tituloModal"></h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alertModal" class="text-center"></div>
	      	<div class="input-group" id="inputPreco">
			  <span class="input-group-addon" id="basic-addon1">R$ </span>
			  <input type="text" class="form-control" id="inputPrecoModal">
			  <input type="hidden" id="idProdutoModal">
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="salvar">Adicionar</button>
	      </div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
	<div class="modal fade bs-example-modal-sm" id="modalAddNovoProduto">
	  <div class="modal-dialog modal-sm">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title">Adicionar Novo Produto</h4>
	      </div>
	      <div class="modal-body">
	      	<div id="alertModalNovo" class="text-center"></div>
	      	<div id="camposAddProduto">
		      	<div class="form-group" id="inputNomeNovo">
				  <label for="nomeNovoProduto">Nome do Produto:</label>
				  <textarea class="form-control" rows="2" id="nomeNovoProduto"></textarea>
				</div>
				<div class="form-group" id="selectCategoria">
				  <label for="categoria">Selecione a Categoria:</label>
				  <select class="form-control" id="categoria">
				    <option>Selecione...</option>
				    <?php 
				    	foreach($data["categorias"] as $categoria){
					    	echo "<option value='" . $categoria->getIdCategoria() . "'> " . $categoria->getNomeCategoria() . "</option>";
						}
					?>
				  </select>
				</div>
		      	<div class="input-group" id="inputPrecoNovo">
				  <span class="input-group-addon" id="basic-addon1">R$ </span>
				  <input type="text" class="form-control" id="inputPrecoNovoModal">
				</div>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	        <button type="button" class="btn btn-primary" id="salvarNovo">Adicionar</button>
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
	<script src="http://localhost/precodaconstrucao/public/js/addProduto.js"></script>
	<script src="http://localhost/precodaconstrucao/public/js/jquery.maskMoney.js"></script>
</body>
</html>