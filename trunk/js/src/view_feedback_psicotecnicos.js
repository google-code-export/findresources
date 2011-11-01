var grillaPsicotecnicos = null; 

function getPsicotecnicosResultados(){
	
	var psicotecnicoBuscado = $("#psicotecnicoBuscado").val();
	var url = 'feedback_psicotecnicos/getFeedbackPsicotecnicosGrid?psicotecnico=' + psicotecnicoBuscado;
	
	if(!grillaPsicotecnicos){
		grillaPsicotecnicos  = $("#candidatosGrid").flexigrid({
			url: url,
			dataType: 'json',
			colModel : [
				{display: 'Nombre', name : 'descripcion', width : 200, sortable : false, align: 'center'},
				{display: 'Apellido', name : 'descripcion', width : 200, sortable : false, align: 'center'},
				{display: 'Mail', name : 'descripcion', width : 200, sortable : false, align: 'center'},
				{display: 'Entradas', name : 'descripcion', width : 300, sortable : false, align: 'center'},
				{display: 'Salidas obtenidas por el sistema', name : 'descripcion', width : 300, sortable : false, align: 'center'},
				{display: 'Editar', name : 'descripcion', width : 30, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			title: 'Resultados de psicotecnicos obtenidos por el sistema',
			rp: 15,
			width: 750,
			height: 500,
			onError: function(response){
				processError(response);
			}
		}); 
	
		addExportLink("#candidatosGridContainer", "Resultados de psicotecnicos obtenidos por el sistema");
	
	}else {
		$("#candidatosGrid").flexOptions({url: url}); 
		$("#candidatosGrid").flexReload(); 

	}
	
}

$(function() {
	return false;
});


function editPropuesta(idTest, idPsicotecnico, candidato, entradas, salidas){
	
	var url = "feedback_psicotecnicos/getDatosPropuesta?idTest="+ idTest + "&idPsicotecnico=" + idPsicotecnico;
	
	
	

	$('#softSkillEditorId').val(candidato);
	$('#softSkillEditorCandidateEntry').val(entradas);
	$('#softSkillEditorSystemResponse').val(salidas);

	$('#softSkillEditorExpertIdTest').val(idTest);
	$('#softSkillEditorExpertIdRun').val(idPsicotecnico);
	
	
	$.ajax({
		url: url,
		global: false,
		type: "GET",
		dataType: "json",
		async: true,
		success: function(response){
			performEditPropuesta(response.salidas_del_usuario, response.notas_del_usuario)
		},
		error: function(response){
			processError(response);
		}
	});		
	

}

function performEditPropuesta(salidasDelUsuario, notasDelUsuario){
	
	$('#softSkillEditorExpertResponse').val(salidasDelUsuario);
	$('#softSkillEditorExpertNotes').val(notasDelUsuario);
	
	showPopUp('#psicotecnicoPopUp');
}

function setPropuestaDeSalida(){
	
	var propuesta_de_salida = {
		idTest: $('#softSkillEditorExpertIdTest').val(),
		idCorrida: $('#softSkillEditorExpertIdRun').val(),
		propuesta: $('#softSkillEditorExpertResponse').val(),
		nota: $('#softSkillEditorExpertNotes').val()
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
			//alert("Se han guardado los datos");
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
