$('#guardar').on('click',function(){
	// alert('prueba');
	
	guardaryeditar();
 })
 
 function guardaryeditar(e)
 {
	
	//e.preventDefault();//No se activará la acción predeterminada del evento
	//$("#guardar").prop("disabled",true);
	if ("#formulario" == "") {
		alert("ojoooo");
	 }
	 var formData = new FormData($("#formulario")[0]);
	formData.append("tipo_id", $('#tipo_id option:selected').val());

	 for (var pair of formData.entries()) {
		console.log(pair[0]+ ', ' + pair[1]); 
	} 
	
	 $.ajax({
		 url: Globals["BASE_URL"] + "/controller/Usuario.php?op=create",
		 type: "POST",
		 data: formData,
		 contentType: false,
		 processData: false,
    
		 success: function(datos)
		 {                    
			  /* bootbox.alert(datos);	          
			   mostrarform(false);
			   tabla.ajax.reload();*/
			   alert("exitooo")
		 }
 
	 });
	 
 }

 
 