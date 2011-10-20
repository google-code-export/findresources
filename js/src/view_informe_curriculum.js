$(function() {

	$("#curriculumGrid").flexigrid({
		url: 'informe_curriculum/getCurriculumsGrid',
		dataType: 'json',
		colModel : [
			{display: 'Email', name : 'descripcion', width : 130, sortable : false, align: 'center'},
			{display: 'Nombre', name : 'descripcion', width : 150, sortable : false, align: 'center'},
			{display: 'Apellido', name : 'descripcion', width : 150, sortable : false, align: 'center'},
			{display: 'Herramientas', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Aspectos de la personalidad', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Busquedas vigente', name : 'descripcion', width : 130, sortable : false, align: 'center'},
			{display: 'Fecha de actualización', name : 'descripcion', width : 200, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Búsquedas',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 850,
		height: 500,
		onError: function(response){
			processError(response);
		} 
	}); 

	addExportLink("#curriculumGrid", "Búsquedas creadas en el sistema.");

	return false;
});



