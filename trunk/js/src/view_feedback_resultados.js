///global variable.-
var busquedasGrid = null;

function getBusquedas(){
	var busquedasSearchName = $('#busquedasSearchName').val().trim();
	var busquedasCompanyName = $('#busquedasCompanyName').val().trim();
	var busquedasCompanyMail = $('#busquedasCompanyMail').val().trim();
	
	var url = 'feedback_resultados/getBusquedasGrid?';
	url += 'nombreDeBusqueda=' + busquedasSearchName;
	url += '&nombreDeEmpresa=' + busquedasCompanyName;
	url += '&mailDeEmpresa=' + busquedasCompanyMail;
	
	var title = 'Búsquedas del sistema ';
	title += (busquedasSearchName!="")? ", con nombre de búsqueda '" + busquedasSearchName + "'":"";
	title += (busquedasCompanyName!="")? ", de la empresa '" + busquedasCompanyName + "'":"";
	title += (busquedasCompanyMail!="")? ", de la empresa con mail '" + busquedasCompanyMail + "'":"";

	
	if(!busquedasGrid){
		busquedasGrid = $("#busquedasGrid").flexigrid({
			url: url,
			dataType: 'json',
			colModel : [
				{display: 'Nombre ', name : 'nombre', width : 230, sortable : false, align: 'center'},
				{display: 'Empresa', name : 'empresa', width : 250, sortable : false, align: 'center'},
				{display: 'Mail', name : 'mail', width : 100, sortable : false, align: 'center'},
				{display: 'Conocimientos', name : 'Conocimientos', width : 100, sortable : false, align: 'center'},
				{display: 'Aspectos', name : 'aspectos', width : 100, sortable : false, align: 'center'},
				{display: 'Ver Candidatos', name : 'ver_candidatos', width : 100, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			title: title,
			rp: 15,
			width: 850,
			height: 500,
			onError: function(response){
				processError(response);
			} 
	
		}); 
		
		addExportLink("#busquedasGridContainer", title);
	
	}else{
		$("#busquedasGrid").flexOptions({url: url, title: title}); 
		$("#busquedasGrid").flexReload(); 

	}
	
	return false;
};

///global variable.-
var candidatosGrid = null;

function showCandidatos(idBusqueda, name){
	
	if(!candidatosGrid){
		candidatosGrid =  $("#candidatosGrid").flexigrid({
			url: 'feedback_resultados/getCandidatosGrid?idBusqueda=' + idBusqueda,
			dataType: 'json',
			colModel : [
				{display: 'Apellido', name : 'fecha', width : 100, sortable : false, align: 'center'},
				{display: 'Nombre', name : 'entradas', width : 100, sortable : false, align: 'center'},
				{display: 'Email', name : 'entradas', width : 200, sortable : false, align: 'center'},
				{display: 'Aspectos de la personalidad', name : 'entradas', width : 220, sortable : false, align: 'center'}
			],
			sortname: "orden",
			sortorder: "asc",
			title: 'Búsquedas de la empresa ' + name,
			rp: 15,
			width: 700,
			height: 420,
			onError: function(response){
				processError(response);
			} 
		}); 
		addExportLink("#candidatosGridContainer", 'Búsquedas de la empresa ' + name);
	}else{
		$("#candidatosGrid").flexOptions({url: 'feedback_resultados/getCandidatosGrid?idBusqueda=' + idBusqueda, title: 'Candidatos de la búsqueda' + name}); 
		$("#candidatosGrid").flexReload(); 
	}

	showPopUp('#candidatosGridPopUp');

}
