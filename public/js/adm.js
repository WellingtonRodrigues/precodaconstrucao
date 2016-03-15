$(document).ready(function() {
	$('#addUserForm').on('submit',function(){
	   if($('#idLoja').val()=="0"){
		   $('#alertErro').empty();
		   $('#alertErro').append('<div class="alert alert-danger" role="alert">Escolha uma loja!</div>');
	       return false;
	   }
	   else if($('#confSenhaUser').val()!=$('#senhaUser').val()){
		   $('#alertErro').empty();
		   $('#alertErro').append('<div class="alert alert-danger" role="alert">Senhas não conferem!</div>');
	       return false;
	   }
	   return true;
	});
});