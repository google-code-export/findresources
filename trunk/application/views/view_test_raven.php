<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <script type="text/javascript" src="<?php echo base_url();?>js/src/countDown.js"></script>
    <script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
	<title>FindResources</title>
</head> 
<body> 
<?php include("toolbar.php"); ?>
<div class="body_container">

	<h1>Test de Raven</h1>
	<div id="page" style="height:600px;"> 
	<?php
	/** ************************* **/
	/** PAGINA DE INICIO DEL TEST **/
	/** ************************* **/
	if ($source== "init_test"){
	?>
	<center> 
	<br /><br /><h4>
	El Test consiste en decidir cuál a tu criterio es la figura que resta en las placas que se te mostrarán. 
	<br /><br />
	Disponés de 45 minutos para resolver las 60 placas del test.</h4> 
	<br /><br />
	<form method="post" id="quiz_form" name="quiz_form">
	<input type="hidden" name="source" value="init_test" />
	<input type="hidden" name="placa" value="0" />
	<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
	</form> 
	</center>
	<?php 
	}
	/** PAGINA DE SELECCION DE FICHAS DEL TEST **/
	if ($source == "select_pieza"){
	
	if($timer == "") {	$timer = "40:01"; }
	$time = explode(':',$timer,2);
	$minutos = $time[0];
	$segundos = $time[1];
	
	if($placa == 60) {	$source = "select_pieza_final"; }
	?>
	<script>
	
	$(document).ready(function(){
		$('input[name="item"]').focus();
		$('input[name="item"]').keyup(function(e){
		    this.value = this.value.replace(/\D/g,'');
		});
	});
	</script>
	<script type="text/javascript">function init() {cd('<?php echo $minutos;?>', '<?php echo $segundos;?>');}window.onload = init;</script>
	<center>
	<br /><br />
	<h3>Placa Nº<?php echo $placa;?></h3>
	<img src="<?php echo base_url();?>images/raven/<?php echo $placa;?>.jpg" />
	<h4>Selecciona la pieza que corresponda: </h4><br />
	<form method="post" id="quiz_form" name="quiz_form">
	<input type="text" name="item" maxlength="1" id="raven_input" value="<?php echo ($placa == "1")? "?" : "" ?>" />
	<input type="hidden" id="source" name="source" value="<?php echo $source;?>" />
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
	<input type="hidden" name="s49" value="<?php echo $s49;?>"/>
	<input type="hidden" name="s50" value="<?php echo $s50;?>"/>
	<input type="hidden" name="s51" value="<?php echo $s51;?>"/>
	<input type="hidden" name="s52" value="<?php echo $s52;?>"/>
	<input type="hidden" name="s53" value="<?php echo $s53;?>"/>
	<input type="hidden" name="s54" value="<?php echo $s54;?>"/>
	<input type="hidden" name="s55" value="<?php echo $s55;?>"/>
	<input type="hidden" name="s56" value="<?php echo $s56;?>"/>
	<input type="hidden" name="s57" value="<?php echo $s57;?>"/>
	<input type="hidden" name="s58" value="<?php echo $s58;?>"/>
	<input type="hidden" name="s59" value="<?php echo $s59;?>"/>
	<input type="hidden" name="s60" value="<?php echo $s60;?>"/>
	<input type="hidden" name="placa" value="<?php echo $placa;?>"/>
	<input type="text" name="timer" id="timer" value="<?php echo $timer;?>" readonly="readonly" /><br /><br />
	<a href="javascript:document.quiz_form.submit();" class="button save">Siguiente</a>
	</form>
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