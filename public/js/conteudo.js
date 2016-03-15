$(document).ready(function() {
	$(".miniProduto").click(function() {
		idProduto = $(this).prev('input').attr('value');
		nomeProduto = $(this).prev('input').prev().attr('value');
		
		$(".modal-title" ).empty();
		$(".modal-title" ).append(nomeProduto);
		$(".loaderProduto").fadeIn("fast");
		
		$.ajax({
			type:"POST",
			data:{
    			idProduto:idProduto
    		},
			url:"http://localhost/precodaconstrucao/public/detalhesProduto",
			success:function(a){
				$(".conteudoModalProduto" ).empty();
				$(".conteudoModalProduto" ).append(a);
				$(".loaderProduto").fadeOut("fast");
			}
		});
    });	
	
	$(".botaoPagina").click(function() {
		$(".loader").fadeIn("fast");
		var clicado = $(this).text();
		var idCategoria = $( "#categoriaAtiva" ).val();
		var key = $( "#keyAtiva" ).val();
		var pageAtual = $( "#listaPaginas" ).find( ".active" ).text();
		
		if($.isNumeric(clicado)){
			var page = clicado;
		}
		else{
			if($(this).attr("aria-label")=='Proxima'){
				var page = parseInt(pageAtual) + 1;
			}
			else{
				var page = parseInt(pageAtual) - 1;
			}
		}
		
		$.ajax({
    		type:"POST",
    		data:{
    			key:key,
    			idCategoria:idCategoria,
    			page:page
    		},
    		url:"http://localhost/precodaconstrucao/public/conteudo",
    		success:function(a){
    			$("#produtos" ).empty();
    			$("#produtos" ).append(a);		
    			
    			$(".loader").fadeOut("fast");
    		}
    	});
	});
});

function onClickLoja(idLoja){
	$(".loaderLoja").fadeIn("fast");
	$.ajax({
		type:"POST",
		data:{
			idLoja:idLoja
		},
		url:"http://localhost/precodaconstrucao/public/detalhesLoja",
		success:function(a){
			$("#conteudoLoja" ).empty();
			$("#conteudoLoja" ).append(a);		
			
			$(".loaderLoja").fadeOut("fast");
		}
	});
}