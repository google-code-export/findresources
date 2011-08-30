function showPopUp(id)
{
	$('.opacity').show().animate({opacity:'0.7'},500);
	$('.popup#'+id).show().animate({opacity:'1'},500);
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

function getWorkExperience(blockID)
{
	$('#'+blockID+'Company').val($('#'+blockID+' .company').text());
	$('#'+blockID+'Industry').val($('#'+blockID+' .industry').text());
	$('#'+blockID+'Country').val($('#'+blockID+' .country').text());
	$('#'+blockID+'DateFrom').val($('#'+blockID+' .dateFrom').text());
	$('#'+blockID+'DateTo').val($('#'+blockID+' .dateTo').text());
	$('#'+blockID+'Goal').val($('#'+blockID+' .logro').text());
}

/*WINDOW ONLOAD*/
$(function(){
	
	$('.popup .closePopUp').click(function(){
		hidePopUp();
	});
	
	$('.editFields').click(function(){
		showPopUp('#'+getBlockID($(this))+'PopUp');
		if(getBlockID($(this))=='workExperience'){
			getWorkExperience('workExperience');
		}
	});

	$('#hardPropertiesPopUp .sendButton').click(function(){

		var curriculum = {
			'usuario':"unmail@unserver.com",
			'estadoCivil':0,
			'fechaNacimiento':"15/05/1966",
			'idPais':'ARG',
			'idProvincia':0,
			'partido':"Ramos Mejia",
			'calle':"Calle Falsa",
			'numero':"2222",
			'piso':"3",
			'departamento':"A",
			'codigoPostal':"CWI1417C",
			'telefono1':$('#telefono1').val(),
			'horarioContactoDesde1':"9",
			'horarioContactoHasta1':"18",
			'telefono2':"4554-1235",
			'horarioContactoDesde2':"",
			'horarioContactoHasta2':"",
			'idPaisNacionalidad':'ARG',
			gtalk:  $('#gtalk').val(),
			'twitter': "@twitteruser",
			'sms': "15-3838-4994"
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
				alert("Se han guardado los datos");
				hidePopUp();
			},
			error: function(response){
				alert(response);
			}
		});
		
	});
	
	$('#workExperiencePopUp .sendButton').click(function(){
		var experienciaLaboral = {
			id: null, // null = nuevo
			compania: $('#workExperienceCompany').val(), 
			idIndustria: $('#workExperienceIndustry').val(),
			idPais: $('#workExperienceCountry').val(), 
			fechaDesde: $('#workExperienceDateFrom').val(),
			fechaHasta: $('#workExperienceDateTo').val(),
			logro: $('#workExperienceGoal').val(),
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
			},
			error: function(response){
				alert(response);
			}
		});
	});
	
	$('#getProvincias').click(function(){
		$.post("curriculum/getProvincias", {
			'idPais': 0
		},
		function(provincias){
			debugger;
			alert(provincias[0].descripcion);
		},
		"json");
	});

	$('#setHabilidades').click(function(){
		var habilidadesIndustrias = [
			{
				idIndustria: 1, 
				puntos: 5
			},
			{
				idIndustria: 2, 
				puntos: 5
			},
			{
				idIndustria: 3, 
				puntos: 5
			},
		];
	
		var habilidadesAreas = [
			  {
				idArea: 0, 
				idHerramienta: 0, 
				puntos: 3
			 },
			  {
				idArea: 1, 
				idHerramienta: 3, 
				puntos: 3
			 },
			 {
				idArea: 0, 
				idHerramienta: 2, 
				puntos: 3
			 },
		];

		$.post("curriculum/setHabilidadesDelCV", {
			'habilidadesIndustrias': JSON.stringify(habilidadesIndustrias),
			'habilidadesAreas': JSON.stringify(habilidadesAreas)
			},
			function(data){
				debugger;
			},
			"json"
		);

	});
	
	$('#getHerramientasPorArea').click(function(){

		$.post("util/getHerramientasPorArea", {
			'idArea': '1'
		},
		function(data){
			console.log(data);
		},
		"json");
	});
	
	return false;
});