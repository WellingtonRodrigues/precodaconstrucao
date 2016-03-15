<!-- Conteúdo Home -->

<div class="row">

	<?php
		if(empty($data["produtos"])){?>
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
				<div class="alert alert-danger center" role="alert"><b>Ops!</b> Não foi encontrado nenhum produto!</div>
				<div class="col-md-3"></div>
			</div>
		<?php }
		foreach ($data["produtos"] as $produto){
	?>
	<div class="col-md-3">
		<div class="panel">
			<?php 
				  $urlImagem = 'img/produtos/' . $produto->getIdProduto() . '.jpg';
				  if(!file_exists($urlImagem)){
				  	$urlImagem = 'img/produtos/0.jpg';
				  }
				  echo '<input type="hidden" value = "' . $produto->getNomeProduto() . '">';
				  echo '<input type="hidden" value = ' . $produto->getIdProduto() . '>';
				  echo '<a href="javascript:;" class="thumbnail miniProduto" data-toggle="modal" data-target="#myModal">';
				  echo '<img src="' . $urlImagem . '" alt="Imagem produto"></a>';?>
			<div class="caption center">
				<div>
					<?php echo '<h4 class="tituloProduto">' . $produto->getNomeProduto() . '</h4>';?>
				</div>
				<?php 
				if($produto->getPrecoMinimoProduto() == $produto->getPrecoMaximoProduto()){
					echo '<p class="precoMinimo">por R$ ' . number_format($produto->getPrecoMinimoProduto(), 2) . '</p>';
				}
				else{
					echo '<p class="precoMinimo">de R$ ' . number_format($produto->getPrecoMinimoProduto(), 2) . '</p>';
					echo '<p class="precoMaximo">até R$ ' . number_format($produto->getPrecoMaximoProduto(), 2) . '</p>';
				}
				
				if($produto->getNumeroLojas() == 1){
					echo '<p class="text-info qtdLojas">em 1 loja</p>';
				}
				else{
					echo '<p class="text-info qtdLojas">em ' . $produto->getNumeroLojas() . ' lojas</p>';
				}
				?>
			</div>
		</div>
	</div>
	<?php }?>
</div>
<?php 
echo "<input type='hidden' id='categoriaAtiva' value='" . $data["idCategoria"] . "'>";
echo "<input type='hidden' id='keyAtiva' value='" . $data["key"] . "'>";
$itensPorPagina = $data["itensPorPagina"];
$qtdProdutos = $data["qtdProdutos"];
$page = $data["page"];
$semProdutos = false;
if(empty($data["produtos"])){
	$semProdutos = true;
}
unset($data);

$qtdPaginas = ceil($qtdProdutos/$itensPorPagina);

if(!$semProdutos){
?>
<div class="row text-center">
	<nav>
	  <ul class="pagination" id="listaPaginas">
	  <?php 
	    if($page==1){
	    	echo '<li id="botaoPaginaAnterior" class="disabled">';
	    	echo '<span aria-hidden="true">&laquo;</span>';
	    }
	    else{
			echo '<li id="botaoPaginaAnterior">';
			echo '<a class="botaoPagina" href="javascript:;" aria-label="Anterior"><span aria-hidden="true">&laquo;</span></a>';
		}
	  ?>
	    </li>
	    <?php 
	    	if($page==1){
	    		echo "<li class='active'><a class='botaoPagina' href='javascript:;'>1</a></li>";
	    	}
	    	else{
				echo "<li><a class='botaoPagina' href='javascript:;'>1</a></li>";
			}
	    	$cont = 2;
	    	while($cont <= $qtdPaginas){
				if($cont == $page){
	    			echo "<li class='active'><a class='botaoPagina' href='javascript:;'>$cont</a></li>";
	    		}
	    		else{
					echo "<li><a class='botaoPagina' href='javascript:;'>$cont</a></li>";
				}
	    		$cont++;
	    	}
	    ?>
	    <?php 
	    if($page==$qtdPaginas){
	    	echo '<li id="botaoProximaPagina" class="disabled">';
	    	echo '<span aria-hidden="true">&raquo;</span>';
	    }
	    else{
			echo '<li id="botaoProximaPagina">';
			echo '<a class="botaoPagina" href="javascript:;" aria-label="Proxima"><span aria-hidden="true">&raquo;</span></a>';
		}
	    ?>
	    </li>
	  </ul>
	</nav>
</div>
<?php }?>
<div id="modalProduto">
<?php 
include 'modalProduto.php';
?>
</div>

<script src="js/conteudo.js"></script>

<!-- Fim Conteúdo Home -->
