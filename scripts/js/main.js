$(document).ready(function(){
	$(".datetimepicker").datetimepicker({
		language: "pt-BR",
		picktime: false
	});
	$(".data").mask("99/99/9999");
	$("#cpf").mask("999.999.999-99");
	$("#cnpj").mask("99.999.999/9999-99");
});