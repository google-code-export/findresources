<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <title>FindResources</title> 
</head> 
<body> 
<?php include("toolbar.php"); ?>

<div class="body_container">

	<h1>Psicotécnicos Online</h1>
	<div id="page" style="height:600px;">
	<br /><br /><br />
	<?php if ($source == "inicio") {?>
	<h4>
	Usted está a punto de comenzar a realizar los exámenes psicotécnicos que le fueron asignados para poder seleccionarlo en un trabajo a su medida.<br /><br /> 
	Esta información es confidencial y no será compartida con terceras partes. Ante cualquier duda por favor comuníquese con <a href="mailto:consultas@findresources.com.ar">consultas@findresources.com.ar</a> .
	<br /><br /><br />
	Tenga en cuenta que la realización de los mismos puede demandar varios minutos por lo que le recomendamos realizarlo cuando pueda tomarse el tiempo necesario para terminarlos.
	<br /><br /><br /><br />
	Muchas gracias por su tiempo.
	<br /><br /><br /><br />
	El Staff de FindResources.com.ar
	</h4> 
	<br /><br /><br />
	<br /><br /><br />
	<a href="/home" class="button"><img src="/images/src/back.gif" style="vertical-align:sub;width:15px;" />&nbsp;&nbsp;Volver al Inicio</a>
	<a href="<?php echo base_url();?>Test" class="button save">Comenzar</a>
	<?php
	}
	if ($source == "fin") {
	?>
	<h4>
	Le agradecemos por haber realizado todos los tests que se le asignaron.<br /><br /> 
	Ante cualquier duda por favor comuníquese con <a href="mailto:consultas@findresources.com.ar">consultas@findresources.com.ar</a> .
	<br /><br /><br /><br />
	Muchas gracias por su tiempo.
	<br /><br /><br /><br />
	El Staff de FindResources.com.ar
	</h4> 
	<br /><br /><a href="/home" class="button"><img src="/images/src/back.gif" style="vertical-align:sub;width:15px;" />&nbsp;&nbsp;Volver al Inicio</a>
	
	<?php 
	}
	?>
	</div>
	<div id="test_footer">

</div>
<?php include("footer.php"); ?>
</div> 
</body>
</html>