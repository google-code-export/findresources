<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Lüscher</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test images psychology raven intelligence" /> 
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
<h1 style="text-align:center;">Test de Raven</h1> 
Para la realización de este test usted deberá seleccionar el fragmento que se adapte mejor a la imagen.
<br /><br /><br />
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="init_test" />
<input type="hidden" name="colors1" value="" />
<input type="hidden" name="colors2" value="" />
<input type="hidden" name="lamina" value="0" />
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
$minutos = "45";
$segundos = "01";
?>
<script type="text/javascript">function init() {cd('<?php echo $minutos;?>', '<?php echo $segundos;?>');}window.onload = init;</script>
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="<?php echo $source;?>" />

<input type="hidden" name="s1" value="<?php echo intval($s1);?>"/>
<input type="hidden" name="s2" value="<?php echo intval($s2);?>"/>
<input type="hidden" name="s3" value="<?php echo intval($s3);?>"/>
<input type="hidden" name="s4" value="<?php echo intval($s4);?>"/>
<input type="hidden" name="s5" value="<?php echo intval($s5);?>"/>
<input type="hidden" name="s6" value="<?php echo intval($s6);?>"/>
<input type="hidden" name="s7" value="<?php echo intval($s7);?>"/>
<input type="hidden" name="s8" value="<?php echo intval($s8);?>"/>
<input type="hidden" name="s9" value="<?php echo intval($s9);?>"/>
<input type="hidden" name="s10" value="<?php echo intval($s10);?>"/>
<input type="hidden" name="s11" value="<?php echo intval($s11);?>"/>
<input type="hidden" name="s12" value="<?php echo intval($s12);?>"/>
<input type="hidden" name="s13" value="<?php echo intval($s13);?>"/>
<input type="hidden" name="s14" value="<?php echo intval($s14);?>"/>
<input type="hidden" name="s15" value="<?php echo intval($s15);?>"/>
<input type="hidden" name="s16" value="<?php echo intval($s16);?>"/>
<input type="hidden" name="s17" value="<?php echo intval($s17);?>"/>
<input type="hidden" name="s18" value="<?php echo intval($s18);?>"/>
<input type="hidden" name="s19" value="<?php echo intval($s19);?>"/>
<input type="hidden" name="s20" value="<?php echo intval($s20);?>"/>
<input type="hidden" name="s21" value="<?php echo intval($s21);?>"/>
<input type="hidden" name="s22" value="<?php echo intval($s22);?>"/>
<input type="hidden" name="s23" value="<?php echo intval($s23);?>"/>
<input type="hidden" name="s24" value="<?php echo intval($s24);?>"/>
<input type="hidden" name="s25" value="<?php echo intval($s25);?>"/>
<input type="hidden" name="s26" value="<?php echo intval($s26);?>"/>
<input type="hidden" name="s27" value="<?php echo intval($s27);?>"/>
<input type="hidden" name="s28" value="<?php echo intval($s28);?>"/>
<input type="hidden" name="s29" value="<?php echo intval($s29);?>"/>
<input type="hidden" name="s30" value="<?php echo intval($s30);?>"/>
<input type="hidden" name="s31" value="<?php echo intval($s31);?>"/>
<input type="hidden" name="s32" value="<?php echo intval($s32);?>"/>
<input type="hidden" name="s33" value="<?php echo intval($s33);?>"/>
<input type="hidden" name="s34" value="<?php echo intval($s34);?>"/>
<input type="hidden" name="s35" value="<?php echo intval($s35);?>"/>
<input type="hidden" name="s36" value="<?php echo intval($s36);?>"/>
<input type="hidden" name="s37" value="<?php echo intval($s37);?>"/>
<input type="hidden" name="s38" value="<?php echo intval($s38);?>"/>
<input type="hidden" name="s39" value="<?php echo intval($s39);?>"/>
<input type="hidden" name="s40" value="<?php echo intval($s40);?>"/>
<input type="hidden" name="s41" value="<?php echo intval($s41);?>"/>
<input type="hidden" name="s42" value="<?php echo intval($s42);?>"/>
<input type="hidden" name="s43" value="<?php echo intval($s43);?>"/>
<input type="hidden" name="s44" value="<?php echo intval($s44);?>"/>
<input type="hidden" name="s45" value="<?php echo intval($s45);?>"/>
<input type="hidden" name="s46" value="<?php echo intval($s46);?>"/>
<input type="hidden" name="s47" value="<?php echo intval($s47);?>"/>
<input type="hidden" name="s48" value="<?php echo intval($s48);?>"/>
<input type="hidden" name="s49" value="<?php echo intval($s49);?>"/>
<input type="hidden" name="s50" value="<?php echo intval($s50);?>"/>
<input type="hidden" name="s51" value="<?php echo intval($s51);?>"/>
<input type="hidden" name="s52" value="<?php echo intval($s52);?>"/>
<input type="hidden" name="s53" value="<?php echo intval($s53);?>"/>
<input type="hidden" name="s54" value="<?php echo intval($s54);?>"/>
<input type="hidden" name="s55" value="<?php echo intval($s55);?>"/>
<input type="hidden" name="s56" value="<?php echo intval($s56);?>"/>
<input type="hidden" name="s57" value="<?php echo intval($s57);?>"/>
<input type="hidden" name="s58" value="<?php echo intval($s58);?>"/>
<input type="hidden" name="s59" value="<?php echo intval($s59);?>"/>
<input type="hidden" name="s60" value="<?php echo intval($s60);?>"/>
<input type="hidden" name="lamina" value="<?php echo intval($lamina);?>"/>
<input type="hidden" name="timer1" value="<?php echo $timer1;?>" />
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