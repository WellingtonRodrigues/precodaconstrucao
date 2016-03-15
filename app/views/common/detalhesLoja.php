<?php 
$loja = $data["loja"];
$enderecos = $data["enderecos"];
$telefones = $data["telefones"];

$urlLogoLoja = "img/lojas/" . $loja->getIdLoja() . ".jpg";
if(!file_exists($urlLogoLoja)){
	$urlLogoLoja = "img/lojas/0.jpg";
}
?>
<div class="container containerModalProduto">
	<div class="row">
		<div class="col-md-6">
			<?php echo '<img class="img-responsive logo-loja-modal center-block" src="' . $urlLogoLoja . '">'; ?>
		</div>
		<div class="col-md-6 center-block">
			<div class="informacoesLoja">
<?php 
	foreach($enderecos as $endereco){
		echo '<div class="alert alert-info">';
		echo '<p class="paragrafoEndereco lead">';
		echo $endereco->getLogradouro() . ", " . $endereco->getNumero();
		echo '</p>';
		echo '<p class="paragrafoEndereco">';
		if($endereco->getComplemento()){
			echo $endereco->getComplemento() . " - ";
		}
		echo $endereco->getNomeCidade() . ", " . $endereco->getSiglaEstado() . "</p>";
		echo '</div>';
	}
	
	foreach($telefones as $telefone){
		echo '<div class="alert alert-success">';
		echo '<p class="paragrafoEndereco lead">' . $telefone->getTelefone() . '</p>';
		echo '</div>';
	}
?>
			</div>
		</div>
	</div>
	<br>
	
<?php 
foreach($enderecos as $endereco){
	echo '<div class="col-md-12 well">';
	echo '<address>';
	echo $endereco->getLogradouro() . ", " . $endereco->getNumero() . ", ";
	echo $endereco->getNomeCidade() . ", " . $endereco->getSiglaEstado() . "</p>";
	echo '</address>';
	echo '</div>';
}
?>
</div>

<script>
$(document).ready(function(){
	$("address").each(function(){
	var embed ="<iframe width='100%' height='350' frameborder='0' scrolling='no' marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
	$(this).html(embed);
	});
});
</script>