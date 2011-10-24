<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
    <script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <title>FindResources</title>
	<style type="text/css">
		.body_container {
			padding-left: 20px;
			padding-right: 20px;
		}
	</style>
	    
</head> 
<body> 
<?php include("toolbar.php"); ?>

<div class="body_container">

	<h1>Informe de Ex�men Psicot�cnico</h1>
	<div id="page" style="height:auto;min-height:600px"> 
	<center> 
	<br /><br />
	<h1>Informe</h1> 
	</center>
	<br /><br />
	<p style="font-size:14px">
	<?php
		if(array_key_exists("0", $informe)) { 
			foreach($informe as $inf)
				echo @$inf->informe."<br /><br /><br />";
		} else {
			echo "A�n no han sido generados informes para este candidato.";
		} 
	?>
	
	</p>
	</div> 
</div>
<div id="test_footer">
<?php include("footer.php"); ?>
</div>
</body>
</html>