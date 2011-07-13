<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Lüscher</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test color psychology luscher colour" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php echo base_url();?>js/countDown.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head> 
<body> 
<?php
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
<input type=submit value="Comenzar el test"> 
</form> 
</center>
<?php 
}
if ($source == "select_colors1" || $source == "select_colors2"){
 
if ($source == "select_colors1"){
	$color ="colors1";
	$title = "Selecciona los colores en el orden que prefieras.";
}
if ($source == "select_colors2" ) {
	$color ="colors2";
	$title = "Selecciona nuevamente los colores en el orden que prefieras.";
}
$minutos = "1";
$segundos = "01";
?>
<script type="text/javascript">function init() {cd('<?php echo $minutos;?>', '<?php echo $segundos;?>');}window.onload = init;</script>
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="<?php echo $source;?>" />
<input type="hidden" name="colors1" value="<?php echo $c1;?>" />
<input type="hidden" name="colors2" value="<?php echo $c2;?>" />
<input type="hidden" name="timer1" value="<?php echo $timer1;?>" />
<input type="hidden" name="timer2" value="<?php echo $timer2;?>" />
<input type="text" name="timer" id="timer" value="1:00" border="0" READONLY/>
</form>
<script> 
var total = 0;
var quiz_form = document.getElementById('quiz_form');
clicked = function(id) {
  //replace image
  document.getElementById('image'+id).src = '<?php echo base_url();?>images/luscher/blank.gif';
  document.getElementById('image'+id).parentNode.onmousedown = function() {
    return false;
  }
 
  //save data
  quiz_form.<?php echo $color;?>.value += id;
  
  //check if finished
  total++;
  if(8 == total) {
    quiz_form.submit();
  } else {
	  quiz_form.<?php echo $color;?>.value += ',';
  }
 
}
</script> 
<center> 
<h1 style="text-align:center;">Test de Lüscher</h1> 
<h3><?php echo $title;?></h3> 
<table> 
<tr> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(3);return false;"><img id="image3" src="<?php echo base_url();?>images/luscher/3.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(7);return false;"><img id="image7" src="<?php echo base_url();?>images/luscher/7.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(5);return false;"><img id="image5" src="<?php echo base_url();?>images/luscher/5.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(0);return false;"><img id="image0" src="<?php echo base_url();?>images/luscher/0.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(2);return false;"><img id="image2" src="<?php echo base_url();?>images/luscher/2.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(1);return false;"><img id="image1" src="<?php echo base_url();?>images/luscher/1.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(4);return false;"><img id="image4" src="<?php echo base_url();?>images/luscher/4.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(6);return false;"><img id="image6" src="<?php echo base_url();?>images/luscher/6.jpg" width="100" height="100"></a> 
</td> 
</tr> 
</table> 
</center> 
 <?php 
}
if ($source == "test_finished") {
	echo '<br /><h3>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h3><br /><hr><br />';
	echo '<br /><a href="'.base_url().'Test">Continuar con el siguiente test.</a><br /><hr><br />';
	echo '<pre>1era Selección: ".$c1." : ".$timer1."<br />';
	echo '2da  Selección: ".$c2." : ".$timer2."</pre>';	
	switch($num){
		case "1": 
			$test = "luscher";
			break;
		case "2": 
			$test = "d48";
			break;
		case "3": 
			$test = "raven";
			break;
	}
	$this->session->set_userdata($test, "DONE");
}
?>
</div> 
</html>