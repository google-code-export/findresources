function removeIndustry(idIndustria){
	$('#editItemIndustry' + idIndustria).remove();
}

function removeTool(idHerramienta){
	$('#editItemTool' + idHerramienta).remove();
}

function addIndustry(showImportance){
	var selectedIndustry = $('#availableIndustriesSelect').val();
	
	if(!selectedIndustry || selectedIndustry == ""){
		alert("Seleccione un area de negocio");
		return;

	}
	
	
	if($('#editItemIndustry' + selectedIndustry).length == 0){
		
		var importanceLine = ""
		
		if(showImportance){
			importanceLine =  '<div class="sliderContainer">'
							+ '<div class="slider" title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)">'
								+ '<label>%</label>'
								+ '<input type="text" class="importanceInput" value="0"/>'
							+ '</div>'
						+ '</div>'
		}
		
		var industryLi = "<li id=\"editItemIndustry" + selectedIndustry  + "\" class=\"industryItem\">"+
					"<div class=\"field\">"+
					"<div class=\"label\" >" + availableIndustries[selectedIndustry] + ":</div>" +
					
					'<div class="starRatingContainer">' + 
					"<ul class='star-rating'>" + 
							"<li class='current-rating' value=\"1\" style=\"width: 20px;\"></li>" + 
							"<li><a href='#' onclick=\"vote('#editItemIndustry" +selectedIndustry+ " .current-rating', 1); return false;\"" + 
						           "title='Trainee' class='one-star'>1</a></li>" +
							"<li><a href='#' onclick=\"vote('#editItemIndustry" +selectedIndustry+ " .current-rating',2); return false;\""  +
						           "title='Junior' class='two-stars'>2</a></li>" +
							"<li><a href='#' onclick=\"vote('#editItemIndustry" +selectedIndustry+ " .current-rating',3); return false;\"" +
						           "title='Semi senior' class='three-stars'>3</a></li>" +
							"<li><a href='#' onclick=\"vote('#editItemIndustry" +selectedIndustry+ " .current-rating',4); return false;\"" +
						           "title='Senior' class='four-stars'>4</a></li>" +
							"<li><a href='#' onclick=\"vote('#editItemIndustry" +selectedIndustry+ " .current-rating',5); return false;\"" +
						           "title='Experto' class='five-stars'>5</a></li>" +
					"</ul>" +
					"</div>" +
					importanceLine +
					"<a class=\"removeSkillLink\" href=\"javascript:removeIndustry(" + selectedIndustry + ");\"><img src=\"images/src/delete.png\"></img></a>" + 
				"</div></li>"
					
		$('#editItemIndustryList').append(industryLi);
		
		if(importanceLine != ""){
			$( "#editItemIndustry" + selectedIndustry + " .slider" ).slider({
				range: "min",
				value: 0,
				min: 0,
				max: 100,
				slide: function( event, ui ) {
					var importanceInput = $(this).find('.importanceInput');
					if(importanceInput.val() != ui.value){
						$(this).find('.importanceInput').val(ui.value);
					}
				}
			});		
		}
		
		
	}else {
		//it is already selected.
		alert("Ya tiene esa industria seleccionada");
	}
	
}

function addTool(showImportance){

	var selectedArea = $('#availableAreasSelect').val();
	var selectedTool = $('#availableToolsSelect').val();
	
	if(!selectedArea || selectedArea == -1){
		alert("Seleccione un area de negocio");
		return;
	}
	
	if(!selectedTool || selectedTool == -1){
		alert("Seleccione una herramienta");
		return;
	}
	
	
//availableTools[response[tool].id]
	var importanceLine = ""
	
	if(showImportance){
		importanceLine =  '<div class="sliderContainer">'
						+ '<div class="slider" title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)">'
							+ '<label>%</label>'
							+ '<input type="text" class="importanceInput" value="0"/>'
						+ '</div>'
					+ '</div>'
	}
	
	if($('#editItemTool' + selectedTool).length == 0){
		
		var toolLi = "<li id=\"editItemTool" + selectedTool  + "\" class=\"toolItem\" area=\""+ selectedArea + "\" >"+
					"<div class=\"field\">" +
						"<div class=\"label\">" +
							availableAreas[selectedArea] +" - " + availableTools[selectedTool] +
						":</div>" +
						'<div class="starRatingContainer">' + 
						"<ul class='star-rating'>" + 
								"<li class='current-rating' value=\"1\" style=\"width: 20px;\"></li>" + 
								"<li><a href='#' onclick=\"vote('#editItemTool" +selectedTool+ " .current-rating', 1); return false;\"" + 
							           "title='Trainee' class='one-star'>1</a></li>" +
								"<li><a href='#' onclick=\"vote('#editItemTool" +selectedTool+ " .current-rating',2); return false;\""  +
							           "title='Junior' class='two-stars'>2</a></li>" +
								"<li><a href='#' onclick=\"vote('#editItemTool" +selectedTool+ " .current-rating',3); return false;\"" +
							           "title='Semi senior' class='three-stars'>3</a></li>" +
								"<li><a href='#' onclick=\"vote('#editItemTool" +selectedTool+ " .current-rating',4); return false;\"" +
							           "title='Senior' class='four-stars'>4</a></li>" +
								"<li><a href='#' onclick=\"vote('#editItemTool" +selectedTool+ " .current-rating',5); return false;\"" +
							           "title='Experto' class='five-stars'>5</a></li>" +
						"</ul>" +
						"</div>" +
						importanceLine +
						"<a class=\"removeSkillLink\" href=\"javascript:removeTool(" + selectedTool + ");\"><img src=\"images/src/delete.png\"></img></a>" + 
					"</div>" +
				"</li>"

		$('#editItemToolList').append(toolLi);
		
		if(importanceLine != ""){
			$( "#editItemTool" + selectedTool + " .slider" ).slider({
				range: "min",
				value: 0,
				min: 0,
				max: 100,
				slide: function( event, ui ) {
					var importanceInput = $(this).find('.importanceInput');
					if(importanceInput.val() != ui.value){
						$(this).find('.importanceInput').val(ui.value);
					}
				}
			});		
		}
				
		
		
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
				processError(response);
			}
		});
		
	});

});