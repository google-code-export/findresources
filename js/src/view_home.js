function editUserData(){
	$('#userDataEditorFirstName').val(userData.nombre);
	$('#userDataEditorLastName').val(userData.apellido);
	$('#userDataEditorIdType').val(userData.idTipoDocumento);
	$('#userDataEditorIdNumber').val(userData.numeroDocumento);
	$('#userDataEditorPhone').val(userData.telefono);
	$('#userDataEditorCountry').val(userData.idPais);
	$('#userDataEditorRazonSocial').val(userData.razonSocial);
	$('#userDataEditorIdIndustria').val(userData.idIndustria);
	
	if (userData.idTipoUsuario == "E") {
		$('#userDataEditorAddress').val(userData.calle),
		$('#userDataEditorAddressNumber').val(userData.numero);
		$('#userDataEditorAddressPiso').val(userData.piso);
		$('#userDataEditorAddressDpto').val(userData.departamento);
		$('#userDataEditorLocalidad').val(userData.localidad);
		$('#userDataEditorProvincia').val(userData.idProvincia);
		$('#userDataEditorCantEmpleados').val(userData.cantEmpleados);
		$('#userDataEditorFechaInicio').val(userData.fechaInicio);
	}
	showPopUp('#userDataPopUp');
}


/*WINDOW ONLOAD*/
$(function(){

	$('#userDataPopUp .sendButton').click(function(){

		var usuario = {
			nombre: $('#userDataEditorFirstName').val(),
			apellido: $('#userDataEditorLastName').val(),
			razonSocial:$('#userDataEditorRazonSocial').val(),
			idIndustria:$('#userDataEditorIdIndustria').val(),
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
				if (userData.idTipoUsuario != "E") {
					alert("Se han guardado los datos");
					hidePopUp();
					//TODO this is so ugly we shouldnt reload all the page.
					window.location.reload();
				}
			},
			error: function(response){
				processError(response);
			}
		});
		
		if (userData.idTipoUsuario =="E") {
			var empresa = {
					calle: $('#userDataEditorAddress').val(),
					numero: $('#userDataEditorAddressNumber').val(),
					piso:$('#userDataEditorAddressPiso').val(),
					departamento:$('#userDataEditorAddressDpto').val(),
					localidad:$('#userDataEditorLocalidad').val(),
					provincia:$('#userDataEditorProvincia').val(),
					cantempleados:$('#userDataEditorCantEmpleados').val(),
					fechainicio:$('#userDataEditorFechaInicio').val(),
					idTipoUsuario: userData.idTipoUsuario
				};
			$.ajax({
				url: "home/setUsuarioEmpresa",
				global: false,
				type: "POST",
				data: {
					'empresa': JSON.stringify(empresa)
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
		}
	});

	return false;
});