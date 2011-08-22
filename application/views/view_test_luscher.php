<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Lüscher</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test color psychology luscher colour" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="<?php echo base_url();?>js/jquery-1.6.2.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head> 
<body> 
<?php
/** PAGINA DE INICIO DEL TEST **/
if ($source== "init_test"){
?>
<div id="page"> 
<center> 
<h1 style="text-align:center;">Test de Lüscher</h1> 
Para la realización de este test usted deberá seleccionar 8 colores en el orden que prefiera.
<br /><br /><br />
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="init_test" />
<input type="hidden" name="colors1" value="" />
<input type="hidden" name="colors2" value="" />
<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
</form> 
</center>
<?php 
}
/** PAGINA DE SELECCION DE COLORES DEL TEST **/
if ($source == "select_colors1" || $source == "select_colors2"){
 
if ($source == "select_colors1"){
	$color ="colors1";
	$title = "Selecciona los colores en el orden que prefieras.";
}
if ($source == "select_colors2" ) {
	$color ="colors2";
	$title = "Selecciona nuevamente los colores en el orden que prefieras.";
}
?>
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="<?php echo $source;?>" />
<input type="hidden" name="colors1" value="<?php echo $c1;?>" />
<input type="hidden" name="colors2" value="<?php echo $c2;?>" />
</form>
<script> 
var total = 0;
var quiz_form = document.getElementById('quiz_form');
setColor = function(id) {
  //replace image
  $('#image'+id).fadeOut(400);
  //document.getElementById('image'+id).src = '<?php echo base_url();?>images/luscher/blank.gif';
  //document.getElementById('image'+id).parentNode.onmousedown = function() {
//    return false;
//  }
 
  //save data
//var prev =  $('[input=[@name=#<?php echo $color;?>').val();
 //  $('#<?php echo $color;?>').val(prev+id);
 quiz_form.<?php echo $color;?>.value += id;
  
  //check if finished
  total++;
  if(total == 8) {
    quiz_form.submit();
  } else {
	  quiz_form.<?php echo $color;?>.value += '<?php echo $sep;?>';
  }
 
}
</script> 
<center> 
<h1 style="text-align:center;">Test de Lüscher</h1> 
<h3><?php echo $title;?></h3> 
<table> 
<tr> <!-- rojo -->
<td style="background-color:#D32727;" class="luscher_color" id="image3" onclick="setColor(3)"> 
</td> <!-- negro -->
<td style="background-color:#000000;" class="luscher_color" id="image7" onclick="setColor(7)"> 
</td> <!-- violeta -->
<td style="background-color:#7B125C;" class="luscher_color" id="image5" onclick="setColor(5)"> 
</td> <!-- gris -->
<td style="background-color:#5F5C5C;" class="luscher_color" id="image0" onclick="setColor(0)"> 
</td> <!-- verde -->
<td style="background-color:#346F12;" class="luscher_color" id="image2" onclick="setColor(2)"> 
</td> <!-- azul -->
<td style="background-color:#102292;" class="luscher_color" id="image1" onclick="setColor(1)"> 
</td> <!-- amarillo -->
<td style="background-color:#E8E82E;" class="luscher_color" id="image4" onclick="setColor(4)"> 
</td> <!-- marrón -->
<td style="background-color:#6A490F;" class="luscher_color" id="image6" onclick="setColor(6)"> 
</td> 
</tr> 
</table> 
</center> 
 <?php 
}
/** PAGINA FINAL DEL TEST **/
if ($source == "test_finished") {
	echo '<br /><h3>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h3><br /><hr><br />';
	echo '<br /><a href="'.base_url().'Test">Continuar con el siguiente test.</a><br /><hr><br />';
	//echo '<pre>RESULTADOS: <br />';
	//echo '1era Selección: '.$c1.$sep.$timer1.'<br />';
	//echo '2da  Selección: '.$c2.$sep.$timer2.'</pre>';	
	echo $result;
	

	//$this->session->set_userdata($test, "DONE");
}
?>
</div> 
</html>