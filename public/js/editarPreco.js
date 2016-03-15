$(document).ready(function() {
	$('#inputPrecoModal').maskMoney();
	$('#modalEditarPreco').on('shown.bs.modal', function () {
	    $('#inputPrecoModal').focus();
	});
	$('#inputPrecoModal').keypress(function (e) {
		if (e.which == 13) {
			$('#salvarPreco').click();
		}
	});
	$( ".botaoEditar" ).click(function() {
		$( "#salvarPreco" ).text("Salvar");
		$( "#salvarPreco" ).prop("disabled", false);
		var idProduto = $(this).parent().prev().prev().prev().html();
		
		var nomeProduto = $(this).parent().prev().prev().html();
		if(nomeProduto.length >= 22){
			nomeProduto = nomeProduto.substring(0, 22);
			nomeProduto = nomeProduto.concat('...');
		}
		
		precoTD = $(this).parent().prev(); // Referência global para o <td> do preço do produto a ser editado
		
		var preco = precoTD.html();
		var preco = preco.replace(/(<([^>]+)>)/ig,"");
		var preco = preco.substring(3);
		
		$('#tituloModal').text(nomeProduto);
		$('#inputPrecoModal').val(preco);
		$('#idProdutoModal').val(idProduto);
	});
	$( "#salvarPreco" ).click(function() {
		$(this).prop("disabled", true);
		$(this).text("Salvando...");
		var idProduto = $('#idProdutoModal').val();
		var preco = $('#inputPrecoModal').val();
		
		$.ajax({
			type:"POST",
			data:{
    			idProduto:idProduto,
    			preco:preco
    		},
			url:"http://localhost/precodaconstrucao/public/admin/produtos/atualizarPrecoProduto",
			success:function(resposta){
				if(resposta.status == 'success'){
					precoTD.html('<b class="green">R$ ' + resposta.preco.toFixed(2) + '</b>');
					$('#modalEditarPreco').modal('toggle');
				}
				else{
					$( "#salvarPreco" ).text("Salvar");
					$( "#salvarPreco" ).prop("disabled", false);
					alert("Ocorreu um erro");
				}
			}
		});
	});
});