<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=Cp1252">
    <title>FindResources - Test de Rorschach</title> 
    <meta name="description" content="FindResources - Choose best people" /> 
    <meta name="keywords" content="personality test images psychology d48 intelligence rorschach" /> 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <script src="<?php echo base_url();?>js/jquery-1.6.2.js" type="text/javascript"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <?php /*NO SACAR ESTA VERSION DE JQUERY PORQUE SINO NO FUNCIONA*/?>
	<script src="<?php echo base_url();?>js/jquery-ui-1.8.15.custom.min.js" language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/rorschach.js" language="JavaScript" type="text/javascript"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css">
	<link type="text/css" href="<?php echo base_url();?>css/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
</head> 
<body> 
<?php
/** PAGINA DE INICIO DEL TEST **/
if ($source== "init_test"){
?>
<div id="page"> 
<center> 
<h1 style="text-align:center;">Test de Rorschach</h1> 
En cada una de las siguientes 10 manchas usted debe indicar qué imágenes vé.
<br /><br />
Observe bien las manchas y seleccione el área donde ve una imagen ajustando el tamaño de un recuadro que le aparecerá arriba a la izquierda.
<br /><br />
<br /><br />
<form method="POST" id="quiz_form" name="quiz_form">
<input type="hidden" name="source" value="init_test" />
<a href="javascript:document.quiz_form.submit();" class="button">Comenzar el test</a>
</form> 
</center>
<?php 
}
/** PAGINA DE SELECCION DE FICHAS DEL TEST **/
if ($source == "select_img"){

if($pic == 10) {	$source = "select_img_final"; }
?>
<center><h1>Test de Rorschach</h1>
<h3>Mancha Nº<?php echo $pic;?></h3>
<h4>Etiquete la mancha con las imágenes que vé: </h4><br /></center><br /><br />
<div id="taggingArea">
	<img src="<?php echo base_url();?>images/rorschach/img<?php echo $pic;?>.jpg" width="800px"/>
	<div id="drag" class="ui-widget ui-widget-content ui-corner-all">
   <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix" id="drag_title">
      <span class="ui-dialog-title">Seleccionar área</span>
   </div>
	</div>
	<?php
		//if(isset($_SESSION["img".$pic]) AND count($_SESSION["img".$pic]) > 0){
		if(is_array($session_img) AND count($session_img) > 0){
        //foreach($_SESSION["img".$pic] as $clave => $resTags) {
		foreach($session_img as $clave => $resTags) {
	?>
				<div class=tag style="position:absolute;width:<?php echo $resTags['width'];?>px;height:<?php echo $resTags['height'];?>px;top:<?php echo $resTags['top'];?>;left:<?php echo $resTags['left'];?>;">
					<div class="label"><?php echo $resTags['description'];?></div>
				</div>
	<?php
			}
		}
	?>
</div>
<div id="formArea">
	<form method=post name="tag_form">
		<input type=hidden name=pic value="<?php echo $pic;?>">
		<input type=hidden name=width id=width>
		<input type=hidden name=height id=height>
		<input type=hidden name=top id=top>
		<input type=hidden name=left id=left> 	
		Escribe en una palabra lo que vés :<br />
		<input type=text name=description id="description">
		<a href="javascript:document.tag_form.submit();" class="button add">Etiquetar área</a>
		<input type="hidden" name="source" value="<?php echo $source;?>" />
	</form>


	<?php
	//if(isset($_SESSION["img".$pic]) AND count($_SESSION["img".$pic]) > 0){
	if(is_array($session_img) AND count($session_img) > 0){
    //   foreach($_SESSION["img".$pic] as $clave => $resTags) {
    	$i = 0;
		foreach($session_img as $clave => $resTags) {
       	?>
		<form method=post name="del_form<?php echo $i;?>">
		<input type=hidden name=pic value="<?php echo $pic;?>">
		<input type=hidden name=del value="<?php echo $clave;?>">
		<input type="hidden" name="source" value="<?php echo $source;?>" />
		<a href="#" class="button flag"><?php echo $resTags['description'];?></a><a href="javascript:document.del_form<?php echo $i;?>.submit();" class="button">X</a>
		
		</form>
       	<?php 
       	$i++;
		}
	}
	?>
	<br />
	<form method=post name="pic_form">
	<input type=hidden name=pic value="<?php echo $pic+1;?>">
	<input type="hidden" name="source" value="<?php echo $source;?>" />
	<a href="javascript:document.pic_form.submit();" class="button save">Siguiente imagen >></a>
	<!-- <input type=submit value="Siguiente imagen >>">-->
	</form>
</div>
 <?php 
}
/** PAGINA FINAL DEL TEST **/
if ($source == "test_finished") {
	echo '<br /><h3>Muchas gracias por realizar el Test. Esta información será tenida en cuenta en sus postulaciones.</h3><br /><hr>';
	echo '<a href="'.base_url().'Test">Continuar con el siguiente test.</a><br /><hr><br />';
	echo '<pre>RESULTADOS:<br />';
	
	//print_r($_SESSION);
	print_r($session);
echo '</pre>';
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
</body> 
</html>