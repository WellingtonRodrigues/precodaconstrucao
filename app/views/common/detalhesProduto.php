<?php 
$produto = $data["produto"];
$precosLoja = $data["precosLoja"];
$urlImagemProduto = "img/produtos/" . $produto->getIdProduto() . ".jpg";
if(!file_exists($urlImagemProduto)){
	$urlImagemProduto = "img/produtos/0.jpg";
}
?>
<div class="container containerModalProduto">
	<div class="row">
		<div class="col-md-6 hg175">
			<?php echo '<img class="img-responsive center-block" src="' . $urlImagemProduto . '">'; ?>
		</div>
		<div class="col-md-6 descricaoProduto">
			<div class="infoProduto">
				<h4 id="tituloProduto"><?php echo $produto->getNomeProduto() ?></h4>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<hr>
			<div class="panel-success">
				<div class="panel-heading text-center">Disponível nas seguintes
					lojas:</div>
			</div><br>
			<div class="container containerModalProduto">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<div class="container containerModalProduto">
							<div class="row">
								<div class="row">
								<?php 
								foreach ($precosLoja as $precoLoja){
								?>
									<div class="col-sm-6 col-md-4">
										<div class="thumbnail">
											<?php 
											//echo '<a href="javascript:;" class="thumbnail miniProduto" data-toggle="modal" data-target="#myModal">';
				  							//echo '<img src="' . $urlImagem . '" alt="Imagem produto"></a>';
												echo '<a onclick="onClickLoja(' . $precoLoja->getIdLoja() . ');" class="thumbnail infoLoja" href="javascript:;" data-toggle="modal" data-target="#modalLoja"><img class = "img-responsive miniLoja" ';
												echo 'src="img/lojas/' . $precoLoja->getIdLoja() . '.jpg" alt="..."></a>';
											?>
											<div class="caption">
												<h4 class="precoMinimo text-center">R$ <?php echo number_format($precoLoja->getPreco(), 2) ?></h4>
											</div>
										</div>
									</div>
								<?php 
								}
								?>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
</div>