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
	debugger;
	$('#searchDataEditorId').val(userSearchs[idSearch].id_busqueda);
	$('#searchDataEditorDescription').val(userSearchs[idSearch].d_busqueda);
	$('#searchDataEditorDateTo').val(userSearchs[idSearch].f_hasta);
	$('#searchDataEditorResourcesQuantity').val(userSearchs[idSearch].cantidad_recursos);
	showPopUp('#searchDataPopUp');

}

function setSearchData(){
	var busqueda = {
		id_busqueda: $('#searchDataEditorId').val(), // null = nuevo
		d_busqueda: $('#searchDataEditorDescription').val(),
		f_hasta: $('#searchDataEditorDateTo').val(), 
		cantidad_recursos: $('#searchDataEditorResourcesQuantity').val()//,
		//estado: $('#searchDataEditorStatus').val() 
	};
	$.ajax({
		url: "busquedas/setBusqueda",
		global: false,
		type: "POST",
		data: {
			'busqueda': JSON.stringify(busqueda)
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

