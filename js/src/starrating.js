function vote(element, points){
	$(element).css("width", (points * 20) + "px");
	$(element).attr("value", points);
}


function getVote(element){
	$(element).attr("value");
}

/*WINDOW ONLOAD*/
$(function(){
	$(".current-rating").each(function(i,element){
		var points = $(element).attr("value");
		vote(element, points);
		
	});

});