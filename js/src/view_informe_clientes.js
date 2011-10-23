$(function() {

	$("#clientesGrid").flexigrid({
		url: 'informe_clientes/getClientesGrid',
		dataType: 'json',
		colModel : [
			{display: 'Mail ', name : 'mail', width : 230, sortable : false, align: 'center'},
			{display: 'Razón Social', name : 'nombre', width : 250, sortable : false, align: 'center'},
			{display: 'CUIL', name : 'cuil', width : 100, sortable : false, align: 'center'},
			{display: 'Saldo', name : 'saldo', width : 100, sortable : false, align: 'center'},
			{display: 'Ver Busquedas', name : 'ver_busquedas', width : 100, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Clientes registrados en el sistema',
		rp: 15,
		width: 850,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	
	addExportLink("#clientesGridContainer", "Clientes registrados en el sistema");
	
	return false;
});

///global variable.-
var busquedasGrid = null;

function showBusquedas(usuarioEmpresa, name){
	
	if(!busquedasGrid){
		busquedasGrid =  $("#busquedasGrid").flexigrid({
			url: 'informe_clientes/getBusquedasGrid?usuarioEmpresa=' + usuarioEmpresa,
			dataType: 'json',
			colModel : [
				{display: 'Título', name : 'fecha', width : 200, sortable : false, align: 'center'},
				{display: 'Estado', name : 'entradas', width : 200, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			title: 'Búsquedas de la empresa ' + name,
			rp: 15,
			width: 420,
			height: 420,
			onError: function(response){
				processError(response);
			} 
		}); 
		addExportLink("#busquedasGridContainer", 'Búsquedas de la empresa ' + name);
	}else{
		$("#busquedasGrid").flexOptions({url: 'informe_clientes/getBusquedasGrid?usuarioEmpresa=' + usuarioEmpresa, title: 'Búsquedas de la empresa ' + name}); 
		$("#busquedasGrid").flexReload(); 
	}

	showPopUp('#busquedasGridPopUp');

}
