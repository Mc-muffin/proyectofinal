$('#guardar').on('click', function () {
	guardaryeditar();
})

function guardaryeditar(e) {
	//e.preventDefault();
	var formData = new FormData($("#formulario")[0]);
	formData.append("tipo_id", $('#tipo_id option:selected').val());

	for (var pair of formData.entries()) {
		console.log(pair[0] + ', ' + pair[1]);
	}

	$.ajax({
		url: Globals["BASE_URL"] + "/controller/Usuario.php?op=create",
		type: "POST",
		data: formData,
		async: false,
		contentType: false,
		processData: false,

		success: function (datos) {
			alert("Success!");
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Error: " + XMLHttpRequest); 
		}       
		
	});
}


