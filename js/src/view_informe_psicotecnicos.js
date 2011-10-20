$(function() {

	$("#psicotecnicosGrid").flexigrid({
		url: 'informe_psicotecnicos/getPsicotecnicosGrid',
		dataType: 'json',
		colModel : [
			{display: 'Nombre ', name : 'nombre', width : 200, sortable : false, align: 'center'},
			{display: 'Aspectos que obtiene ', name : 'aspectos', width : 400, sortable : false, align: 'center'},
			{display: 'Veces Utilizado', name : 'cuenta', width : 100, sortable : false, align: 'center'},
			{display: 'Ver Propuestas', name : 'ver_propuesta', width : 100, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Areas de negocio disponibles',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 850,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	
	addExportLink("#industriasGridContainer", "Informe de Industras Disponibles");
	addExportLink("#herramientasGridContainer", "Informe de Aspectos de la Personalidad Disponibles");
	
	return false;
});

var propuestasGrid = null;

function showPropose(idPsicotecnico, name){

	if(!propuestasGrid){
	
		propuestasGrid = $("#propuestasGrid").flexigrid({
			url: 'informe_psicotecnicos/getPropuestasGrid?idPsicotecnico=' + idPsicotecnico,
			dataType: 'json',
			colModel : [
				{display: 'Fecha', name : 'fecha', width : 200, sortable : false, align: 'center'},
				{display: 'Entradas', name : 'entradas', width : 200, sortable : false, align: 'center'},
				{display: 'Salida Obtenida', name : 'entradas', width : 200, sortable : false, align: 'center'},
				{display: 'Propuesta de salida', name : 'entradas', width : 200, sortable : false, align: 'center'},
				{display: 'Notas', name : 'entradas', width : 200, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			usepager: true,
			title: 'Propuesta de cambio del test ' + name,
			useRp: true,
			rp: 15,
			showTableToggleBtn: false,
			width: 720,
			height: 420,
			onError: function(response){
				processError(response);
			} 
		}); 	
		addExportLink("#propuestasGrid", "Informe de Propuestas de modificación de psicotécnicos.");

	}else{
		$("#propuestasGrid").flexOptions({url: 'informe_psicotecnicos/getPropuestasGrid?idPsicotecnico=' + idPsicotecnico}); 
		$("#propuestasGrid").flexReload(); 
	}

	showPopUp('#propuestasGridPopUp');

}
