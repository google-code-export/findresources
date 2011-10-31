$(function() {

	$("#busquedasGrid").flexigrid({
		url: 'informe_busquedas/getBusquedasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Area de negocio', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Empresa', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Nombre de b�squeda', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Herramientas', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Aspectos de la Personalidad', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Estado', name : 'descripcion', width : 200, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'B�squedas',
		rp: 15,
		width: 890,
		height: 500,
		onError: function(response){
			processError(response);
		} 
	}); 

	addExportLink("#busquedasGridContainer", "B�squedas creadas en el sistema.");

	return false;
});



