<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Dominó</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test images psychology d48 intelligence domino" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="<?php echo base_url();?>js/countDown.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
</head> 
<body> 
<?php
/** PAGINA DE INICIO DEL TEST **/
if ($source== "init_test"){
?>
<script>
$(document).ready(function(){
    $("#ej1").click(function(event){
    	$("#ej1").attr('src', '<?php echo base_url();?>images/d48/placaej1r.png');
    });
    $("#ej2").click(function(event){
    	$("#ej2").attr('src', '<?php echo base_url();?>images/d48/placaej2r.png');
    });
    $("#ej3").click(function(event){
    	$("#ej3").attr('src', '<?php echo base_url();?>images/d48/placaej3r.png');
    });
    $("#ej4").click(function(event){
    	$("#ej4").attr('src', '<?php echo base_url();?>images/d48/placaej4r.png');
    });
  });
</script>
<div id="page"> 
<center> 
<h1 style="text-align:center;">Test de Dominó</h1> 
En cada uno de los cuadros siguientes hay un grupo de fichas de dominós. Dentro de cada mitad los puntos varían de 0 a 6.
<br /><br />
Lo que usted tiene que hacer es observar bien cada grupo y calcular cuántos puntos le corresponden a la ficha que está en blanco.
<br /><br />
Aquí hay dos ejemplos que ya han sido resueltos. Observe cómo y por qué corresponden esas soluciones.<br /><br /><br />
<img src="<?php echo base_url();?>images/d48/placaej1.png" id="ej1">
<img src="<?php echo base_url();?>images/d48/placaej2.png" id="ej2">
<br />
<img src="<?php echo base_url();?>images/d48/placaej3.png" id="ej3">
<img src="<?php echo base_url();?>images/d48/placaej4.png" id="ej4">
<br /><br />
Haga clic en la ficha blanca para ver el resultado.
<br /><br />
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="init_test" />
<input type="hidden" name="placa" value="0" />
<input type=submit value="Comenzar el test"> 
</form> 
</center>
<?php 
}
/** PAGINA DE SELECCION DE FICHAS DEL TEST **/
if ($source == "select_ficha"){
//$minutos = "45";
//$segundos = "01";
if($timer == "") {	$timer = "45:01"; }
$time = explode(':',$timer,2);
$minutos = $time[0];
$segundos = $time[1];

if($placa == 48) {	$source = "select_ficha_final"; }
?>
<script>
$(document).ready(function(){
	$('input[name="item1"]').focus();
	$('input[name="item1"]').keyup(function(e){
	    this.value = this.value.replace(/\D/g,'');
	    if(this.value > 6)	this.value = '';
	});
	$('input[name="item2"]').keyup(function(e){
	    this.value = this.value.replace(/\D/g,'');
	    if(this.value > 6)	this.value = '';
	});
});
</script>
<script type="text/javascript">function init() {cd('<?php echo $minutos;?>', '<?php echo $segundos;?>');}window.onload = init;</script>
<center>
<h1>Test de Dominó</h1>
<h3>Placa Nº<?php echo $placa;?></h3>
<img src="<?php echo base_url();?>images/d48/placa<?php echo $placa;?>.png" /><br />
<h4>Selecciona la ficha que continua la serie: </h4><br />
<form method="POST" id="quiz_form" name="quiz_form">
<table id="d48_ficha">
<tr><td><input type="text" name="item1" value="" maxlength="1" id="d48_input" /></td></tr>
<tr><td><input type="text" name="item2" value="" maxlength="1" id="d48_input" /></td></tr>
</table>
<input type="hidden" name="source" value="<?php echo $source;?>" />
<input type="hidden" name="s1" value="<?php echo $s1;?>"/>
<input type="hidden" name="s2" value="<?php echo $s2;?>"/>
<input type="hidden" name="s3" value="<?php echo $s3;?>"/>
<input type="hidden" name="s4" value="<?php echo $s4;?>"/>
<input type="hidden" name="s5" value="<?php echo $s5;?>"/>
<input type="hidden" name="s6" value="<?php echo $s6;?>"/>
<input type="hidden" name="s7" value="<?php echo $s7;?>"/>
<input type="hidden" name="s8" value="<?php echo $s8;?>"/>
<input type="hidden" name="s9" value="<?php echo $s9;?>"/>
<input type="hidden" name="s10" value="<?php echo $s10;?>"/>
<input type="hidden" name="s11" value="<?php echo $s11;?>"/>
<input type="hidden" name="s12" value="<?php echo $s12;?>"/>
<input type="hidden" name="s13" value="<?php echo $s13;?>"/>
<input type="hidden" name="s14" value="<?php echo $s14;?>"/>
<input type="hidden" name="s15" value="<?php echo $s15;?>"/>
<input type="hidden" name="s16" value="<?php echo $s16;?>"/>
<input type="hidden" name="s17" value="<?php echo $s17;?>"/>
<input type="hidden" name="s18" value="<?php echo $s18;?>"/>
<input type="hidden" name="s19" value="<?php echo $s19;?>"/>
<input type="hidden" name="s20" value="<?php echo $s20;?>"/>
<input type="hidden" name="s21" value="<?php echo $s21;?>"/>
<input type="hidden" name="s22" value="<?php echo $s22;?>"/>
<input type="hidden" name="s23" value="<?php echo $s23;?>"/>
<input type="hidden" name="s24" value="<?php echo $s24;?>"/>
<input type="hidden" name="s25" value="<?php echo $s25;?>"/>
<input type="hidden" name="s26" value="<?php echo $s26;?>"/>
<input type="hidden" name="s27" value="<?php echo $s27;?>"/>
<input type="hidden" name="s28" value="<?php echo $s28;?>"/>
<input type="hidden" name="s29" value="<?php echo $s29;?>"/>
<input type="hidden" name="s30" value="<?php echo $s30;?>"/>
<input type="hidden" name="s31" value="<?php echo $s31;?>"/>
<input type="hidden" name="s32" value="<?php echo $s32;?>"/>
<input type="hidden" name="s33" value="<?php echo $s33;?>"/>
<input type="hidden" name="s34" value="<?php echo $s34;?>"/>
<input type="hidden" name="s35" value="<?php echo $s35;?>"/>
<input type="hidden" name="s36" value="<?php echo $s36;?>"/>
<input type="hidden" name="s37" value="<?php echo $s37;?>"/>
<input type="hidden" name="s38" value="<?php echo $s38;?>"/>
<input type="hidden" name="s39" value="<?php echo $s39;?>"/>
<input type="hidden" name="s40" value="<?php echo $s40;?>"/>
<input type="hidden" name="s41" value="<?php echo $s41;?>"/>
<input type="hidden" name="s42" value="<?php echo $s42;?>"/>
<input type="hidden" name="s43" value="<?php echo $s43;?>"/>
<input type="hidden" name="s44" value="<?php echo $s44;?>"/>
<input type="hidden" name="s45" value="<?php echo $s45;?>"/>
<input type="hidden" name="s46" value="<?php echo $s46;?>"/>
<input type="hidden" name="s47" value="<?php echo $s47;?>"/>
<input type="hidden" name="s48" value="<?php echo $s48;?>"/>
<input type="hidden" name="placa" value="<?php echo $placa;?>"/>
<input type="text" name="timer" id="timer" value="<?php echo $timer;?>" border="0" READONLY/><br /><br />
<input type=submit value="Siguiente"> 
</form>
</center>
 <?php 
}
/** PAGINA FINAL DEL TEST **/
if ($source == "test_finished") {
	echo '<br /><h3>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h3><br /><hr>';
	echo '<a href="'.base_url().'Test">Continuar con el siguiente test.</a><br /><hr><br />';
	echo '<pre>RESULTADOS:<br />
	Placa 1: '.	$s1.'<br />
	Placa 2: '.	$s2.'<br />
	Placa 3: '.	$s3.'<br />
	Placa 4: '.	$s4.'<br />
	Placa 5: '.	$s5.'<br />
	Placa 6: '.	$s6.'<br />
	Placa 7: '.	$s7.'<br />
	Placa 8: '.	$s8.'<br />
	Placa 9: '.	$s9.'<br />
	Placa 10: '.$s10.'<br />
	Placa 11: '.$s11.'<br />
	Placa 12: '.$s12.'<br />
	Placa 13: '.$s13.'<br />
	Placa 14: '.$s14.'<br />
	Placa 15: '.$s15.'<br />
	Placa 16: '.$s16.'<br />
	Placa 17: '.$s17.'<br />
	Placa 18: '.$s18.'<br />
	Placa 19: '.$s19.'<br />
	Placa 20: '.$s20.'<br />
	Placa 21: '.$s21.'<br />
	Placa 22: '.$s22.'<br />
	Placa 23: '.$s23.'<br />
	Placa 24: '.$s24.'<br />
	Placa 25: '.$s25.'<br />
	Placa 26: '.$s26.'<br />
	Placa 27: '.$s27.'<br />
	Placa 28: '.$s28.'<br />
	Placa 29: '.$s29.'<br />
	Placa 30: '.$s30.'<br />
	Placa 31: '.$s31.'<br />
	Placa 32: '.$s32.'<br />
	Placa 33: '.$s33.'<br />
	Placa 34: '.$s34.'<br />
	Placa 35: '.$s35.'<br />
	Placa 36: '.$s36.'<br />
	Placa 37: '.$s37.'<br />
	Placa 38: '.$s38.'<br />
	Placa 39: '.$s39.'<br />
	Placa 40: '.$s40.'<br />
	Placa 41: '.$s41.'<br />
	Placa 42: '.$s42.'<br />
	Placa 43: '.$s43.'<br />
	Placa 44: '.$s44.'<br />
	Placa 45: '.$s45.'<br />
	Placa 46: '.$s46.'<br />
	Placa 47: '.$s47.'<br />
	Placa 48: '.$s48.'<br />
	Tiempo:  '.$timer.'<br />';

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
		case "4": 
			$test = "mips";
			break;
		case "5": 
			$test = "rorschach";
			break;
	}
	//$this->session->set_userdata($test, "DONE");
}
?>
</div> 
</html>