/**
 * TABS CODE:
 */

//this is the selected search.
var selectedSearch = null;


$(document).ready(function() {

	// Cuando el sitio carga...

	$(".tab_content").hide(); // Esconde todo el contenido

	$("ul.tabs li:first").addClass("active").show(); // Activa la
														// primera tab

	$(".tab_content:first").show(); // Muestra el contenido de la
									// primera tab

	// On Click Event

	$("ul.tabs li").click(function() {

				$("ul.tabs li").removeClass("active"); // Elimina las
														// clases
														// activas

				$(this).addClass("active"); // Agrega la clase activa a
											// la tab seleccionada

				$(".tab_content").hide(); // Esconde todo el contenido
											// de la tab

				var activeTab = $(this).find("a").attr("href"); // Encuentra
																// el
																// valor
																// del
																// atributo
																// href
																// para
																// identificar
																// la
																// tab
																// activa
																// + el
																// contenido

				$(activeTab).fadeIn(); // Agrega efecto de transición
										// (fade) en el contenido activo

				return false;

			});

});


$(function() {

		$('#searchDataPopUp .sendButton').click(function(){
			var experienciaLaboral = {
				idBusqueda: $('#searchDataEditorId').val(), // null = nuevo
				descBusqueda: $('#searchDataEditorDescription').val(),
				fechaHasta: $('#searchDataEditorDateTo').val(), 
				cantRecursos: $('#searchDataEditorResourcesQuantity').val(),
				estado: $('#searchDataEditorStatus').val() 
			};
			$.ajax({
				url: "busquedas/setBusqueda",
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
		
		$('#section1 .sendButton').click(function(){
			$('.sectionTitlePencil').css("visibility","none");
			
		});
		
		
	$('#hardSkillsPopUp .sendButton').click(function(){

		var habilidadesIndustrias = new Array();
		var startIndex = (new String("editItemIndustry")).length;
		$('.industryItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			var points = $('#' + itemId + ' .pointsInput').val();
			habilidadesIndustrias.push({
				idIndustria: id,
				valor: points,
				importancia: $('#' + itemId + ' .importanceInput').val()
			});
		});

		var habilidadesAreas = new Array();
		startIndex = (new String("editItemTool")).length;
		$('.toolItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			var points = $('#' + itemId + ' .pointsInput').val();
			habilidadesAreas.push({
				idHerramienta: id,
				valor: points,
				importancia: $('#' + itemId + ' .importanceInput').val()
			});
		});
		
		$.ajax({
			url: "busquedas/setHabilidadesDuras",
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


	
	$('#softSkillsPopUp .sendButton').click(function(){

		var habilidades = new Array();
		var startIndex = (new String("editSoftSkillItem")).length;
		$('#softSkillsPopUp .softSkillItem').each(function(i,element){
			var itemId = $(element).attr("id");
			var id = itemId.substring(startIndex);
			habilidades.push(id);
		});
		
		$.ajax({
			url: "busquedas/setHabilidadesBlandas",
			global: false,
			type: "POST",
			data: {
				'habilidades': JSON.stringify(habilidades)
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

	return false;
});

		
//$idBusqueda,$idUsuario,$descripcionBusqueda,$fechaHasta,$cantidadRecursos
function newSearch(){
	$('#searchDataEditorId').val("");
	$('#searchDataEditorDescription').val("");
	$('#searchDataEditorDateTo').val("");
	$('#searchDataEditorResourcesQuantity').val("");
	showPopUp('#searchDataPopUp');
}

function editSearchData(idSearch){
	$('#searchDataEditorId').val(userSearchs[idSearch]->id_busqueda);
	$('#searchDataEditorDescription').val("123");
	$('#searchDataEditorDateTo').val("123");
	$('#searchDataEditorResourcesQuantity').val("123");
	showPopUp('#searchDataPopUp');

}


function editHardSkills(){
	showPopUp('#hardSkillsPopUp');
}

function editSoftSkills(){
	showPopUp('#softSkillsPopUp');
}




var activatedSearch = null;

function retriveSearchData(data){
	activatedSearch = data;
}


function removeSoftSkill(idSoftSkill){
	$('#editSoftSkillItem' + idSoftSkill).remove();
}


function addSoftSkill(){
	var selectedSoftSkill = $('#availableSoftSkillsSelect').val();
	
	if($('#editSoftSkillItem' + selectedSoftSkill).length == 0){
		
		var softSkillLi = "<li id=\"editSoftSkillItem" + selectedSoftSkill  + "\" class=\"softSkillItem\">"+
					availableSoftSkills[selectedSoftSkill] + 
					"<a href=\"javascript:removeSoftSkill(" + selectedSoftSkill + ");\">X</a>" + 
				"</div></li>"

		$('#editItemSoftSkillList').append(softSkillLi);
		
	}else {
		//it is already selected.
		alert("Ya tiene esa característica seleccionada");
	}
	
}

