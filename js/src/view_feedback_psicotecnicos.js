$(function() {

	$("#candidatosGrid").flexigrid({
		url: 'feedback_psicotecnicos/getFeedbackPsicotecnicosGrid',
		dataType: 'json',
		colModel : [
		    {display: 'Editar', name : 'descripcion', width : 30, sortable : false, align: 'center'},
			{display: 'Nombre', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Apellido', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Mail', name : 'descripcion', width : 200, sortable : false, align: 'center'},
			{display: 'Entradas', name : 'descripcion', width : 300, sortable : false, align: 'center'},
			{display: 'Salidas obtenidas por el sistema', name : 'descripcion', width : 300, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Resultados de psicotecnicos obtenidos por el sistema',
		rp: 15,
		width: 890,
		height: 500,
		onError: function(response){
			processError(response);
		}
	}); 

	addExportLink("#candidatosGridContainer", "Resultados de psicotecnicos obtenidos por el sistema");

	return false;
});


function editPropuesta(idCV, entradas, salidas){
	
	$.ajax({
		url: "feedback_psicotecnicos/getDatosPropuesta",
		global: false,
		type: "POST",
		data: {
			'id_cv': JSON.stringify(idCV)
		},
		dataType: "json",
		async: true,
		success: function(response){
			performEditPropuesta(idCV, entradas, salidas, response.salidas_del_usuario, response.notas_del_usuario)
		},
		error: function(response){
			processError(response);
		}
	});		
	

}

function performEditPropuesta(idCV, entradas, salidas, salidasDelUsuario, notasDelUsuario){
	
	$('#softSkillEditorId').val(idCV);
	$('#softSkillEditorCandidateEntry').val(entradas);
	$('#softSkillEditorSystemResponse').val(salidas);
	$('#softSkillEditorExpertResponse').val(salidasDelUsuario);
	$('#softSkillEditorUserNotes').val(notasDelUsuario);
	
	showPopUp('#psicotecnicoPopUp');
}

function setPropuestaDeSalida(){
	
	var propuesta_de_salida = {
		xxx: $('#psicotecnicoEditorResponse').val(),
		xxy: $('#psicotecnicoEditorNote').val()
	}
	
	$.ajax({
		url: "feedback_psicotecnicos/setPropuestaDeCambio",
		global: false,
		type: "POST",
		data: {
			'propuesta_de_salida': JSON.stringify(propuesta_de_salida)
		},
		dataType: "json",
		async: true,
		success: function(response){
			alert("Se han guardado los datos");
			hidePopUp();
			//TODO this is so ugly we shouldnt reload all the page.
			window.location.reload();
		},
		error: function(response){
			processError(response);
		}
	});		

	return false;

}
