<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <?php /*NO SACAR ESTA VERSION DE JQUERY PORQUE SINO NO FUNCIONA*/?>
	<script src="<?php echo base_url();?>js/libs/jquery-ui-1.8.15.custom.min.js" language="JavaScript" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/src/rorschach.js" language="JavaScript" type="text/javascript"></script>
	<link type="text/css" href="<?php echo base_url();?>css/jquery-ui-1.8.15.custom.css" rel="stylesheet" />
	<title>FindResources</title>
</head> 
<body> 
<?php include("toolbar.php"); ?>

<div class="body_container">

	<h1>Test de Rorschach</h1>
	<div id="page" style="height:600px;"> 
	<?php
	/** ************************* **/
	/** PAGINA DE INICIO DEL TEST **/
	/** ************************* **/
	if ($source== "init_test"){
	?>
	<center> 
	<br /><br />
	<h4>
	En cada una de las siguientes 10 manchas usted debe indicar qué imágenes vé.
	<br /><br />
	Observe bien las manchas y seleccione el área donde ve una imagen ajustando el tamaño de un recuadro que le aparecerá arriba a la izquierda.</h4>
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
	if ($source == "select_img"){
	
	if($pic == 10) {	$source = "select_img_final"; }
	?>
	<center>
	<br /><h3>Mancha Nº<?php echo $pic;?></h3><br />
	<h4>Etiquete la mancha con las imágenes que vé: </h4><br /></center><br />
	<div id="taggingArea">
		<img src="<?php echo base_url();?>images/rorschach/img<?php echo $pic;?>.jpg" width="600px"/>
		<div id="drag" class="ui-widget ui-widget-content ui-corner-all">
		</div>
		<?php
			//if(isset($_SESSION["img".$pic]) AND count($_SESSION["img".$pic]) > 0){
			if(is_array($session_img) AND count($session_img) > 0){
	        //foreach($_SESSION["img".$pic] as $clave => $resTags) {
			foreach($session_img as $clave => $resTags) {
		?>
					<div class=tag style="position:absolute;width:<?php echo $resTags['width'];?>px;height:<?php echo $resTags['height'];?>px;top:<?php echo $resTags['top'];?>;left:<?php echo $resTags['left'];?>;">
						<div class="label2"><?php echo $resTags['description'];?></div>
					</div>
		<?php
				}
			}
		?>
	</div>
	<div id="formArea">
		<form method=post name="tag_form">
			<input type=hidden name=pic value="<?php echo $pic;?>" />
			<input type=hidden name=width id=width />
			<input type=hidden name=height id=height />
			<input type=hidden name=top id=top />
			<input type=hidden name=left id=left /> 	
			Escribe en una palabra lo que vés :<br />
			<input type=text name=description id="description" />
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
			<input type=hidden name=pic value="<?php echo $pic;?>" />
			<input type=hidden name=del value="<?php echo $clave;?>" />
			<input type="hidden" name="source" value="<?php echo $source;?>" />
			<a href="javascript:document.del_form<?php echo $i;?>.submit();" class="button">X</a><a href="#" class="button flag"><?php echo $resTags['description'];?></a>
			
			</form>
	       	<?php 
	       	$i++;
			}
		}
		?>
		<br />
		<form method=post name="pic_form">
		<input type=hidden name=pic value="<?php echo $pic+1;?>" />
		<input type="hidden" name="source" value="<?php echo $source;?>" />
		<a href="javascript:document.pic_form.submit();" class="button save">Siguiente imagen &gt;&gt;</a>
		</form>
	</div>
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