<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src=" <?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/libs/json2.js')?>"></script>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<title>Find Resources</title>

<style type="text/css">

body {
 background-color: #fff;
 font-size: 14px;
 color: #4F5155;
 text-align: center;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}


.company_logo{
}


</style>


</head>
<body>

<?php include("toolbar.php"); ?>
<div class="body_container">
	<h1>Autenticación</h1>
<?php 
	if($autenticado){
?>
	<div  style="padding:20px">
		<p>Su usuario fue autenticado.</p>
	</div>

	<div  style="padding:20px">
		<a href="login">
			Ingresar
		</a>
	</div>
<?php 
	}
	else {
?>
	
	<div  style="padding:20px">
		<b>ERROR AL AUTENTICARSE. </b>
	</div>
	<div  style="padding:20px">
		<p>
			SU USUARIO YA FUE AUTENTICADO O EL CODIGO ES ERRONEO.
		</p>
	</div>
<?php 
	}
?>

</div>
<?php include("footer.php"); ?>

</body>
</html>