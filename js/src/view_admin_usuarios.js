$(function() {

	$("#usuariosGrid").flexigrid({
		url: 'admin_usuarios/getUsuariosExpertosGrid',
		dataType: 'json',
		colModel : [
			{display: 'E mail', name : 'usuario', width : 150, sortable : false, align: 'center'},
			{display: 'Nombre', name : 'nombre', width : 150, sortable : false, align: 'center'},
			{display: 'Conraseña', name : 'password', width : 150, sortable : false, align: 'center'},
			{display: 'Dar de baja', name : 'baja', width : 150, sortable : false, align: 'center'},
			{display: 'Editar', name : 'edit', width : 150, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Usuarios Expertos',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 850,
		height: 500
	}); 


	return false;
});


/**
 * 
 * agrega un usuario al comienzo de la tabla.-
 * 
 */
function addNewUser(){
	
}
