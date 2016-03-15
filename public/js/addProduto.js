$(document).ready(function() {
	$('#inputPrecoNovoModal').maskMoney();
	$('#modalAddNovoProduto').on('shown.bs.modal', function () {
	    $('#nomeNovoProduto').focus();
	});
	$('#inputPrecoNovoModal').keypress(function (e) {
		if (e.which == 13) {
			$('#salvarNovo').click();
		}
	});
	$('#nomeNovoProduto').keypress(function (e) {
		if (e.which == 13) {
			$('#salvarNovo').click();
		}
	});
	$( "#botaoNovoProduto" ).click(function() {
		$('#alertModalNovo').empty();
		$( "#inputPrecoNovoModal" ).val('');
		$( "#nomeNovoProduto" ).val('');
		$( "#camposAddProduto" ).show();
		$( "#salvarNovo" ).show();
		$( "#salvarNovo" ).text("Adicionar");
		$( "#salvarNovo" ).prop("disabled", false);
	});
	$( "#salvarNovo" ).click(function() {
		$(this).prop("disabled", true);
		$(this).text("Adicionando...");
		
		var preco = $('#inputPrecoNovoModal').val();
		var nomeProduto = $('#nomeNovoProduto').val();
		var categoriaProduto = $('#categoria').val();
		
		$.ajax({
			type:"POST",
			data:{
				nome:nomeProduto,
    			preco:preco,
    			categoriaProduto:categoriaProduto
    		},
			url:"http://localhost/precodaconstrucao/public/admin/produtos/addNovoProduto",
			success:function(resposta){
				if(resposta.status == 'success'){
					$( "#salvarNovo" ).hide();
					$( "#camposAddProduto" ).hide();
					$('#alertModalNovo').html('<div class="alert alert-success">Adicionado com Sucesso!</div>');
					$( "<tr class='success'><td style='display:none;'></td><td>" + nomeProduto + "</td><td class='text-center'>Você já adicionou este item!</td></tr>" ).insertAfter( $( "#linhaCabeçalho" ) );
				}
				else{
					$( "#salvarNovo" ).text("Adicionar");
					$( "#salvarNovo" ).prop("disabled", false);
					$('#alertModalNovo').html('<div class="alert alert-danger">Ocorreu um Erro!</div>');
					$('#nomeNovoProduto').focus();
				}
			}
		});
	});
	
	$('#inputPrecoModal').maskMoney();
	$('#modalAddProdutoLoja').on('shown.bs.modal', function () {
	    $('#inputPrecoModal').focus();
	});
	$('#inputPrecoModal').keypress(function (e) {
		if (e.which == 13) {
			$('#salvar').click();
		}
	});
	$( ".addProdutoLoja" ).click(function() {
		tdBotaoAdd = $(this).parent(); // Referência global para TD do botão AddProdutoLoja
		$('#alertModal').empty();
		$( "#inputPreco" ).show();
		$( "#salvar" ).show();
		$( "#salvar" ).text("Adicionar");
		$( "#salvar" ).prop("disabled", false);
		var idProduto = $(this).parent().prev().prev().html();
		
		var nomeProduto = $(this).parent().prev().html();
		if(nomeProduto.length >= 22){
			nomeProduto = nomeProduto.substring(0, 22);
			nomeProduto = nomeProduto.concat('...');
		}
		
		$('#tituloModal').text(nomeProduto);
		$('#idProdutoModal').val(idProduto);
	});
	$( "#salvar" ).click(function() {
		$(this).prop("disabled", true);
		$(this).text("Adicionando...");
		var idProduto = $('#idProdutoModal').val();
		var preco = $('#inputPrecoModal').val();
		
		$.ajax({
			type:"POST",
			data:{
    			idProduto:idProduto,
    			preco:preco
    		},
			url:"http://localhost/precodaconstrucao/public/admin/produtos/addProdutoLoja",
			success:function(resposta){
				if(resposta.status == 'success'){
					$( "#salvar" ).hide();
					$( "#inputPreco" ).hide();
					$('#alertModal').html('<div class="alert alert-success">Adicionado com Sucesso!</div>');
					tdBotaoAdd.text('Você já adicionou este item!');
				}
				else{
					$( "#salvar" ).text("Adicionar");
					$( "#salvar" ).prop("disabled", false);
					$('#alertModal').html('<div class="alert alert-danger">Ocorreu um Erro!</div>');
					$('#inputPrecoModal').focus();
				}
			}
		});
	});
});