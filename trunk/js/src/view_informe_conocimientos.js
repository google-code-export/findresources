$(function() {

	$("#industriasGrid").flexigrid({
		url: 'informe_conocimientos/getIndustriasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Industria', name : 'descripcion', width : 450, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Areas de negocio disponibles',
		rp: 15,
		width: 450,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	$("#herramientasGrid").flexigrid({
		url: 'informe_conocimientos/getHerramientasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Area', name : 'd_area', width : 200, sortable : false, align: 'center'},
			{display: 'Herramientas', name : 'd_herramienta', width : 200, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Herramientas',
		rp: 15,
		width: 450,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 
	
	addExportLink("#industriasGridContainer", "Informe de Industras Disponibles");
	addExportLink("#herramientasGridContainer", "Informe de Aspectos de la Personalidad Disponibles");
	
	return false;
});

