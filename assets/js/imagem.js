$('#mini_foto_new1').on('click', function() {
	$('#inputImage').trigger('click');
});



function readURL(input, id) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#'+id)
			.attr('src', e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}

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