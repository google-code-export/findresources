$(function() {

	$("#usuariosGrid").flexigrid({
		url: 'admin_usuarios/getUsuariosExpertosGrid',
		dataType: 'json',
		colModel : [
			{display: 'E mail', name : 'usuario', width : 150, sortable : false, align: 'center'},
			{display: 'Nombre', name : 'nombre', width : 150, sortable : false, align: 'center'},
			{display: 'Conraseña', name : 'password', width : 150, sortable : false, align: 'center'},
			{display: 'Dar de baja', name : 'baja', width : 150, sortable : false, align: 'center'},
			{display: 'Editar Contraseña', name : 'edit', width : 150, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: false,
		title: 'Usuarios Expertos',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 850,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	return false;
});


/**
 * 
 * agrega un usuario al comienzo de la tabla.-
 * 
 */
function addNewUser(){
	$('#userEditorFirstName').val("");
	$('#userEditorLastName').val("");
	$('#userEditorEmail').val("");
	$('#userEditorPassword').val("");
	$('#userEditorPasswordConfirm').val("");
	$('#userEditorIdType').val("");
	$('#userEditorIdNumber').val("");
	$('#userEditorPhone').val("");
	$('#userEditorCountry').val("");
	
	showPopUp('#userPopUp');
	
}

function removeUser(usuario){
	var r=confirm("Esta seguro que desea eliminar el usuario seleccionado?");
	if (r==true)
	  {
		$.ajax({
			url: "admin_usuarios/bajaUsuario",
			global: false,
			type: "POST",
			data: {
				'usuario': usuario
			},
			dataType: "json",
			async: true,
			success: function(response){
				alert("Se ha eliminado el usuario");
				//TODO this is so ugly we shouldnt reload all the page.
				window.location.reload();
			},
			error: function(response){
				processError(response);
			}
		});
	  }
	
}

function performEditUserData(){
	if($('#userEditorPassword').val() != $('#userEditorPasswordConfirm').val()){
		alert("Las contraseñas deben ser iguales");
		return;
	}
	
	var usuario = {
		nombre: $('#userEditorFirstName').val(), // null = nuevo
		apellido: $('#userEditorLastName').val(),
		email: $('#userEditorEmail').val(), 
		clave: $('#userEditorPassword').val(),
		tipo_documento: $('#userEditorIdType').val(),
		numero_documento: $('#userEditorIdNumber').val(),
		telefono: $('#userEditorPhone').val(),
		pais: $('#userEditorCountry').val()
	};
	
	$.ajax({
		url: "admin_usuarios/setUserData",
		global: false,
		type: "POST",
		data: {
			'usuario': JSON.stringify(usuario)
		},
		dataType: "json",
		async: true,
		success: function(response){
			hidePopUp();
			window.location.reload();
		},
		error: function(response){
			processError(response);
		}
	});
	
}

function editUserPassword(user){
	$('#userPasswordEditorEmail').val(user);
	$('#userPasswordEditorPassword').val("");
	$('#userPasswordEditorPasswordConfirm').val("");
	
	
	showPopUp('#userPaswordPopUp');
	
}


function setUserPassword(){
	if($('#userPasswordEditorPassword').val() != $('#userPasswordEditorPasswordConfirm').val()){
		alert("Las contraseñas deben ser iguales");
		return;
	}
	var usuario = {
			email: $('#userPasswordEditorEmail').val(),
			clave: $('#userPasswordEditorPassword').val()
		};
		$.ajax({
			url: "admin_usuarios/setUserPassword",
			global: false,
			type: "POST",
			data: {
				'usuario': JSON.stringify(usuario)
			},
			dataType: "json",
			async: true,
			success: function(response){
				hidePopUp();
				window.location.reload();
			},
			error: function(response){
				processError(response);
			}
		});

}