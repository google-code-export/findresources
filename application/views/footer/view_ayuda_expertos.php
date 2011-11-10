<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>

<title>Find Resources</title>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
</head>
<body>
<?php include("application/views/toolbar.php"); ?>
	<div class="body_container" style="min-height:600px">
	<h1>Ayuda</h1>
	<div style="font-size:15px;">
	<br />A continuación encontrará una explicación paso a paso, que lo ayudará a conocer todas las funcionalidades FindResources.<br />
	<?php include("manual_de_usuario_p.html")?>
	</div>
	</div>
	<div id="login_footer">
		<?php include("application/views/footer.php"); ?>
	</div>
</body>
</html>