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
				descripcionBusqueda: $('#searchDataEditorDescription').val(),
				fechaHasta: $('#searchDataEditorDateTo').val(), 
				cantidadRecursos: $('#searchDataEditorResourcesQuantity').val()
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

var activatedSearch = null;

function retriveSearchData(data){
	activatedSearch = data;
}
