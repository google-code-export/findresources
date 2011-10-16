$(function() {

	$("#industriasGrid").flexigrid({
		url: 'informe_conocimientos/getIndustriasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Industria', name : 'descripcion', width : 450, sortable : false, align: 'center'},
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Areas de negocio disponibles',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 450,
		height: 500
	}); 

	$("#herramientasGrid").flexigrid({
		url: 'informe_conocimientos/getHerramientasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Area', name : 'd_area', width : 200, sortable : false, align: 'center'},
			{display: 'Herramientas', name : 'd_herramienta', width : 200, sortable : false, align: 'center'},
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Herramientas',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 450,
		height: 500
	}); 

	return false;
});



