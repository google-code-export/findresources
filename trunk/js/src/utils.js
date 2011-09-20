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
	$('#errorPopUp .inside').html(errorResponse.responseText);
	showPopUp('#errorPopUp');
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