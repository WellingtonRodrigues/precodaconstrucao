$(document).ready(function() {
	$(".loader").fadeIn("fast");
	$.ajax({
		type:"POST",
		url:"http://localhost/precodaconstrucao/public/conteudo",
		success:function(a){
			$("#produtos" ).empty();
			$("#produtos" ).append(a);
			$(".loader").fadeOut("fast");
		}
	});
	
	$(".LiCategoria").click(function() {     
        $(".loader").fadeIn("fast");
        var idCategoria = $(this).val();

        $.ajax({
    		type:"POST",
    		data:{
    			idCategoria:idCategoria
    		},
    		url:"http://localhost/precodaconstrucao/public/conteudo",
    		success:function(a){
    			$("#produtos" ).empty();
    			$("#produtos" ).append(a);
    			$(".loader").fadeOut("fast");
    		}
    	});
    });
	
	$("#buttonBusca").click(function() {     
        $(".loader").fadeIn("fast");
        var key = $("#inputBusca").val();

        $.ajax({
    		type:"POST",
    		data:{
    			key:key
    		},
    		url:"http://localhost/precodaconstrucao/public/conteudo",
    		success:function(a){
    			$("#produtos" ).empty();
    			$("#produtos" ).append(a);
    			$(".loader").fadeOut("fast");
    		}
    	});
    });
	
	$("#inputBusca").keyup(function(event){
	    if(event.keyCode == 13){
	        $("#buttonBusca").click();
	    }
	});
	
	$("#upload").on("click", function(){
		$("#myFile").upload("http://localhost/precodaconstrucao/public/teste", function(success){
			alert(success);
		}, $("#prog"));
	});
});