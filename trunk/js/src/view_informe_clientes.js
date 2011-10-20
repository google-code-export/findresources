$(function() {

	$("#clientesGrid").flexigrid({
		url: 'informe_clientes/getClientesGrid',
		dataType: 'json',
		colModel : [
			{display: 'Mail ', name : 'mail', width : 230, sortable : false, align: 'center'},
			{display: 'Raz�n Social', name : 'nombre', width : 250, sortable : false, align: 'center'},
			{display: 'CUIL', name : 'cuil', width : 100, sortable : false, align: 'center'},
			{display: 'Saldo', name : 'saldo', width : 100, sortable : false, align: 'center'},
			{display: 'Ver Busquedas', name : 'ver_busquedas', width : 100, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Clientes registrados en el sistema',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 850,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	
	addExportLink("#clientesGridContainer", "Informe de Industras Disponibles");
	
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
				{display: 'T�tulo', name : 'fecha', width : 200, sortable : false, align: 'center'},
				{display: 'Estado', name : 'entradas', width : 200, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			usepager: true,
			title: 'B�squedas de la empresa ' + name,
			useRp: true,
			rp: 15,
			showTableToggleBtn: false,
			width: 420,
			height: 420,
			onError: function(response){
				processError(response);
			} 
		}); 
		addExportLink("#busquedasGridContainer", "Informe de Aspectos de la Personalidad Disponibles");
	}

	showPopUp('#busquedasGridPopUp');

}