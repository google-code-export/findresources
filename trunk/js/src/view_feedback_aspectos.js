$(function() {

	$("#aspectosGrid").flexigrid({
		url: 'feedback_aspectos/getAspectosGrid',
		dataType: 'json',
		colModel : [
			{display: 'Aspecto', name : 'descripcion', width : 200, sortable : false, align: 'left'},
			{display: 'Coloquio', name : 'descripcion', width : 605, sortable : false, align: 'left'},
			{display: 'Editar', name : 'descripcion', width : 30, sortable : false, align: 'center'}
		],
		sortname: "orden",
		sortorder: "asc",
		title: 'Aspectos de la personalida que el usuario puede elegir',
		rp: 15,
		width: 890,
		height: 500,
		onError: function(response){
			processError(response);
		}
	}); 

	addExportLink("#aspectosGridContainer", "Aspectos de la personalida obtenidos por el sistema");

	return false;
});


function editColoquio(idSoftSkill){
	
	var skill = getSoftSkill(idSoftSkill);
	if(skill){
		
		
		
		$('#softSkillEditorId').val(skill.id_habilidad_blanda);
		$('#softSkillEditorName').html(skill.d_habilidad_blanda);
		$('#softSkillEditorColoquio').val(skill.d_coloquio);
		
		showPopUp('#softSkillPopUp');
	}

}
function setSoftSkill(){
	
	var habilidad_blanda = {
		id_habilidad_blanda: $('#softSkillEditorId').val(),
		d_habilidad_blanda: $('#softSkillEditorName').html(),
		d_coloquio: $('#softSkillEditorColoquio').val()
	}
	
	$.ajax({
		url: "feedback_aspectos/setHabilidadBlanda",
		global: false,
		type: "POST",
		data: {
			'habilidad_blanda': JSON.stringify(habilidad_blanda)
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

function getSoftSkill(idSoftSkill){
	
	var i = 0;

	for(i=0; i < availableSoftSkills.length; i++){
		
		if(availableSoftSkills[i].id_habilidad_blanda == idSoftSkill){
			return availableSoftSkills[i];
		}
		
	}
	return false;

}