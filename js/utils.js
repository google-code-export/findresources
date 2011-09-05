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

/*WINDOW ONLOAD*/
$(function(){
	
	$('.popup .closePopUp').click(function(){
		hidePopUp();
	});

	return false;
});