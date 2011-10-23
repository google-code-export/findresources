$(function() {

	$("#aspectosGrid").flexigrid({
		url: 'informe_aspectos/getAspectosGrid',
		dataType: 'json',
		colModel : [
			{display: 'Nombre', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Coloqui', name : 'descripcion', width : 250, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Aspectos de la personalida que el usuario puede elegir',
		rp: 15,
		width: 450,
		height: 500,
		onError: function(response){
			processError(response);
		} 
	}); 

	addExportLink("#aspectosGridContainer", "Informe de Aspectos de la Personalidad Disponibles");

	return false;
});



