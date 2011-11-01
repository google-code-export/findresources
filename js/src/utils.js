function showPopUp(id)
{
	$('.opacity').show().animate({opacity:'0.7'},500);
	$('.popup#'+id).show().animate({opacity:'1'},500);
	window.scroll(0,0);
}

function hidePopUp()
{
	$('.opacity').animate({opacity:'0'},500,function(){$(this).hide()});
	$('.popup').animate({opacity:'0'},500,function(){$(this).hide()});
}

function processError(errorResponse){
	
	alert("Por favor verifique los datos ingresados.");
	//$('#errorPopUp .popuptitle').html("System Error (status:" + errorResponse.statusText + ")");
	//$('#errorPopUp .inside').html(errorResponse.responseText);
	//showPopUp('#errorPopUp');
}

function processError2(xhr, ajaxOptions, thrownError){
	alert("Error al guardar la informaci�n. Intente nuevamente.\n\n"+thrownError);
}

/*WINDOW ONLOAD*/
$(function(){
	if($(".datepicker").length != 0){
		$(".datepicker").datepicker({ dateFormat: 'dd/mm/yy'});
	}
	//$.datepicker.formatDate('yy-mm-dd', new Date(2007, 1 - 1, 26));

	
	$('.popup .closePopUp').click(function(){
		hidePopUp();
	});

	$('.popup .cancelPopUp').click(function(){
		hidePopUp();
	});

return false;
});


/* Inicialización en español para la extensión 'UI date picker' para jQuery. */
/* Traducido por Vester (xvester@gmail.com). */
jQuery(function($){
	if($.datepicker){
		$.datepicker.regional['es'] = {
				closeText: 'Cerrar',
				prevText: '&#x3c;Ant',
				nextText: 'Sig&#x3e;',
				currentText: 'Hoy',
				monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
				'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
				monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
				'Jul','Ago','Sep','Oct','Nov','Dic'],
				dayNames: ['Domingo','Lunes','Martes','Mi&eacute;rcoles','Jueves','Viernes','S&aacute;bado'],
				dayNamesShort: ['Dom','Lun','Mar','Mi&eacute;','Juv','Vie','S&aacute;b'],
				dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','S&aacute;'],
				weekHeader: 'Sm',
				dateFormat: 'dd/mm/yy',
				firstDay: 1,
				isRTL: false,
				showMonthAfterYear: false,
				yearSuffix: ''};
			$.datepicker.setDefaults($.datepicker.regional['es']);
		
	}
});