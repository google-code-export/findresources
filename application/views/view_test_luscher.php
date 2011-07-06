<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Lüscher</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test color psychology luscher colour" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head> 
<body> 
<?php
if ($source== "select_sex"){

?>
<div id="page"> 
<form action="" method="post" id="quiz_form"> 
<input type="hidden" name="sex" value=""> 
<input type="hidden" name="colors1" value=""> 
<input type="hidden" name="colors2" value=""> 
<input type="hidden" name="timer" value=""> 
<center> 
<h1 style="text-align:center;">Test de Lüscher</h1> 
<table width=85%"> 
<tr><td align="center"> 
Para la realización de este test usted deberá seleccionar 8 colores en el orden que prefiera.
</td></tr> 
<tr><td align="center"> 
<br />Por favor seleccione su sexo: 
<select name="sex"> 
  <option value="m">Hombre</option> 
  <option value="f">Mujer</option> 
</select> 
<br><br> 
<input type=submit value="Comenzar el test"> 
</td></tr> 
</table> 
</center> 
</form> 
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
?>
<form action="" method="post" id="quiz_form"> 
<input type="hidden" name="sex" value="m"> 
<input type="hidden" name="colors1" value="<?php echo $c1;?>"> 
<input type="hidden" name="colors2" value="<?php echo $c2;?>"> 
<input type="hidden" name="timer" value="">
 
<SCRIPT> 
var total = 0;
var quiz_form = document.getElementById('quiz_form');
clicked = function(id) {
  //replace image
  document.getElementById('image'+id).src = 'images/luscher/blank.gif';
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
</SCRIPT> 

<center> 
<h1 style="text-align:center;">Test de Lüscher</h1> 
<h3><?php echo $title;?></h3> 
<table> 
<tr> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(3);return false;"><img id="image3" src="images/luscher/3.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(7);return false;"><img id="image7" src="images/luscher/7.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(5);return false;"><img id="image5" src="images/luscher/5.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(0);return false;"><img id="image0" src="images/luscher/0.jpg" width="100" height="100"></a> 
</td> 

<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(2);return false;"><img id="image2" src="images/luscher/2.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(1);return false;"><img id="image1" src="images/luscher/1.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(4);return false;"><img id="image4" src="images/luscher/4.jpg" width="100" height="100"></a> 
</td> 
<td> 
  <a href="javascript:void(0);" OnMouseDown="clicked(6);return false;"><img id="image6" src="images/luscher/6.jpg" width="100" height="100"></a> 
</td> 
</tr> 
</table> 
</center> 
</form> 
 
<?php 
}
if ($source == "test_finished") {
	echo "<pre>Muchas gracias por realizar el Test de Lüscher. Esta información será tenida en cuenta en sus postulaciones.<br /><br /><hr><br />";
	echo "1era Selección: ".$c1."<br />";
	echo "2da  Selección: ".$c2."</pre>";	
}


?>

</div> 
</html>