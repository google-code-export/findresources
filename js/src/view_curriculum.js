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
	$('#informalEducationEditorInstitution').val("");
	$('#informalEducationEditorDescription').val("");
	$('#informalEducationEditorType').val("");
	$('#informalEducationEditorDuration').val("");
	showPopUp('#informalEducationPopUp');
}

function editCVData(){
	$('#cvDataEditorMaritalStatus').val(cvData.estadoCivil);
	$('#cvDataEditorBirthDay').val(cvData.fechaNacimiento);
	$('#cvDataEditorAddressStreet').val(cvData.calle);
	$('#cvDataEditorAddressNumber').val(cvData.numero);
	$('#cvDataEditorAddressFloor').val(cvData.piso);
	$('#cvDataEditorAddressApt').val(cvData.departamento);
	$('#cvDataEditorZipCode').val(cvData.codigoPostal);
	$('#cvDataEditorState').val(cvData.idProvincia);
	$('#cvDataEditorCountry').val(cvData.idPais);
	cvDataEditorCountryChange();

	$('#cvDataEditorPhone1').val(cvData.telefono1);
	$('#cvDataEditorContactFrom1').val(cvData.horarioContactoDesde1);
	$('#cvDataEditorContactTo1').val(cvData.horarioContactoHasta1);
	$('#cvDataEditorPhone2').val(cvData.telefono2);
	$('#cvDataEditorContactFrom2').val(cvData.horarioContactoDesde2);
	$('#cvDataEditorContactTo2').val(cvData.horarioContactoHasta2);
	$('#cvDataEditorNationality').val(cvData.idPaisNacionalidad);
	$('#cvDataEditorTwitter').val(cvData.twitter);
	$('#cvDataEditorGTalk').val(cvData.gtalk);
	$('#cvDataEditorSMS').val(cvData.sms);
	$('#cvDataEditorDesiredSalary').val(cvData.sueldoPretendido);
	
	showPopUp('#cvDataPopUp');
}

function editWorkExperience(idExperience){
	$('#workExperienceEditorId').val(idExperience);
	$('#workExperienceEditorCompany').val(workExperiences[idExperience].compania);
	$('#workExperienceEditorIndustry').val(workExperiences[idExperience].idIndustria);
	$('#workExperienceEditorCountry').val(workExperiences[idExperience].idPais);
	$('#workExperienceEditorDateFrom').val(workExperiences[idExperience].fechaDesde);
	$('#workExperienceEditorDateTo').val(workExperiences[idExperience].fechaHasta);
	$('#workExperienceEditorGoal').val(workExperiences[idExperience].logro);
	$('#workExperienceEditorDescription').val(workExperiences[idExperience].descripcion);
	$('#workExperienceEditorTitle').val(workExperiences[idExperience].titulo);
	showPopUp('#workExperiencePopUp');
}

function editHardSkills(){
	showPopUp('#hardSkillsPopUp');
}



function editFormalEducation(idEducation){
	$('#formalEducationEditorId').val(idEducation);
	$('#formalEducationEditorInstitution').val(formalEducation[idEducation].idEntidad);
	$('#formalEducationEditorInstitutionDescription').val(formalEducation[idEducation].descripcionEntidad);
	checkInstitutionDescriptionDisabled();
	
	$('#formalEducationEditorTitle').val(formalEducation[idEducation].titulo);
	$('#formalEducationEditorEducationLevel').val(formalEducation[idEducation].idNivelEducacion);
	$('#formalEducationEditorArea').val(formalEducation[idEducation].idArea);
	$('#formalEducationEditorStatus').val(formalEducation[idEducation].estado);
	$('#formalEducationEditorDateFrom').val(formalEducation[idEducation].fechaInicio);
	$('#formalEducationEditorDateTo').val(formalEducation[idEducation].fechaFinalizacion);
	$('#formalEducationEditorAverage').val(formalEducation[idEducation].promedio);

	showPopUp('#formalEducationPopUp');
}

function editInformalEducation(idEducation){
	$('#informalEducationEditorId').val(idEducation);
	$('#informalEducationEditorInstitution').val(informalEducation[idEducation].institucion);
	$('#informalEducationEditorType').val(informalEducation[idEducation].idTipoEducacionNoFormal);
	$('#informalEducationEditorDescription').val(informalEducation[idEducation].descripcion);
	$('#informalEducationEditorDuration').val(informalEducation[idEducation].duracion);

	showPopUp('#informalEducationPopUp');
}


function checkInstitutionDescriptionDisabled(){
	$('#formalEducationEditorInstitutionDescription').attr("disabled", 
			($('#formalEducationEditorInstitution').val() != ""));
}

function eraseWorkExperience(id){
	var r=confirm("Esta seguro que desea eliminar la experiencia en " + workExperiences[id].compania);
	if (r==true)
	  {
		$.ajax({
			url: "curriculum/bajaExperienciaLaboral",
			global: false,
			type: "POST",
			data: {
				'id': id
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
	  }
}

function eraseFormalEducation(id){
	var r=confirm("Esta seguro que desea eliminar la educacion formal seleccionada");
	if (r==true)
	  {
		$.ajax({
			url: "curriculum/bajaEducacionFormal",
			global: false,
			type: "POST",
			data: {
				'id': id
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
	  }
}

function eraseInformalEducation(id){
	var r=confirm("Esta seguro que desea eliminar la educacion informal seleccionada");
	if (r==true)
	  {
		$.ajax({
			url: "curriculum/bajaEducacionNoFormal",
			global: false,
			type: "POST",
			data: {
				'id': id
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
	  }
}


/*WINDOW ONLOAD*/
$(function(){

	$('#hardSkillsPopUp .sendButton').click(function(){

		var habilidadesIndustrias = new Array();
		var startIndex = (new String("editItemIndustry")).length;
		$('.industryItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			var points = $('#' + itemId + ' .current-rating').attr("value");
			
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
			var points = $('#' + itemId + ' .current-rating').attr("value");
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
				processError(response);
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
				processError(response);
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
			promedio: $('#formalEducationEditorAverage').val().replace(".", ",")
			
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
				processError(response);
			}
		});
	});
	
	$('#informalEducationPopUp .sendButton').click(function(){
		var educacionFormal = {
			id: $('#informalEducationEditorId').val(), // null = nuevo
			idTipoEducacionNoFormal: $('#informalEducationEditorType').val(), 
			institucion: $('#informalEducationEditorInstitution').val(), 
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
				processError(response);
			}
		});
	});	
	
	$('#cvDataPopUp .sendButton').click(function(){
		var curriculum = {
			estadoCivil: $('#cvDataEditorMaritalStatus').val(),
			fechaNacimiento: $('#cvDataEditorBirthDay').val(),
			calle: $('#cvDataEditorAddressStreet').val(),
			numero: $('#cvDataEditorAddressNumber').val(),
			piso: $('#cvDataEditorAddressFloor').val(),
			departamento: $('#cvDataEditorAddressApt').val(),
			codigoPostal: $('#cvDataEditorZipCode').val(),
			idProvincia: $('#cvDataEditorState').val(),
			idPais: $('#cvDataEditorCountry').val(),
			telefono1: $('#cvDataEditorPhone1').val(),
			horarioContactoDesde1: $('#cvDataEditorContactFrom1').val(),
			horarioContactoHasta1: $('#cvDataEditorContactTo1').val(),
			telefono2: $('#cvDataEditorPhone2').val(),
			horarioContactoDesde2: $('#cvDataEditorContactFrom2').val(),
			horarioContactoHasta2: $('#cvDataEditorContactTo2').val(),
			idPaisNacionalidad: $('#cvDataEditorNationality').val(),
			twitter: $('#cvDataEditorTwitter').val(),
			gtalk: $('#cvDataEditorGTalk').val(),
			sms: $('#cvDataEditorSMS').val(),
			sueldoPretendido: $('#cvDataEditorDesiredSalary').val()
		};
		$.ajax({
			url: "curriculum/setCurriculum",
			global: false,
			type: "POST",
			data: {
				'curriculum': JSON.stringify(curriculum)
			},
			dataType: "json",
			async: true,
			success: function(response){
				hidePopUp();
				window.location.reload();
			},
			error: function(response){
				processError(response);
			}
		});
	});	
	
		
	
	$('#formalEducationEditorInstitution').change(function(){
		checkInstitutionDescriptionDisabled();
	});
	
	
	$('#cvDataEditorCountry').change(cvDataEditorCountryChange);
	
	///para el caso de que esta pantalla este en un iframe.
	//se resizea el iframe.
	if(self!=parent){
		var parentIFrame = parent.document.getElementById("candidateCVIframe");
		parentIFrame.height = $("body").css("height");
		
		//get out the border
		$(".body_container").css("border","none");
		
	}; 

	
	return false;
});


function cvDataEditorCountryChange(){
	if($('#cvDataEditorCountry').val() =="ARG"){
		$('#cvDataEditorState').attr('disabled',false);
	}else{
		$('#cvDataEditorState').attr('disabled',true);
	}
}

function upload()
{ 
 var id_value = $('#cvDataEditorPhoto').val();
 
 if(id_value != '')
 { 
  var valid_extensions = /(.jpg)$/i;   
  if(valid_extensions.test(id_value))
  { 	  
	  $('#photoupload').submit();
  }
  else
  {
   alert('La imagen debe tener extensión .jpg');
  }
 }
}