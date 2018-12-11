

function edita(nome, nomeInput){
	$('#'+nome).on('click', function() {
		console.log("kkk");
		$('#'+nomeInput).prop('readonly', false);
		$('#'+nomeInput).focus();
	});
}

$('input').on('blur', function(){
	$('input').prop('readonly', true);
});