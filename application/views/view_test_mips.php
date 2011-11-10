<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/libs/jquery.validate.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/libs/jquery.metadata.js" ></script>
	<script type="text/javascript">
		function show(num){
			$('#fila'+num).fadeIn('slow');
	        $('body').animate({scrollTop: $('body').height()}, 800);
	
		}
	</script>
	
    <title>FindResources</title>
</head> 
<body> 
<?php include("toolbar.php"); ?>

<div class="body_container">
	
	<h1>Test de MIPS</h1>
	<div id="page" style="height:auto;min-height:600px"> 
	<?php
	/** ************************* **/
	/** PAGINA DE INICIO DEL TEST **/
	/** ************************* **/
	if ($source== "init_test"){
	?>
	
	<center> 
	<br /><br />
	<h4>Responda a las siguientes 180 preguntas por Verdadero o Falso.</h4> 
	<br /><br />
	<b>* La realizaci�n del siguiente test tiene una demora aproximada de 30 minutos, por favor t�ngalo en cuenta a la hora de comenzarlo.</b>
	<br /><br />
	<br /><br />
	<form method="post" id="quiz_form" name="quiz_form">
	<input type="hidden" name="source" value="init_test" />
	<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
	</form> 
	</center>
	<?php 
	}
	/** ************************************** **/
	/** PAGINA DE SELECCION DE FICHAS DEL TEST **/
	/** ************************************** **/
	if ($source == "select_questions"){
	
	/** LISTADO DE PREGUNTAS **/
	$preguntas[1] = "Soy una persona tranquila y colaboradora";
	$preguntas[2] = "Siempre hice lo que quise y asum� las consecuencias";
	$preguntas[3] = "Me gusta hacerme cargo de un tarea";
	$preguntas[4] = "Tengo una manera habitual de hacer las cosas , con las que evito equivocarme";
	$preguntas[5] = "Contesto las cartas el mismo d�a que las recibo";
	$preguntas[6] = "A veces me las arreglo para arruinar las cosas buenas que me pasan";
	$preguntas[7] = "Ya no me entusiasman muchas cosas como antes.";
	$preguntas[8] = "Preferir�a ser un seguidor m�s que un L�der.";
	$preguntas[9] = "Me esfuerzo para tratar de ser popular";
	$preguntas[10] = "Siempre he tenido talento para lograr �xito en lo que hago";
	$preguntas[11] = "Con frecuencia me doy cuenta de que he sido tratado injustamente.";
	$preguntas[12] = "Me siento inc�modo cuando me tratan con bondad";
	$preguntas[13] = "Con frecuencia me siento tenso en situaciones sociales";
	$preguntas[14] = "Creo que la polic�a abusa del poder que tiene";
	$preguntas[15] = "Algunas veces he tenido que ser algo rudo con la gente";
	$preguntas[16] = "Los ni�os deben obedecer siempre las indicaciones de los mayores.";
	$preguntas[17] = "A menudo estoy disgustado por la forma en que se hacen las cosas.";
	$preguntas[18] = "A menudo espero que me pase lo peor.";
	$preguntas[19] = "Me preocupar�a poco no tener amigos.";
	$preguntas[20] = "Soy t�mido e inhibido en situaciones sociales.";
	$preguntas[21] = "Aunque est� en desacuerdo, por lo general dejo que la gentehaga lo que quiera.";
	$preguntas[22] = "Es imposible pretender que las personas digan siempre la verdad.";
	$preguntas[23] = "Puedo hacer comentarios desagradables si considero que la persona se lo merece.";
	$preguntas[24] = "Me gusta cumplir con lo establecido y hacer lo que se espera de mi";
	$preguntas[25] = "Muy poco de lo que hago es valorado por los dem�s.";
	$preguntas[26] = "Casi todo lo que intento hacer me resulta f�cil.";
	$preguntas[27] = "En los �ltimos tiempos me he convertido en una persona m�s encerrada en s� misma.";
	$preguntas[28] = "Tiendo a dramatizar lo que me pasa.";
	$preguntas[29] = "Siempre trato de hacer lo que es correcto.";
	$preguntas[30] = "Dependo poco de la amistad de los dem�s.";
	$preguntas[31] = "Nunca he estado estacionado por m�s del tiempo del que un parqu�metro establec�a como l�mite.";
	$preguntas[32] = "Los castigos nunca impidieron hacer lo que quiero.";
	$preguntas[33] = "Me gusta acomodar todas las cosas hasta en sus m�nimos detalles.";
	$preguntas[34] = "A menudo los dem�s logran molestarme.";
	$preguntas[35] = "Jam�s he desobedecido las indicaciones de mis padres.";
	$preguntas[36] = "Siempre logro conseguir lo que quiero, aunque tenga que presionar a los dem�s.";
	$preguntas[37] = "Nada es m�s importante que proteger la reputaci�n personal.";
	$preguntas[38] = "Creo que los dem�s tienen mejores oportunidades que yo.";
	$preguntas[39] = "Ya no expreso lo que realmente siento.";
	$preguntas[40] = "Es improbable que lo que tengo para decir interese a losdem�s.";
	$preguntas[41] = "Me esfuerzo por conocer gente interesante y tener aventuras.";
	$preguntas[42] = "Me tomo con poca seriedad las responsabilidades que tengo.";
	$preguntas[43] = "Soy una persona dura, poco sentimental.";
	$preguntas[44] = "Pocas cosas en la vida pueden conmoverme.";
	$preguntas[45] = "Me tensiona mucho el tener que conocer y conversar con gente nueva.";
	$preguntas[46] = "Soy una persona dura, poco sentimental.";
	$preguntas[47] = "Act�o en funci�n del momento, de las circunstancias.";
	$preguntas[48] = "En general, primero planifico";
	$preguntas[49] = "Con frecuencia me he sentido inquieto, con ganas de dirigirme hacia cualquier otro lado.";
	$preguntas[50] = "Creo que lo mejor es controlar nuestras emociones.";
	$preguntas[51] = "Desear�a que la gente no me culpara a m� cuando algo salemal.";
	$preguntas[52] = "Creo que yo soy mi peor enemigo.";
	$preguntas[53] = "Tengo pocos lazos afectivos fuertes con otras personas.";
	$preguntas[54] = "Me pongo ansioso si estoy con personas que no conozco bien.";
	$preguntas[55] = "Es correcto tratar de burlar la ley, sin dejar de cumplirla.";
	$preguntas[56] = "Hago mucho por lo dem�s, pero hacen poco por m�.";
	$preguntas[57] = "Siempre he sentido que las personas no tienen una buen aopini�n de m�.";
	$preguntas[58] = "Me tengo mucha confianza.";
	$preguntas[59] = "Sistem�ticamente ordeno mis papeles y materiales de trabajo.";
	$preguntas[60] = "Mi experiencia me ha ense�ado que las cosas buenas duran poco.";
	$preguntas[61] = "Algunos dicen que me gusta hacerme la victima.";
	$preguntas[62] = "Me siento mejor cuando estoy solo.";
	$preguntas[63] = "Me pongo m�s tenso que los dem�s frente a situaciones nuevas.";
	$preguntas[64] = "Generalmente trato de evitar las desilusiones, por m�s que est� convencido de tener raz�n.";
	$preguntas[65] = "Busco soluciones novedosas y excitantes para m�.";
	$preguntas[66] = "Hubo �pocas en que mis padres tuvieron problemas por mi comportamiento.";
	$preguntas[67] = "Siempre termino mi trabajo antes de descansar.";
	$preguntas[68] = "Otros consiguen cosas que yo no logro.";
	$preguntas[69] = "A veces siento que merezco ser infeliz.";
	$preguntas[70] = "Espero que las cosas tomen su curso antes de decidir que hacer.";
	$preguntas[71] = "Me ocupo m�s de los otros que de m� mismo.";
	$preguntas[72] = "A menudo creo que mi vida va de mal en peor.";
	$preguntas[73] = "El solo estar con otras personas me hace sentir inspirado.";
	$preguntas[74] = "Cuando manejo siempre controlo las se�alas sobre l�mites de velocidad y cuido no excederme.";
	$preguntas[75] = "Uso mi cabeza y no mi coraz�n para tomar decisiones.";
	$preguntas[76] = "Me gui� por mis instituciones m�s que por la informaci�n que tengo sobre algo.";
	$preguntas[77] = "Jam�s envidio los logros de los otros.";
	$preguntas[78] = "En la escuela, me gustaron las materias pr�cticas m�s que la te�ricas.";
	$preguntas[79] = "Planifico las cosas con anticipaci�n y act�o en�rgicamente para que mis planes se cumplan.";
	$preguntas[80] = "Mi coraz�n maneja mi cerebro.";
	$preguntas[81] = "Siempre puedo ver el lado positivo de la vida.";
	$preguntas[82] = "A menudo espero que alguien solucione mis problemas.";
	$preguntas[83] = "Hago lo que quiero, sin pensar c�mo va a afectar a otros.";
	$preguntas[84] = "Reacciono con rapidez ante cualquier situaci�n que pueda llegar a ser un problema para m�.";
	$preguntas[85] = "S�lo me siento una buena persona cuando ayudo a los dem�s.";
	$preguntas[86] = "Si algo sale mal, aunque no sea muy importante, se me arruina el d�a.";
	$preguntas[87] = "Disfruto m�s de mis fantas�as de la realidad.";
	$preguntas[88] = "Me siento satisfecho con dejar que las cosas ocurran sin interferir.";
	$preguntas[89] = "Trato de ser m�s l�gico que emocional.";
	$preguntas[90] = "Prefiero las cosas que se pueden ver y tocar antes que las solo s�lo se imaginan.";
	$preguntas[91] = "Me resulta dif�cil ponerme a conversar con alguien que acabo de conocer.";
	$preguntas[92] = "Ser afectuosos es m�s importante que ser fr�o y calculador.";
	$preguntas[93] = "Las predicciones sobre el futuro son m�s interesantes para m�que los hechos del pasado.";
	$preguntas[94] = "Me resulta f�cil disfrutar de las cosas.  ";
	$preguntas[95] = "Me siento incapaz de influir sobre el mundo que me rodea.";
	$preguntas[96] = "Vivo en t�rminos de mis propias necesidades, no basado en las de los dem�s.";
	$preguntas[97] = "No espero que las cosas me pasen, hago que sucedan como yo quiero.";
	$preguntas[98] = "Evito contestar mal aun cuando estoy muy enojado.";
	$preguntas[99] = "La necesidad de ayudar a otros gu�a mi vida.";
	$preguntas[100] = "A menudo me siento muy tenso, a la espera de que algo salga mal.";
	$preguntas[101] = "Aun cuando era muy joven, jam�s intent� copiarme un ex�men.";
	$preguntas[102] = "Siempre soy fr�o y objetivo al tratar con la gente.";
	$preguntas[103] = "Prefiero aprender a manejar un aparato antes que especular sobre por qu� funciona de ese modo";
	$preguntas[104] = "Soy una persona dif�cil de conocer bien.";
	$preguntas[105] = "Paso mucho tiempo pensando en los misterios de la vida.";
	$preguntas[106] = "Manejo con facilidad mi cambio de estados de �nimo.";
	$preguntas[107] = "Soy algo pasivo y lento en temas relacionados con la organizaci�n de mi vida.";
	$preguntas[108] = "Hago lo que quiero sin importarme el complacer a otros";
	$preguntas[109] = "Jam�s har� algo, por m�s fuerte que sea la tentaci�n de hacerlo.";
	$preguntas[110] = "Mis amigos y familiares recurren a mi para encontrar afecto y apoyo.";
	$preguntas[111] = "A�n cuando todo est� bien, generalmente pienso en que pronto va a empeorar.";
	$preguntas[112] = "Planifico con cuidado mi trabajo antes de empezar a hacerlo.";
	$preguntas[113] = "Soy impersonal y objetivo al tratar de resolver un problema.";
	$preguntas[114] = "Soy una persona realista a la que no le gustan las especulaciones";
	$preguntas[115] = "Algunos de mis mejores amigos desconocen realmente lo que yo siento";
	$preguntas[116] = "La gente piensa que soy una persona m�s racional que afectiva";
	$preguntas[117] = "Mi sentido de realidad es mejor que mi imaginaci�n";
	$preguntas[118] = "Primero me preocupo por mi y despu�s por los dem�s";
	$preguntas[119] = "Dedico mucho esfuerzo a que las cosas me salgan bien";
	$preguntas[120] = "Siempre mantengo mi compostura, sin importar lo que est� pasando";
	$preguntas[121] = "Demuestro mucho afecto a mis amigos";
	$preguntas[122] = "Pocas cosas me han salido bien.";
	$preguntas[123] = "Me gusta conocer gente nueva y saber cosas sobre sus vidas.";
	$preguntas[124] = "Soy capaz de ignorar aspectos emocionales y afectivos en mi trabajo.";
	$preguntas[125] = "Prefiero ocuparme de realidades m�s que de posibilidades.";
	$preguntas[126] = "Necesito mucho tiempo para poder estar a solas con mis pensamientos.";
	$preguntas[127] = "Los afectos del coraz�n son m�s importantes que la l�gica de la mente.";
	$preguntas[128] = "Me gustan m�s los so�adores que los realistas.";
	$preguntas[129] = "Soy m�s capaz que los dem�s de re�rme de los problemas.";
	$preguntas[130] = "Creo que es poco lo que puedo hacer yo, as� que prefiero esperar a ver qu� pasa.";
	$preguntas[131] = "Nunca me pongo a discutir, aunque est� muy enojada.";
	$preguntas[132] = "Expreso lo que pienso de manera franca y abierta.";
	$preguntas[133] = "Me preocupo por el trabajo que hay que realizar y no por lo que siente la gente que practica";
	$preguntas[134] = "Trabajar con ideas creativas ser�a lo ideal para m�.";
	$preguntas[135] = "Soy el tipo de persona que no se toma la vida muy en serio,prefiero ser m�s espectador que actor.";
	$preguntas[136] = "Me desagrada depender de alguien en mi trabajo.";
	$preguntas[137] = "Trato de asegurar que las cosas me salgan como yo quiero.";
	$preguntas[138] = "Disfruto m�s de las realidades concretas que de las fantas�as.";
	$preguntas[139] = "Montones de hechos peque�os me ponen de mal humor.";
	$preguntas[140] = "Aprendo mejor Observando y hablando con la gente.";
	$preguntas[141] = "No me satisface dejar que las cosas sucedan y simplemente contemplarlas.";
	$preguntas[142] = "No me atrae conocer gente nueva.";
	$preguntas[143] = "Pocas veces s� c�mo mantener una conversaci�n.";
	$preguntas[144] = "Siempre tengo en cuenta los sentimientos de las otras personas.";
	$preguntas[145] = "Conf�o m�s en mis propias decisiones, evitando los consejos de otros.";
	$preguntas[146] = "Trato de no actuar hasta saber qu� van a hacer los dem�s.";
	$preguntas[147] = "Me gusta tomar mis propias decisiones, evitando los consejos de otros.";
	$preguntas[148] = "Muchas veces muy mal sin saber por qu�.";
	$preguntas[149] = "Me gusta ser muy popular, participar en muchas actividades sociales.";
	$preguntas[150] = "Raramente cuento a otros lo que pienso.";
	$preguntas[151] = "Me entusiasman casi todas las actividades que realizo.";
	$preguntas[152] = "En m� es una pr�ctica constante depender de mi mismo y no de otros.";
	$preguntas[153] = "La mayor parte del tiempo la dedico a organizar los acontecimientos de mi vida.";
	$preguntas[154] = "No hay mejor que el afecto que se siente estando en medio del grupo familiar.";
	$preguntas[155] = "Algunas veces estoy tenso o deprimido sin saber por que.";
	$preguntas[156] = "Disfruto conversando sobre temas o sucesos m�sticos.";
	$preguntas[157] = "Dedico cu�les son las cosas prioritarias y luego act�o firmemente para poder lograrlas.";
	$preguntas[158] = "No dudo en orientar a las personas hacia lo que creo que es mejor para ellas.";
	$preguntas[159] = "Me enorgullece ser eficiente y organizado.";
	$preguntas[160] = "Me desagradan las personas que no se convierten en l�deres sin razones que lo justifiquen.";
	$preguntas[161] = "Soy ambicioso.";
	$preguntas[162] = "S� como seducir a la gente.";
	$preguntas[163] = "La gente puede confiar en que voy a hacer bien mi trabajo.";
	$preguntas[164] = "Los dem�s me consideran una persona m�s afectiva que racional.";
	$preguntas[165] = "Estar�a dispuesto a trabajar mucho tiempo para poder llegar aser alguien importante.";
	$preguntas[166] = "Me gustar�a mucho poder vender nuevas ideas o productos a lagente.";
	$preguntas[167] = "Generalmente logro persuadir a los dem�s para que hagan loque yo quiero que hagan.";
	$preguntas[168] = "Me gustan los trabajos en lo que hay que prestar mucha atenci�n a los detalles.";
	$preguntas[169] = "Soy muy introspectivo, siempre trato de entender mis pensamientos y emociones.";
	$preguntas[170] = "Conf�o mucho en mis habilidades sociales.";
	$preguntas[171] = "Generalmente puedo evaluar las situaciones r�pidamente, y actuar para que las cosas salgan como yo quiero.";
	$preguntas[172] = "En una discusi�n soy capaz de persuadir a casi todos para que apoyen mi posici�n.";
	$preguntas[173] = "Soy capaz de llevar a cabo cualquier trabajo pese a los obst�culos que puedan presentarse.";
	$preguntas[174] = "Como si fuera un buen vendedor, puedo influir sobre los dem�s exitosamente, con modales agradables.";
	$preguntas[175] = "Conocer gente nueva es un objetivo importante para mi.";
	$preguntas[176] = "Al tomar decisiones creo que lo m�s importante es pensar en el bienestar de la gente involucrada.";
	$preguntas[177] = "Tengo paciencia para realizar trabajos que requieren mucha presi�n.";
	$preguntas[178] = "Mi capacidad para fantasear es superior a mi sentido de realidad.";
	$preguntas[179] = "Estoy motivado para llegar a ser uno de los mejores en mi campo de trabajo.";
	$preguntas[180] = "Tengo una forma de ser que lograr que la gente enseguida guste de m�.";
	
	?>
	<center>
	<br />
	<h3>Preguntas</h3>
	<br />
	<h4>Responda por Verdadero o Falso: </h4><br />
	</center>
	
	<form method="post" id="quiz_form" name="quiz_form" class="questions">
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
			<!-- BOTON SOLO PARA DEMO - FINALIZAR TEST -->
			<a href="#" class="button flag" ><input type=submit value="Finalizar Test" style="border: 0; background: transparent;font-weight:bold;" class="button"/></a>	 
			<!-- BOTON SOLO PARA DEMO - FINALIZAR TEST -->
			<?php //Resolver tema de que no ejecuta la validaci�n del form ?> 
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
	/** ********************* **/
	/** PAGINA FINAL DEL TEST **/
	/** ********************* **/
	if ($source == "test_finished") {
		echo "<br /><br /><br />";
		if ($result != "OK") {
			echo "<h4>Hubo un error al guardar la informaci�n del test. Por favor cont�ctese con nosotros, completando el formulario de Ayuda.</h4>";
			//echo $result;
		} else {
			echo "<h4>Muchas gracias por realizar el Test. Esta informaci�n ser� tenida en cuenta en sus postulaciones.</h4>";
		}
?>
	<br /><br /><br />
	<br /><a href="<?php echo base_url()?>Test">Continuar con el siguiente test.</a>
	<br /><br />
<?php } ?>
	</div> 
</div> 
<div id="test_footer">
<?php include("footer.php"); ?>
</div>
</body>
</html>