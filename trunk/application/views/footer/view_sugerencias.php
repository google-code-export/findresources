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
		<h1>Sugerencias</h1>
		<div style="font-size:15px;">
		<?php if ($filled_form != true) { ?>
			<form method="post" name="sugerencias" action="/home/contact" class="greyform">
				<strong>Nombre y Apellido</strong><br />
				<input type="text" class="text" name="NombreApellido" id="nombreapellido" value="" />
				<br /><br />
				<strong>Email</strong><br />
				<input type="text" class="text" name="Email" id="email" value="" />
				<br /><br />
				<strong>Teléfono</strong><br />
				<input type="text" class="text" name="Telefono" id="telefono" value="" />
				<br /><br />
				<strong>Pa&iacute;s</strong><br />
				<select name="Pais" id="pais">
				<option value="">Seleccione...</option><option value="Argentina">Argentina</option><option value="Aruba">Aruba</option><option value="Belize">Belize</option><option value="Bolivia">Bolivia</option><option value="Brasil">Brasil</option><option value="Chile">Chile</option><option value="Colombia">Colombia</option><option value="Costa Rica">Costa Rica</option><option value="Cuba">Cuba</option><option value="Ecuador">Ecuador</option><option value="EE.UU">EE.UU</option><option value="El Salvador">El Salvador</option><option value="Espa&ntilde;a">Espa&ntilde;a</option><option value="Guatemala">Guatemala</option><option value="Honduras">Honduras</option><option value="Mexico">Mexico</option><option value="Nicaragua">Nicaragua</option><option value="Otro">Otro</option><option value="Panama">Panama</option><option value="Paraguay">Paraguay</option><option value="Peru">Peru</option><option value="Puerto Rico">Puerto Rico</option><option value="Rep. Dominicana">Rep. Dominicana</option><option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option><option value="Suriname">Suriname</option><option value="Trinidad y Tobago">Trinidad y Tobago</option><option value="Uruguay">Uruguay</option><option value="Venezuela">Venezuela</option>
				</select>
				<br /><br />
				<strong>Descripci&oacute;n</strong><br />
				<textarea  name="Descripcion" id="descripcion" style="width:300px;height:100px;" ></textarea>
				<br /><br />
				<a href="javascript:document.sugerencias.submit();" class="button save" style="margin-left:220px;">Enviar</a>
			</form>
			<?php } else {
				echo "Su solicitud fue enviada con éxito.";
				}
			 ?>
		</div>
	</div>
	<div id="login_footer">
		<?php include("application/views/footer.php"); ?>
	</div>
</body>
</html>