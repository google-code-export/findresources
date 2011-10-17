$(function() {
	$("body").append(
		"<form method='post' enctype='multipart/form-data' action='/dompdf/getpdf.php' id='exportToPdf' target='iframeUpload'>" + 
			'<input id="contentHtml" name="contentHtml" type="hidden"/>' + 
			'<input id="filename" name="filename" type="hidden"/>' + 
			'<input id="pdfTitle" name="title" type="hidden"/>' + 
			'<iframe name="iframeUpload" style="display:none"></iframe>' + 
		'</form>'
	);
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