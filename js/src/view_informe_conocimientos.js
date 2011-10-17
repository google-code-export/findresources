$(function() {

	$("#industriasGrid").flexigrid({
		url: 'informe_conocimientos/getIndustriasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Industria', name : 'descripcion', width : 450, sortable : false, align: 'center'},
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Areas de negocio disponibles',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 450,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 

	$("#herramientasGrid").flexigrid({
		url: 'informe_conocimientos/getHerramientasGrid',
		dataType: 'json',
		colModel : [
			{display: 'Area', name : 'd_area', width : 200, sortable : false, align: 'center'},
			{display: 'Herramientas', name : 'd_herramienta', width : 200, sortable : false, align: 'center'},
		],
		sortname: "orden",
		sortorder: "asc",
		usepager: true,
		title: 'Herramientas',
		useRp: true,
		rp: 15,
		showTableToggleBtn: false,
		width: 450,
		height: 500,
		onError: function(response){
			processError(response);
		} 

	}); 
	
	addExportLink("#industriasGridContent", "Informe de Industras Disponibles");
	addExportLink("#herramientasGridContent", "Informe de Aspectos de la Personalidad Disponibles");
	
	return false;
});

function addExportLink(gridContainerId, title){
	var titleElement = $(gridContainerId + " .ftitle");
	var inner = titleElement.html();
		
	titleElement.html(
		"<div style='float:left'>" + inner + "</div>" +
		"<div style='float:right'><a href='javascript:exportToPDF(\"" + gridContainerId + "\", \"" + title + "\");'><img src='images/src/pdf_icon.png'></img></a></div>"
	);
	
}

function exportToPDF(parentId, title){
	var filename = parentId.substring(1) + ".pdf";
	$("#filename").val(filename);

	var html = $(parentId + " .bDiv").html();
	
	var titleTr = $(parentId + " .hDiv thead").html();
	
	var lastPositionOfTbody = html.indexOf("<tbody>") + 7 //length of <tbody>;
		
	html = html.substring(0, lastPositionOfTbody) +
			titleTr
			+ html.substring(lastPositionOfTbody);
	
	$("#contentHtml").val(html);
	$("#pdfTitle").val(title);
	
	
	$("#exportToPdf").submit();
	
}