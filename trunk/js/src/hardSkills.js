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

$(function(){
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

});