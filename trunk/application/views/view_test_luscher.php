<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
	<script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
	<style type="text/css">
		.body_container {
			padding-left: 20px;
			padding-right: 20px;
		}
	
	</style>
	<title>FindResources</title>
</head> 
<body> 
<?php include("toolbar.php"); ?>
<div class="body_container">

	<h1>Test de Lüscher</h1>
	<div id="page" style="height:600px;"> 
	<?php
	
	/** ************************* **/
	/** PAGINA DE INICIO DEL TEST **/
	/** ************************* **/
	
	if ($source== "init_test"){
	?>
	<center> 
	<br /><br />
	<h4>Para la realización de este test usted deberá seleccionar 8 colores en el orden que prefiera.</h4>
	<br /><br /><br /><br /><br /><br />
	<form method="post" id="quiz_form" name="quiz_form">
	<input type="hidden" name="source" value="init_test" />
	<input type="hidden" name="colors1" value="" />
	<input type="hidden" name="colors2" value="" />
	<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
	</form> 
	</center>
	<?php 
	}
	
	/** *************************************** **/
	/** PAGINA DE SELECCION DE COLORES DEL TEST **/
	/** *************************************** **/
	
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
	<form method="post" id="quiz_form" name="quiz_form">
	<input type="hidden" name="source" value="<?php echo $source;?>" />
	<input type="hidden" name="colors1" value="<?php echo $c1;?>" />
	<input type="hidden" name="colors2" value="<?php echo $c2;?>" />
	</form>
	<script> 
	var total = 0;
	var quiz_form = document.getElementById('quiz_form');
	setColor = function(id) {
	  $('#image'+id).fadeOut(400);
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
	<br /><br />
	<h4><?php echo $title;?></h4> 
	<br /><br /><br /><br /><br /><br />
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
	
	/** ********************* **/
	/** PAGINA FINAL DEL TEST **/
	/** ********************* **/
	
	if ($source == "test_finished") {
	?>
	<br />
	<br /><br />
	<h4>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h4>
	<br /><br /><br />
	<br /><a href="<?php echo base_url()?>Test">Continuar con el siguiente test.</a>
	<br /><br /><hr />
	<?php 
		if ($result != "OK")
				echo $result;
				echo "<br /><hr />";
	}
	?>
	</div> 
</div> 

<div id="test_footer">
<?php include("footer.php"); ?>
</div>

</body>
</html>