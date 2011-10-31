function updateForm(){
	$("#width").val($("#drag").attr("offsetWidth"));
	$("#height").val($("#drag").attr("offsetHeight"));
	$("#top").val($("#drag").attr("offsetTop"));
	$("#left").val($("#drag").attr("offsetLeft"));
}
$(document).ready(function(){
	updateForm();
	$("#drag").resizable({
		 stop: function() {
		  	updateForm();
		  }
	});
	$("#drag").draggable({
		  containment: 'parent',
		  stop: function() {
		  	updateForm();
		  }
	});
	$(".tag").hover(
	function () {
	$(this).addClass("tagOn");
	},
	function () {
	$(this).removeClass("tagOn");
	}
	);

/** PARA MOSTRAR LAS COORDENADAS EN PANTALLA AL MOVER EL MOUSE**/
	$("#drag").mousemove(function(e){
	document.Show.MouseX.value = $("#drag").attr("offsetWidth");
	document.Show.MouseY.value = $("#drag").attr("offsetHeight");
	document.Show.MouseW.value = $("#drag").attr("offsetTop");
	document.Show.MouseZ.value = $("#drag").attr("offsetLeft");
	});
/** **/
});
/*
$(function() {
	var availableTags = [
	                     "alas",
	                     "animales",
	                     "antenas",
	                     "ara�a",
	                     "�rbol",
	                     "ballena",
	                     "bota",
	                     "botas",
	                     "bowling",
	                     "bruja",
	                     "busto de mujer",
	                     "cabeza",
	                     "cabeza de animal",
	                     "cabeza de burro",
	                     "cabeza de conejo",
	                     "cabeza de drag�n",
	                     "cabeza de mujer",
	                     "cabeza de p�jaro",
	                     "cabra",
	                     "cabra con bigotes",
	                     "cangrejo",
	                     "cara",
	                     "cocinando",
	                     "cocinando con una olla",
	                     "cola",
	                     "colmillos",
	                     "columna",
	                     "cordero",
	                     "corderos",
	                     "costillas",
	                     "cuernos",
	                     "cuernos de reno",
	                     "cuero",
	                     "cuero de animal",
	                     "delfin",
	                     "diablo",
	                     "dos cabezas",
	                     "dos cabezas de mujer",
	                     "dos cabezas de ni�os",
	                     "dos cangrejos",
	                     "dos conejos",
	                     "dos conejos saltando",
	                     "dos mozos",
	                     "dos mujeres",
	                     "dos mujeres lavando",
	                     "dos payasos",
	                     "dos perros",
	                     "elefante",
	                     "espina dorsal",
	                     "estatua",
	                     "foca",
	                     "foto",
	                     "fuente",
	                     "fuente iluminada por luces",
	                     "gato",
	                     "gorila",
	                     "gorro",
	                     "gorro de payaso",
	                     "gorro puntiagudo",
	                     "gru�ido",
	                     "guantes",
	                     "gusano",
	                     "hombre",
	                     "hombre sentado",
	                     "hueso de pollo",
	                     "insecto",
	                     "italia",
	                     "langosta",
	                     "leon",
	                     "leones",
	                     "manos con guantes",
	                     "manos levantadas",
	                     "mantis",
	                     "mapa de italia",
	                     "marciano",
	                     "mariposa",
	                     "monje",
	                     "mono",
	                     "monos",
	                     "monstruo",
	                     "mozos",
	                     "mujer",
	                     "mujer sin brazos",
	                     "mujer sin cabeza",
	                     "murci�lago",
	                     "nene",
	                     "ni�o",
	                     "ojos",
	                     "orca",
	                     "oso",
	                     "oso sin cabeza",
	                     "osos",
	                     "p�jaro",
	                     "p�jaros",
	                     "papa noel",
	                     "papa noel con una bolsa en su espalda",
	                     "pata de animal",
	                     "pata de pollo",
	                     "patas",
	                     "payaso",
	                     "pechos de mujer",
	                     "pelea",
	                     "pene",
	                     "perro",
	                     "perro de juguete",
	                     "perros",
	                     "persona",
	                     "personas jugando",
	                     "piel",
	                     "piel de animal",
	                     "pierna",
	                     "pierna de persona",
	                     "pulpo",
	                     "renos",
	                     "saltamontes",
	                     "saltamontes con antenas",
	                     "se�or",
	                     "se�ora",
	                     "serpiente",
	                     "smoking",
	                     "taza",
	                     "tigre",
	                     "topo",
	                     "topos",
	                     "t�tem",
	                     "tres cohetes en la punta",
	                     "tronco cortado",
	                     "varon",
	                     "zapatos"
	];
	$( "#description" ).autocomplete({
		source: availableTags
	});
});
*/
   