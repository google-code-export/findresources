function editUserData(){
	$('#userDataEditorFirstName').val(userData.nombre);
	$('#userDataEditorLastName').val(userData.apellido);
	$('#userDataEditorIdType').val(userData.idTipoDocumento);
	$('#userDataEditorIdNumber').val(userData.numeroDocumento);
	$('#userDataEditorPhone').val(userData.telefono);
	$('#userDataEditorCountry').val(userData.idPais);
	showPopUp('#userDataPopUp');
}


/*WINDOW ONLOAD*/
$(function(){

	$('#userDataPopUp .sendButton').click(function(){

		var usuario = {
			nombre: $('#userDataEditorFirstName').val(),
			apellido: $('#userDataEditorLastName').val(),
			razonSocial:"",
			idIndustria:"",
			idTipoDocumento:$('#userDataEditorIdType').val(),
			numeroDocumento:$('#userDataEditorIdNumber').val(),
			telefono:$('#userDataEditorPhone').val(),
			idPais:$('#userDataEditorCountry').val(),
			idTipoUsuario: userData.idTipoUsuario
		};

		$.ajax({
			url: "home/setUsuario",
			global: false,
			type: "POST",
			data: {
				'usuario': JSON.stringify(usuario)
			},
			dataType: "json",
			async: true,
			success: function(response){
				alert("Se han guardado los datos");
				hidePopUp();
				//TODO this is so ugly we shouldnt reload all the page.
				window.location.reload();
			},
			error: function(response){
				processError(response);
			}
		});
		
	});

	return false;
});