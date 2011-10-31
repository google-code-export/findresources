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
		title: 'Curriculums en el sistema',
		rp: 15,
		width: 895,
		height: 500,
		onError: function(response){
			processError(response);
		} 
	}); 

	addExportLink("#curriculumGridContainer", "Curriculums en el sistema.");

	return false;
});



