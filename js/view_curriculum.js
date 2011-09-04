function showPopUp(id)
{
	$('.opacity').show().animate({opacity:'0.7'},500);
	$('.popup#'+id).show().animate({opacity:'1'},500);
	window.scroll(0,0);
}

function hidePopUp()
{
	$('.opacity').animate({opacity:'0'},500,function(){$(this).hide()});
	$('.popup').animate({opacity:'0'},500,function(){$(this).hide()});
}

function getBlockID(este)
{
	var ID;
	if(este.parent().parent().attr('class')=='block'){
		ID = este.parent().parent().attr('id');	
	}else if(este.parent().parent().parent().attr('class')=='block'){
		ID = este.parent().parent().parent().attr('id');
	}
	return ID;
}

/*function getWorkExperience(blockID)
{
	$('#'+blockID+'Company').val($('#'+blockID+' .company').text());
	$('#'+blockID+'Industry').val($('#'+blockID+' .industry').text());
	$('#'+blockID+'Country').val($('#'+blockID+' .country').text());
	$('#'+blockID+'DateFrom').val($('#'+blockID+' .dateFrom').text());
	$('#'+blockID+'DateTo').val($('#'+blockID+' .dateTo').text());
	$('#'+blockID+'Goal').val($('#'+blockID+' .logro').text());
}*/

function removeIndustry(idIndustria){
	$('#editItemIndustry' + idIndustria).remove();
}

function removeTool(idHerramienta){
	$('#editItemTool' + idHerramienta).remove();
}

function addIndustry(){
	var selectedIndustry = $('#availableIndustriesSelect').val();
	
	
	if($('#editItemIndustry' + selectedIndustry).length == 0){
		
		var industryLi = "<li id=\"editItemIndustry" + selectedIndustry  + "\" class=\"industryItem\">"+
					"<div class=\"field\">"+
					"<div class=\"label\" >" + availableIndustries[selectedIndustry] + ":</div>" +
					"<input type=\"text\" class=\"pointsInput\" value=\"0\"/>" + 
					"<a href=\"javascript:removeIndustry(" + selectedIndustry + ");\">X</a>" + 
				"</div></li>"

		$('#editItemIndustryList').append(industryLi);
		
	}else {
		//it is already selected.
		alert("Ya tiene esa industria seleccionada");
	}
	
}

function addTool(){

	var selectedArea = $('#availableAreasSelect').val();
	var selectedTool = $('#availableToolsSelect').val();
	
//availableTools[response[tool].id]

	if($('#editItemTool' + selectedTool).length == 0){
		
		var toolLi = "<li id=\"editItemTool" + selectedTool  + "\" class=\"toolItem\" area=\""+ selectedArea + "\" >"+
					"<div class=\"field\">" +
						"<div class=\"label\">" +
							availableAreas[selectedArea] +" - " + availableTools[selectedTool] +
						":</div>" +
						"<input type=\"text\" class=\"pointsInput\" value=\"0\"/>" + 
						"<a href=\"javascript:removeTool(" + selectedTool + ");\">X</a>" + 
					"</div>" +
				"</li>"

		$('#editItemToolList').append(toolLi);
		
	}else {
		//it is already selected.
		alert("Ya tiene esa herramienta seleccionada");
	}
	
	
}
function addWorkExperience(){
	$('#workExperienceEditorId').val("");
	$('#workExperienceEditorCompany').val("");
	$('#workExperienceEditorIndustry').val("");
	$('#workExperienceEditorCountry').val("");
	$('#workExperienceEditorDateFrom').val("");
	$('#workExperienceEditorDateTo').val("");
	$('#workExperienceEditorGoal').val("");
	$('#workExperienceEditorDescription').val("");
	$('#workExperienceEditorTitle').val("");
	showPopUp('#workExperiencePopUp');
}

function addFormalEducation(){
	$('#formalEducationEditorId').val("");
	$('#formalEducationEditorInstitution').val("");
	$('#formalEducationEditorInstitutionDescription').val("");
	checkInstitutionDescriptionDisabled();
	$('#formalEducationEditorTitle').val("");
	$('#formalEducationEditorEducationLevel').val("");
	$('#formalEducationEditorArea').val("");
	$('#formalEducationEditorStatus').val("");
	$('#formalEducationEditorDateFrom').val("");
	$('#formalEducationEditorDateTo').val("");
	$('#formalEducationEditorAverage').val("");
	showPopUp('#formalEducationPopUp');
}

function addInformalEducation(){
	$('#informalEducationEditorId').val("");
	$('#informalEducationEditorDescription').val("");
	$('#informalEducationEditorType').val("");
	$('#informalEducationEditorDuration').val("");
	showPopUp('#informalEducationPopUp');
}

function editWorkExperience(idExperience){
	$('#workExperienceEditorId').val(idExperience);
	$('#workExperienceEditorCompany').val(workExperiences[idExperience].company);
	$('#workExperienceEditorIndustry').val(workExperiences[idExperience].idIndustry);
	$('#workExperienceEditorCountry').val(workExperiences[idExperience].idCountry);
	$('#workExperienceEditorDateFrom').val(workExperiences[idExperience].dateFrom);
	$('#workExperienceEditorDateTo').val(workExperiences[idExperience].dateTo);
	$('#workExperienceEditorGoal').val(workExperiences[idExperience].goal);
	$('#workExperienceEditorDescription').val(workExperiences[idExperience].description);
	$('#workExperienceEditorTitle').val(workExperiences[idExperience].title);
	showPopUp('#workExperiencePopUp');
}

function editHardProperties(){
	showPopUp('#hardPropertiesPopUp');
}



function editFormalEducation(idEducation){
	$('#formalEducationEditorId').val(idEducation);
	$('#formalEducationEditorInstitution').val(formalEducation[idEducation].idInstitution);
	$('#formalEducationEditorInstitutionDescription').val(formalEducation[idEducation].descriptionInstitution);
	checkInstitutionDescriptionDisabled();
	
	$('#formalEducationEditorTitle').val(formalEducation[idEducation].title);
	$('#formalEducationEditorEducationLevel').val(formalEducation[idEducation].idEducationLevel);
	$('#formalEducationEditorArea').val(formalEducation[idEducation].idArea);
	$('#formalEducationEditorStatus').val(formalEducation[idEducation].status);
	$('#formalEducationEditorDateFrom').val(formalEducation[idEducation].dateFrom);
	$('#formalEducationEditorDateTo').val(formalEducation[idEducation].dateTo);
	$('#formalEducationEditorAverage').val(formalEducation[idEducation].average);

	showPopUp('#formalEducationPopUp');
}

function editInformalEducation(idEducation){
	$('#informalEducationEditorId').val(idEducation);
	$('#informalEducationEditorType').val(informalEducation[idEducation].idType);
	$('#informalEducationEditorDescription').val(informalEducation[idEducation].description);
	$('#informalEducationEditorDuration').val(informalEducation[idEducation].duration);

	showPopUp('#informalEducationPopUp');
}


function checkInstitutionDescriptionDisabled(){
	$('#formalEducationEditorInstitutionDescription').attr("disabled", 
			($('#formalEducationEditorInstitution').val() != ""));
}

/*WINDOW ONLOAD*/
$(function(){
	
	$('.popup .closePopUp').click(function(){
		hidePopUp();
	});

	$('#hardPropertiesPopUp .sendButton').click(function(){

		var habilidadesIndustrias = new Array();
		var startIndex = (new String("editItemIndustry")).length;
		$('.industryItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			var points = $('#' + itemId + ' .pointsInput').val();
			habilidadesIndustrias.push({
				idIndustria: id,
				puntos: points
			});
		});
		
		

		var habilidadesAreas = new Array();
		startIndex = (new String("editItemTool")).length;
		$('.toolItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			var idArea = $(element).attr("area");
			var points = $('#' + itemId + ' .pointsInput').val();
			habilidadesAreas.push({
				idArea: idArea,
				idHerramienta: id,
				puntos: points
			});
		});
		
		$.ajax({
			url: "curriculum/setHabilidadesDelCV",
			global: false,
			type: "POST",
			data: {
				'habilidadesIndustrias': JSON.stringify(habilidadesIndustrias),
				'habilidadesAreas': JSON.stringify(habilidadesAreas)
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
				alert(response);
			}
		});
		
	});
	
	$('#workExperiencePopUp .sendButton').click(function(){
		var experienciaLaboral = {
			id: $('#workExperienceEditorId').val(), // null = nuevo
			titulo: $('#workExperienceEditorTitle').val(),
			compania: $('#workExperienceEditorCompany').val(), 
			idIndustria: $('#workExperienceEditorIndustry').val(),
			idPais: $('#workExperienceEditorCountry').val(), 
			fechaDesde: $('#workExperienceEditorDateFrom').val(),
			fechaHasta: $('#workExperienceEditorDateTo').val(),
			logro: $('#workExperienceEditorGoal').val(),
			descripcion: $('#workExperienceEditorDescription').val()
			
		};
		$.ajax({
			url: "curriculum/setExperienciaLaboral",
			global: false,
			type: "POST",
			data: {
				'experienciaLaboral': JSON.stringify(experienciaLaboral)
			},
			dataType: "json",
			async: true,
			success: function(response){
				hidePopUp();
				window.location.reload();
			},
			error: function(response){
				alert(response);
			}
		});
	});
	
	$('#formalEducationPopUp .sendButton').click(function(){
		var educacionFormal = {
			id: $('#formalEducationEditorId').val(), // null = nuevo
			idEntidad: $('#formalEducationEditorInstitution').val(),
			descripcionEntidad: ($('#formalEducationEditorInstitution').val() == "")?
					$('#formalEducationEditorInstitutionDescription').val():"", 
			
			titulo: $('#formalEducationEditorTitle').val(),
			idNivelEducacion: $('#formalEducationEditorEducationLevel').val(), 
			idArea: $('#formalEducationEditorArea').val(),
			estado: $('#formalEducationEditorStatus').val(),
			fechaInicio: $('#formalEducationEditorDateFrom').val(),
			fechaFinalizacion: $('#formalEducationEditorDateTo').val(),
			promedio: $('#formalEducationEditorAverage').val()
			
		};
		$.ajax({
			url: "curriculum/setEducacionFormal",
			global: false,
			type: "POST",
			data: {
				'educacionFormal': JSON.stringify(educacionFormal)
			},
			dataType: "json",
			async: true,
			success: function(response){
				hidePopUp();
				window.location.reload();
			},
			error: function(response){
				alert(response);
			}
		});
	});
	
	$('#informalEducationPopUp .sendButton').click(function(){
		var educacionFormal = {
			id: $('#informalEducationEditorId').val(), // null = nuevo
			idTipoEducacionNoFormal: $('#informalEducationEditorType').val(), 
	 		descripcion:$('#informalEducationEditorDescription').val(), 
	 		duracion:$('#informalEducationEditorDuration').val()
		};
		$.ajax({
			url: "curriculum/setEducacionNoFormal",
			global: false,
			type: "POST",
			data: {
				'educacionNoFormal': JSON.stringify(educacionFormal)
			},
			dataType: "json",
			async: true,
			success: function(response){
				hidePopUp();
				window.location.reload();
			},
			error: function(response){
				alert(response);
			}
		});
	});	
	
	$('#availableAreasSelect').change(function(){
		$.ajax({
			url: "util/getHerramientasPorArea",
			global: false,
			type: "POST",
			data: {
				'idArea': $('#availableAreasSelect').val()
			},
			dataType: "json",
			async: true,
			success: function(tools){
				$('#availableToolsSelect').empty();
				//.children("option").remove();
				var options = ""; 
				
				for (id in tools)
				{ 
					availableTools[id] = tools[id];
					options += "<option value=\"" + id + "\">" + tools[id] + "</option>";
				}					
				$('#availableToolsSelect').append(options);
				/*debugger;
				alert(response)*/
			},
			error: function(response){
				alert(response);
			}
		});
		
	});

	$('#formalEducationEditorInstitution').change(function(){
		checkInstitutionDescriptionDisabled();
	});
	
	return false;
});