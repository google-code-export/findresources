<?php 
/**
 * Este archivo pertenece a la vista de las busquedas.
 * El siguiente php tiene como parametros que recible del controller 
 * al cargarse  las siguientes variables>
 * 		$dataUsuario
 * */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src=" <?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/json2.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/view_busquedas.js')?>"></script>

<link rel=StyleSheet href="css/global.css"/>
<link rel=StyleSheet href="css/view_busquedas.css"/>

<title>Find Resources</title>


</head>
<body>
<?php include("toolbar.php"); ?>

<h1>Busquedas </h1>
<div id="searchBody" class="clearfix">
	<h2>Razón Social: <?php echo $usuarioData->razonSocial;?></h2>
	SEARCH BODY :)
</div>


<?php include("footer.php"); ?>

</body>
</html>