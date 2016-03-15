$(document).ready(function() {
	$('#modalAddNovoEndereco').on('shown.bs.modal', function () {
		$('#alertModal').empty();
		$('#logradouro').val('');
		$('#numero').val('');
		$('#complemento').val('');
		$( "#camposAddEndereco" ).show();
	    $('#logradouro').focus();
	    $('#salvar').show();
	    $('#salvar').prop("disabled", false);
		$('#salvar').text("Adicionar");
	});
	$( "#salvar" ).click(function() {
		$(this).prop("disabled", true);
		$(this).text("Adicionando...");
		
		var logradouro = $('#logradouro').val();
		var numero = $('#numero').val();
		var complemento = $('#complemento').val();
		var cidade = $('#cidade').val();
		
		$.ajax({
			type:"POST",
			data:{
    			logradouro:logradouro,
    			numero:numero,
    			complemento:complemento,
    			cidade:cidade
    		},
			url:"http://localhost/precodaconstrucao/public/admin/enderecos/addEndereco",
			success:function(resposta){
				if(resposta.status == 'success'){
					$( "#salvar" ).hide();
					$( "#camposAddEndereco" ).hide();
					$('#alertModal').html('<div class="alert alert-success">Adicionado com Sucesso!</div>');
					$( "<tr class='success'><td style='display:none;'>" + resposta.id + "</td><td>" + logradouro + "</td><td class='text-center'>" + numero + "</td><td class='text-center'>" + complemento + "</td><td class='text-center'>Lavras</td><td class='text-center'><a class='botaoEditar' href='javascript:;' data-toggle='modal' data-target='#modalEditarEndereco'><span class='glyphicon glyphicon-pencil orange' aria-hidden='true'></span></a></td><td class='text-center'><a href='http://localhost/precodaconstrucao/public/admin/enderecos/remover/" + resposta.id + "'><span class='glyphicon glyphicon-remove red' aria-hidden='true'></span></a></td></tr></td></tr>" ).insertAfter( $( "#linhaCabeçalho" ) );
				}
				else{
					$( "#salvar" ).text("Adicionar");
					$( "#salvar" ).prop("disabled", false);
					$('#alertModal').html('<div class="alert alert-danger">Ocorreu um Erro!</div>');
					$('#logradouro').focus();
				}
			}
		});
	});
	
	$('#modalEditarEndereco').on('shown.bs.modal', function () {
		$('#ealertModal').empty();
		$("#ecamposAddEndereco").show();
	    $('#elogradouro').focus();
	    $('#esalvar').show();
	    $('#esalvar').prop("disabled", false);
		$('#esalvar').text("Salvar");
	});
	$("body").on('click', '.botaoEditar', function() {
		complementoTD = $(this).parent().prev().prev();
		numeroTD = $(this).parent().prev().prev().prev();
		logradouroTD = $(this).parent().prev().prev().prev().prev();
		
		$('#elogradouro').val(logradouroTD.text());
		$('#enumero').val(numeroTD.text());
		$('#ecomplemento').val(complementoTD.text());
	});
	$("body").on('click', '#esalvar', function() {
		$(this).prop("disabled", true);
		$(this).text("Salvando...");
		
		var logradouro = $('#elogradouro').val();
		var numero = $('#enumero').val();
		var complemento = $('#ecomplemento').val();
		var cidade = $('#ecidade').val();
		
		var idEndereco = logradouroTD.prev().text();
		
		$.ajax({
			type:"POST",
			data:{
				idEndereco:idEndereco,
    			logradouro:logradouro,
    			numero:numero,
    			complemento:complemento,
    			cidade:cidade
    		},
			url:"http://localhost/precodaconstrucao/public/admin/enderecos/editarEndereco",
			success:function(resposta){
				if(resposta.status == 'success'){
					$( "#esalvar" ).hide();
					$( "#ecamposAddEndereco" ).hide();
					$('#ealertModal').html('<div class="alert alert-success">Salvo com Sucesso!</div>');
					logradouroTD.text(logradouro);
					numeroTD.text(numero);
					complementoTD.text(complemento);
				}
				else{
					$( "#esalvar" ).text("Salvar");
					$( "#esalvar" ).prop("disabled", false);
					$('#ealertModal').html('<div class="alert alert-danger">Ocorreu um Erro!</div>');
					$('#elogradouro').focus();
				}
			}
		});
	});
});