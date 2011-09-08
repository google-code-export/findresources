<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de MIPS</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test images psychology mips intelligence" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/libs/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/libs/jquery.metadata.js" ></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<script type="text/javascript">
	/*
	$.metadata.setType("attr", "validate");
	
	$(document).ready(function() {
		$("#quiz_form").validate();
	});
	*/
	function show(num){
		$('#fila'+num).fadeIn('slow');
		//$('body').animate({scrollTop: $('#bottom').offset().top}, 1000);
		//$(window).scrollTop($(document).height());
        $('body').animate({scrollTop: $('body').height()}, 800);

	}
	</script>
</head> 
<body> 

<?php
/** PAGINA DE INICIO DEL TEST **/
if ($source== "init_test"){
?>
<div id="page"> 
<center> 
<h1 style="text-align:center;">Test de MIPS</h1> 
Responda a las siguientes 180 preguntas por Verdadero o Falso. 
<br /><br />
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="init_test" />
<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
</form> 
</center>
<?php 
}
/** PAGINA DE SELECCION DE FICHAS DEL TEST **/
if ($source == "select_questions"){

/** LISTADO DE PREGUNTAS **/
$preguntas[1] = "Soy una persona tranquila y colaboradora";
$preguntas[2] = "Siempre hice lo que quise y asumí las consecuencias";
$preguntas[3] = "Me gusta hacerme cargo de un tarea";
$preguntas[4] = "Tengo una manera habitual de hacer las cosas , con las que evito equivocarme";
$preguntas[5] = "Contesto las cartas el mismo día que las recibo";
$preguntas[6] = "A veces me las arreglo para arruinar las cosas buenas que me pasan";
$preguntas[7] = "Ya no me entusiasman muchas cosas como antes.";
$preguntas[8] = "Preferiría ser un seguidor más que un Líder.";
$preguntas[9] = "Me esfuerzo para tratar de ser popular";
$preguntas[10] = "Siempre he tenido talento para lograr éxito en lo que hago";
$preguntas[11] = "Con frecuencia me doy cuenta de que he sido tratadoinjustamente.";
$preguntas[12] = "Me siento incomodo cuando me tratan con bondad";
$preguntas[13] = "Con frecuencia me siento tenso en situaciones sociales";
$preguntas[14] = "Creo que la policía abusa del poder que tiene";
$preguntas[15] = "Algunas veces he tenido que ser algo rudo con la gente";
$preguntas[16] = "Los niños deben obedecer siempre las indicaciones de losmayores.";
$preguntas[17] = "A menudo estoy disgustado por la forma en que se hacen lascosas.";
$preguntas[18] = "A menudo espero que me pase lo peor.";
$preguntas[19] = "Me preocuparía poco no tener amigos.";
$preguntas[20] = "Soy tímido e inhibido en situaciones sociales.";
$preguntas[21] = "Aunque esté en desacuerdo, por lo general dejo que la gentehaga lo que quiera.";
$preguntas[22] = "Es imposible pretender que las personas digan siempre laverdad.";
$preguntas[23] = "Puedo hacer comentarios desagradables si considero que lapersona se lo merece.";
$preguntas[24] = "Me gusta cumplir con lo establecido y hacer lo que se espera de mi";
$preguntas[25] = "Muy poco de lo que hago es valorado por los demás.";
$preguntas[26] = "Casi todo lo que intento hacer me resulta fácil.";
$preguntas[27] = "En los últimos tiempos me he convertido en una persona másencerrada en sí misma.";
$preguntas[28] = "Tiendo a dramatizar lo que me pasa.";
$preguntas[29] = "Siempre trato de hacer lo que es correcto.";
$preguntas[30] = "Dependo poco de la amistad de los demás.";
$preguntas[31] = "Nunca he estado estacionado por más del tiempo del que unparquímetro establecía como límite.";
$preguntas[32] = "Los castigos nunca impidieron hacer lo que quiero.";
$preguntas[33] = "Me gusta acomodar todas las cosas hasta en sus mínimosdetalles.";
$preguntas[34] = "A menudo los demás logran molestarme.";
$preguntas[35] = "Jamás he desobedecido las indicaciones de mis padres.";
$preguntas[36] = "Siempre logro conseguir lo que quiero, aunque tenga quepresionar a los demás.";
$preguntas[37] = "Nada es más importante que proteger la reputación personal.";
$preguntas[38] = "Creo que los demás tienen mejores oportunidades que yo.";
$preguntas[39] = "Ya no expreso lo que realmente siento.";
$preguntas[40] = "Es improbable que lo que tengo para decir interese a losdemás.";
$preguntas[41] = "Me esfuerzo por conocer gente interesante y tener aventuras.";
$preguntas[42] = "Me tomo con poca seriedad las responsabilidades que tengo.";
$preguntas[43] = "Soy una persona dura, poco sentimental.";
$preguntas[44] = "Pocas cosas en la vida pueden conmoverme.";
$preguntas[45] = "Me tensiona mucho el tener que conocer y conversar con gentenueva.";
$preguntas[46] = "Soy una persona dura, poco sentimental.";
$preguntas[47] = "Actúo en función del momento, de las circunstancias.";
$preguntas[48] = "En general, primero planifico";
$preguntas[49] = "Con frecuencia me he sentido inquieto, con ganas de dirigirme hacia cualquier otro lado.";
$preguntas[50] = "Creo que lo mejor es controlar nuestras emociones.";
$preguntas[51] = "Desearía que la gente no me culpara a mí cuando algo salemal.";
$preguntas[52] = "Creo que yo soy mi peor enemigo.";
$preguntas[53] = "Tengo pocos lazos afectivos fuertes con otras personas.";
$preguntas[54] = "Me pongo ansioso si estoy con personas que no conozco bien.";
$preguntas[55] = "Es correcto tratar de burlar la ley, sin dejar de cumplirla.";
$preguntas[56] = "Hago mucho por lo demás, pero hacen poco por mí.";
$preguntas[57] = "Siempre he sentido que las personas no tienen una buenaopinión de mí.";
$preguntas[58] = "Me tengo mucha confianza.";
$preguntas[59] = "Sistemáticamente ordeno mis papeles y materiales de trabajo.";
$preguntas[60] = "Mi experiencia me ha enseñado que las cosas buenas duran poco.";
$preguntas[61] = "Algunos dicen que me gusta hacerme la victima.";
$preguntas[62] = "Me siento mejor cuando estoy solo.";
$preguntas[63] = "Me pongo más tenso que los demás frente a situaciones nuevas.";
$preguntas[64] = "Generalmente trato de evitar las desilusione, por más queesté convencido de tener razón.";
$preguntas[65] = "Busco soluciones novedosas y excitantes para mí.";
$preguntas[66] = "Hubo épocas en que mis padres tuvieron problemas por micomportamiento.";
$preguntas[67] = "Siempre termino mi trabajo antes de descansar.";
$preguntas[68] = "Otros consiguen cosas que yo no logro.";
$preguntas[69] = "A veces siento que merezco ser infeliz.";
$preguntas[70] = "Espero que las cosas tomen su curso antes de decidir quehacer.";
$preguntas[71] = "Me ocupo más de los otros que de mí mismo.";
$preguntas[72] = "A menudo creo que mi vida va de mal en peor.";
$preguntas[73] = "El solo estar con otras personas me hace sentir inspirado.";
$preguntas[74] = "Cuando manejo siempre controlo las señalas sobre límites develocidad y cuido no excederme.";
$preguntas[75] = "Uso mi cabeza y no mi corazón para tomar decisiones.";
$preguntas[76] = "Me guió por mis instituciones más que por la información quetengo sobre algo.";
$preguntas[77] = "Jamás envidio los logros de los otros.";
$preguntas[78] = "En la escuela, me gustaron las materias practicas que lateóricas.";
$preguntas[79] = "Planifico las cosas con anticipación y actúo enérgicamentepara que mis planes se cumplan.";
$preguntas[80] = "Mi corazón maneja mi cerebro.";
$preguntas[81] = "Siempre puedo ver el lado positivo de la vida.";
$preguntas[82] = "A menudo espero que alguien solucione mis problemas.";
$preguntas[83] = "Hago lo que quiero, sin pensar cómo va a afectar a otros.";
$preguntas[84] = "Reacciono con rapidez ante cualquier situación que puedallegar a ser un problema para mí.";
$preguntas[85] = "Sólo me siento una buena persona cuando ayudo a los demás.";
$preguntas[86] = "Si algo sale mal, aunque no sea muy importante, se me arruinael día.";
$preguntas[87] = "Disfruto más de mis fantasías de la realidad.";
$preguntas[88] = "Me siento satisfecho con dejar que las cosas ocurran sininterferir.";
$preguntas[89] = "Trato de ser más lógico que emocional.";
$preguntas[90] = "Prefiero las cosas que se pueden ver y tocar antes que lassolo sólo se imaginan.";
$preguntas[91] = "Me resulta difícil ponerme a conversar con alguien que acabode conocer.";
$preguntas[92] = "Ser afectuosos es más importante que ser frío y calculador.";
$preguntas[93] = "Las predicciones sobre el futuro son más interesantes para míque los hechos del pasado.";
$preguntas[94] = "Me resulta fácil disfrutar de las cosas.  ";
$preguntas[95] = "Me siento incapaz de influir sobre el mundo que me rodea.";
$preguntas[96] = "Vivo en términos de mis propias necesidades, no basado en lasde los demás.";
$preguntas[97] = "No espero que las cosas me pasen, hago que sucedan como yoquiero.";
$preguntas[98] = "Evito contestar mal aun cuando estoy muy enojado.";
$preguntas[99] = "La necesidad de ayudar a otros guía mi vida.";
$preguntas[100] = "A menudo me siento muy tenso, a la espera de que algo salgamal.";
$preguntas[101] = "Aun cuando era muy joven, jamás intenté copiarme un examen.";
$preguntas[102] = "Siempre soy frío y objetivo al tratar con la gente.";
$preguntas[103] = "Prefiero aprender a manejar un aparato antes que especularsobre por qué funciona de ese modo";
$preguntas[104] = "Soy una persona difícil de conocer bien.";
$preguntas[105] = "Paso mucho tiempo pensando en los misterios de la vida.";
$preguntas[106] = "Manejo con facilidad mi cambio de estados de ánimo.";
$preguntas[107] = "Soy algo pasivo y lento en temas relacionados con laorganización de mi vida.";
$preguntas[108] = "Hago lo que quiero sin importarme el complacer a otros";
$preguntas[109] = "Jamás haré algo, por más fuerte que sea la tentación dehacerlo.";
$preguntas[110] = "Mis amigos y familiares recurren a mi para encontrar afecto y apoyo.";
$preguntas[111] = "Aún cuando todo está bien, generalmente pienso en que prontova a empeorar.";
$preguntas[112] = "Planifico con cuidado mi trabajo antes de empezar a hacerlo.";
$preguntas[113] = "Soy impersonal y objetivo al tratar de resolver un problema.";
$preguntas[114] = "Soy una persona realista a la que no le gustan lasespeculaciones";
$preguntas[115] = "Algunos de mis mejores amigos desconocen realmente lo que yosiento";
$preguntas[116] = "La gente piensa que soy una persona más racional que afectiva";
$preguntas[117] = "Mi sentido de realidad es mejor que mi imaginación";
$preguntas[118] = "Primero me preocupo por mi y después por los demás";
$preguntas[119] = "Dedico mucho esfuerzo a que las cosas me salgan bien";
$preguntas[120] = "Siempre mantengo mi compostura, sin importar lo que estépasando";
$preguntas[121] = "Demuestro mucho afecto a mis amigos";
$preguntas[122] = "Pocas cosas me han salido bien.";
$preguntas[123] = "Me gusta conocer gente nueva y saber cosas sobre sus vidas.";
$preguntas[124] = "Soy capaz de ignorar aspectos emocionales y afectivos en mitrabajo.";
$preguntas[125] = "Prefiero ocuparme de realidades más que de posibilidades.";
$preguntas[126] = "Necesito mucho tiempo para poder estar a solas con mispensamientos.";
$preguntas[127] = "Los afectos del corazón son más importantes que la lógica dela mente.";
$preguntas[128] = "Me gustan más los soñadores que los realistas.";
$preguntas[129] = "Soy más capaz que los demás de reírme de los problemas.";
$preguntas[130] = "Creo que es poco lo que puedo hacer yo, así que prefieroesperar a ver qué pasa.";
$preguntas[131] = "Nunca me pongo a discutir, aunque esté muy enojada.";
$preguntas[132] = "Expreso lo que pienso de manera franca y abierta.";
$preguntas[133] = "Me preocupo por el trabajo que hay que realizar y no por loque siente la gente que practica";
$preguntas[134] = "Trabajar con ideas creativas sería lo ideal para mí.";
$preguntas[135] = "Soy el tipo de persona que no se toma la vida muy en serio,prefiero ser más espectador que actor.";
$preguntas[136] = "Me desagrada depender de alguien en mi trabajo.";
$preguntas[137] = "Trato de asegurar que las cosas me salgan como yo quiero.";
$preguntas[138] = "Disfruto más de las realidades concretas que de lasfantasías.";
$preguntas[139] = "Montones de hechos pequeños me ponen de mal humor.";
$preguntas[140] = "Aprendo mejor Observando y hablando con la gente.";
$preguntas[141] = "No me satisface dejar que las cosas sucedan y simplementecontemplarlas.";
$preguntas[142] = "No me atrae conocer gente nueva.";
$preguntas[143] = "Pocas veces sé cómo mantener una conversación.";
$preguntas[144] = "Siempre tengo en cuenta los sentimientos de las otraspersonas.";
$preguntas[145] = "Confío más en mis propias decisiones, evitando los consejosde otros.";
$preguntas[146] = "Trato de no actuar hasta saber qué van a hacer los demás.";
$preguntas[147] = "Me gusta tomar mis propias decisiones, evitando los consejosde otros.";
$preguntas[148] = "Muchas veces muy mal sin saber por qué.";
$preguntas[149] = "Me gusta ser muy popular, participar en muchas actividades sociales.";
$preguntas[150] = "Raramente cuento a otros lo que pienso.";
$preguntas[151] = "Me entusiasman casi todas las actividades que realizo.";
$preguntas[152] = "En mí es una práctica constante depender de mi mismo y no deotros.";
$preguntas[153] = "La mayor parte del tiempo la dedico a organizar losacontecimientos de mi vida.";
$preguntas[154] = "No hay mejor que el afecto que se siente estando en medio delgrupo familiar.";
$preguntas[155] = "Algunas veces estoy tenso o deprimido sin saber por que.";
$preguntas[156] = "Disfruto conversando sobre temas o sucesos místicos.";
$preguntas[157] = "Dedico cuáles son las cosas prioritarias y luego actúofirmemente para poder lograrlas.";
$preguntas[158] = "No dudo en orientar a las personas hacia lo que creo que esmejor para ellas.";
$preguntas[159] = "Me enorgullece ser eficiente y organizado.";
$preguntas[160] = "Me desagradan las personas que no se convierten en líderessin razones que lo justifiquen.";
$preguntas[161] = "Soy ambicioso.";
$preguntas[162] = "Sé como seducir a la gente.";
$preguntas[163] = "La gente puede confiar en que voy a hacer bien mi trabajo.";
$preguntas[164] = "Los demás me consideran una persona más afectiva queracional.";
$preguntas[165] = "Estaría dispuesto a trabajar mucho tiempo para poder llegar aser alguien importante.";
$preguntas[166] = "Me gustaría mucho poder vender nuevas ideas o productos a lagente.";
$preguntas[167] = "Generalmente logro persuadir a los demás para que hagan loque yo quiero que hagan.";
$preguntas[168] = "Me gustan los trabajos en lo que hay que prestar muchaatención a los detalles.";
$preguntas[169] = "Soy muy introspectivo, siempre trato de entender mispensamientos y emociones.";
$preguntas[170] = "Confío mucho en mis habilidades sociales.";
$preguntas[171] = "Generalmente puedo evaluar las situaciones rápidamente, yactuar para que las cosas salgan como yo quiero.";
$preguntas[172] = "En una discusión soy capaz de persuadir a casi todos para queapoyen mi posición.";
$preguntas[173] = "Soy capaz de llevar a cabo cualquier trabajo pese a losobstáculos que puedan presentarse.";
$preguntas[174] = "Como si fuera un buen vendedor, puedo influir sobre los demásexitosamente, con modales agradables.";
$preguntas[175] = "Conocer gente nueva es un objetivo importante para mi.";
$preguntas[176] = "Al tomar decisiones creo que lo más importante es pensar enel bienestar de la gente involucrada.";
$preguntas[177] = "Tengo paciencia para realizar trabajos que requieren muchapresión.";
$preguntas[178] = "Mi capacidad para fantasear es superior a mi sentido derealidad.";
$preguntas[179] = "Estoy motivado para llegar a ser uno de los mejores en micampo de trabajo.";
$preguntas[180] = "Tengo una forma de ser que lograr que la gente enseguidaguste de mí.";

?>
<center>
<h1>Test de MIPS</h1>
<h3>Preguntas</h3>
<h4>Responda por Verdadero o Falso: </h4><br />
</center>

<form method="POST" id="quiz_form" name="quiz_form" class="questions">
<table class="mips" >
<?php
$i=0;
foreach ($preguntas as $pregunta) {
$i++;
?>
	<tr id="<?php echo "fila".$i;?>" style="<?php echo ($i==1)? "": "display:none";?>">
		<td width="800px">
			<img src="<?php echo base_url();?>/images/mips/square_bullet_green.gif" /> <b><?php echo $i.". ".$pregunta;?></b>
			<label for="q<?php echo $i;?>" class="error">Por favor completar</label>
		</td>
		<td width="100px">
		<input type="radio" id=cb name="q<?php echo $i;?>" value="V" validate="required:true" onclick="<?php echo ($i == 180)? "$('form:first').submit();" : "show(".($i+1).")";?>" /> Verdadero<br />
		<input type="radio" id=cb name="q<?php echo $i;?>" value="F" onclick="<?php echo ($i == 180)? "$('#quiz_form').submit();" : "show(".($i+1).")";?>" /> Falso<br />
		</td>
	</tr>
	<!-- <tr id="<?php echo "fila".$i;?>" style="<?php echo ($i==1)? "": "display:none";?>">
		<td colspan="2"><hr></td>
	</tr>-->
<?php 
}
?>
	<tr>
		<td>
		<input type="hidden" name="source" value="<?php echo $source;?>" /><br /><br />
		<!-- <input type=submit value="Finalizar Test">-->	 
		<?php //Resolver tema de que no ejecuta la validación del form ?> 
		</td>
	</tr>
</table>
</form>
<br />
<br />
<br />
<br />
<br />
 <?php 
}
/** PAGINA FINAL DEL TEST **/
if ($source == "test_finished") {
	echo '<br /><h3>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h3><br /><hr>';
	echo '<a href="'.base_url().'Test">Continuar con el siguiente test.</a><br /><hr><br />';
	/*echo '<pre>RESULTADOS:<br />
	 Pregunta 1: '.	$q1.'<br />
	 Pregunta 2: '.	$q2.'<br />
	 Pregunta 3: '.	$q3.'<br />
	 Pregunta 4: '.	$q4.'<br />
	 Pregunta 5: '.	$q5.'<br />
	 Pregunta 6: '.	$q6.'<br />
	 Pregunta 7: '.	$q7.'<br />
	 Pregunta 8: '.	$q8.'<br />
	 Pregunta 9: '.	$q9.'<br />
	 Pregunta 10: '.$q10.'<br />
	 Pregunta 11: '.$q11.'<br />
	 Pregunta 12: '.$q12.'<br />
	 Pregunta 13: '.$q13.'<br />
	 Pregunta 14: '.$q14.'<br />
	 Pregunta 15: '.$q15.'<br />
	 Pregunta 16: '.$q16.'<br />
	 Pregunta 17: '.$q17.'<br />
	 Pregunta 18: '.$q18.'<br />
	 Pregunta 19: '.$q19.'<br />
	 Pregunta 20: '.$q20.'<br />
	 Pregunta 21: '.$q21.'<br />
	 Pregunta 22: '.$q22.'<br />
	 Pregunta 23: '.$q23.'<br />
	 Pregunta 24: '.$q24.'<br />
	 Pregunta 25: '.$q25.'<br />
	 Pregunta 26: '.$q26.'<br />
	 Pregunta 27: '.$q27.'<br />
	 Pregunta 28: '.$q28.'<br />
	 Pregunta 29: '.$q29.'<br />
	 Pregunta 30: '.$q30.'<br />
	 Pregunta 31: '.$q31.'<br />
	 Pregunta 32: '.$q32.'<br />
	 Pregunta 33: '.$q33.'<br />
	 Pregunta 34: '.$q34.'<br />
	 Pregunta 35: '.$q35.'<br />
	 Pregunta 36: '.$q36.'<br />
	 Pregunta 37: '.$q37.'<br />
	 Pregunta 38: '.$q38.'<br />
	 Pregunta 39: '.$q39.'<br />
	 Pregunta 40: '.$q40.'<br />
	 Pregunta 41: '.$q41.'<br />
	 Pregunta 42: '.$q42.'<br />
	 Pregunta 43: '.$q43.'<br />
	 Pregunta 44: '.$q44.'<br />
	 Pregunta 45: '.$q45.'<br />
	 Pregunta 46: '.$q46.'<br />
	 Pregunta 47: '.$q47.'<br />
	 Pregunta 48: '.$q48.'<br />
	 Pregunta 49: '.$q49.'<br />
	 Pregunta 50: '.$q50.'<br />
	 Pregunta 51: '.$q51.'<br />
	 Pregunta 52: '.$q52.'<br />
	 Pregunta 53: '.$q53.'<br />
	 Pregunta 54: '.$q54.'<br />
	 Pregunta 55: '.$q55.'<br />
	 Pregunta 56: '.$q56.'<br />
	 Pregunta 57: '.$q57.'<br />
	 Pregunta 58: '.$q58.'<br />
	 Pregunta 59: '.$q59.'<br />
	 Pregunta 60: '.$q60.'<br />
	 Pregunta 61: '.$q61.'<br />
	 Pregunta 62: '.$q62.'<br />
	 Pregunta 63: '.$q63.'<br />
	 Pregunta 64: '.$q64.'<br />
	 Pregunta 65: '.$q65.'<br />
	 Pregunta 66: '.$q66.'<br />
	 Pregunta 67: '.$q67.'<br />
	 Pregunta 68: '.$q68.'<br />
	 Pregunta 69: '.$q69.'<br />
	 Pregunta 70: '.$q70.'<br />
	 Pregunta 71: '.$q71.'<br />
	 Pregunta 72: '.$q72.'<br />
	 Pregunta 73: '.$q73.'<br />
	 Pregunta 74: '.$q74.'<br />
	 Pregunta 75: '.$q75.'<br />
	 Pregunta 76: '.$q76.'<br />
	 Pregunta 77: '.$q77.'<br />
	 Pregunta 78: '.$q78.'<br />
	 Pregunta 79: '.$q79.'<br />
	 Pregunta 80: '.$q80.'<br />
	 Pregunta 81: '.$q81.'<br />
	 Pregunta 82: '.$q82.'<br />
	 Pregunta 83: '.$q83.'<br />
	 Pregunta 84: '.$q84.'<br />
	 Pregunta 85: '.$q85.'<br />
	 Pregunta 86: '.$q86.'<br />
	 Pregunta 87: '.$q87.'<br />
	 Pregunta 88: '.$q88.'<br />
	 Pregunta 89: '.$q89.'<br />
	 Pregunta 90: '.$q90.'<br />
	 Pregunta 91: '.$q91.'<br />
	 Pregunta 92: '.$q92.'<br />
	 Pregunta 93: '.$q93.'<br />
	 Pregunta 94: '.$q94.'<br />
	 Pregunta 95: '.$q95.'<br />
	 Pregunta 96: '.$q96.'<br />
	 Pregunta 97: '.$q97.'<br />
	 Pregunta 98: '.$q98.'<br />
	 Pregunta 99: '.$q99.'<br />
	 Pregunta 100: '.$q100.'<br />
	 Pregunta 101: '.$q101.'<br />
	 Pregunta 102: '.$q102.'<br />
	 Pregunta 103: '.$q103.'<br />
	 Pregunta 104: '.$q104.'<br />
	 Pregunta 105: '.$q105.'<br />
	 Pregunta 106: '.$q106.'<br />
	 Pregunta 107: '.$q107.'<br />
	 Pregunta 108: '.$q108.'<br />
	 Pregunta 109: '.$q109.'<br />
	 Pregunta 110: '.$q110.'<br />
	 Pregunta 111: '.$q111.'<br />
	 Pregunta 112: '.$q112.'<br />
	 Pregunta 113: '.$q113.'<br />
	 Pregunta 114: '.$q114.'<br />
	 Pregunta 115: '.$q115.'<br />
	 Pregunta 116: '.$q116.'<br />
	 Pregunta 117: '.$q117.'<br />
	 Pregunta 118: '.$q118.'<br />
	 Pregunta 119: '.$q119.'<br />
	 Pregunta 120: '.$q120.'<br />
	 Pregunta 121: '.$q121.'<br />
	 Pregunta 122: '.$q122.'<br />
	 Pregunta 123: '.$q123.'<br />
	 Pregunta 124: '.$q124.'<br />
	 Pregunta 125: '.$q125.'<br />
	 Pregunta 126: '.$q126.'<br />
	 Pregunta 127: '.$q127.'<br />
	 Pregunta 128: '.$q128.'<br />
	 Pregunta 129: '.$q129.'<br />
	 Pregunta 130: '.$q130.'<br />
	 Pregunta 131: '.$q131.'<br />
	 Pregunta 132: '.$q132.'<br />
	 Pregunta 133: '.$q133.'<br />
	 Pregunta 134: '.$q134.'<br />
	 Pregunta 135: '.$q135.'<br />
	 Pregunta 136: '.$q136.'<br />
	 Pregunta 137: '.$q137.'<br />
	 Pregunta 138: '.$q138.'<br />
	 Pregunta 139: '.$q139.'<br />
	 Pregunta 140: '.$q140.'<br />
	 Pregunta 141: '.$q141.'<br />
	 Pregunta 142: '.$q142.'<br />
	 Pregunta 143: '.$q143.'<br />
	 Pregunta 144: '.$q144.'<br />
	 Pregunta 145: '.$q145.'<br />
	 Pregunta 146: '.$q146.'<br />
	 Pregunta 147: '.$q147.'<br />
	 Pregunta 148: '.$q148.'<br />
	 Pregunta 149: '.$q149.'<br />
	 Pregunta 150: '.$q150.'<br />
	 Pregunta 151: '.$q151.'<br />
	 Pregunta 152: '.$q152.'<br />
	 Pregunta 153: '.$q153.'<br />
	 Pregunta 154: '.$q154.'<br />
	 Pregunta 155: '.$q155.'<br />
	 Pregunta 156: '.$q156.'<br />
	 Pregunta 157: '.$q157.'<br />
	 Pregunta 158: '.$q158.'<br />
	 Pregunta 159: '.$q159.'<br />
	 Pregunta 160: '.$q160.'<br />
	 Pregunta 161: '.$q161.'<br />
	 Pregunta 162: '.$q162.'<br />
	 Pregunta 163: '.$q163.'<br />
	 Pregunta 164: '.$q164.'<br />
	 Pregunta 165: '.$q165.'<br />
	 Pregunta 166: '.$q166.'<br />
	 Pregunta 167: '.$q167.'<br />
	 Pregunta 168: '.$q168.'<br />
	 Pregunta 169: '.$q169.'<br />
	 Pregunta 170: '.$q170.'<br />
	 Pregunta 171: '.$q171.'<br />
	 Pregunta 172: '.$q172.'<br />
	 Pregunta 173: '.$q173.'<br />
	 Pregunta 174: '.$q174.'<br />
	 Pregunta 175: '.$q175.'<br />
	 Pregunta 176: '.$q176.'<br />
	 Pregunta 177: '.$q177.'<br />
	 Pregunta 178: '.$q178.'<br />
	 Pregunta 179: '.$q179.'<br />
	 Pregunta 180: '.$q180.'<br />';*/

	echo $result;
	
	//$this->session->set_userdata($test, "DONE");
}
?>
</div> 
</html>