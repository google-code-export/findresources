<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src=" <?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/json2.js')?>"></script>

<title>Find Resources</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
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

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

.company_logo{
}


</style>

<script type="text/javascript">
	$(function(){
		$('#chequeaNombreDeUsuario').click(function(){
			var usuario = "unmail6@unserver.com";
			$.post("login/getExisteUsuario", {
				'usuario': usuario
			},
			function(response){
				alert(response);
			},
			"json");
					
		});
		
		
		$('#crearNuevoUsuario').click(function(){
			

			var usuario = {
				'email':$('#email').val(),
				'clave': "1234567890",
				'nombre':"asdfadf",
				'apellido':'fdsfdsf',
				'razonSocial':'Nintendo',
				'idIndustria': '1',
				'idTipoDocumento':"CUIL",
				'numeroDocumento':"308212786", //Sin puntos ni guiones!.
				'telefono':"54 911-1441-2444",
				'idPais':"ARG",
				'tipoUsuario':"C"
			};
			
			$.post("login/crearNuevoUsuario", {
					'usuario': JSON.stringify(usuario)
				},
			function(response){
				debugger;
				//response == 0 is ok
				
			},
			"json");
			
		});
		
		$('#doLogin').click(function(){
			///TODO Esta llamada debe ser segura, hay que investigar eso!
			var usuario = {
				'email':"unmail7@unserver.com",
				'clave': "1234567890"
			};
			
			$.post("login/doLogin", {
					'usuario': JSON.stringify(usuario)
				},
			function(response){
				if(response){
					window.location="home";
				}else{
					alert("usuario invalido");
				}
			},
			"json");
			
		});
		
		return false;
	});
	
</script>		

</head>
<body>

<h1>Bienvenido a FindResources</h1>
<div class="company_logo">
	<img src="images/argentina_soft_logo.png"/>
</div>

<p>Ingrese nombre de usuario y contraseña.</p>

	<H1>TIPOS DE INDUSTRIAS DISPONIBELES</H1>
<?php 
	var_dump($industriasDisponibles);
?>

	<H1>TIPOS DE DOCUMENTOS DISPONIBELES</H1>
<?php 
	var_dump($tiposDeDocumentos);
?>

<p/>
previmente a crear al chabon debimos haber comprobado que el email no existia
	<input type="submit" value="Chequear si usuario existe" id="chequeaNombreDeUsuario"  />
<p/>
EMAIL NUEVO USUARIO: 
<input type="text" id="email" name="email" value="unmail6@unserver.com"/>
	<input type="submit" value="CREAR USUARIO NUEVO" id="crearNuevoUsuario"  />
<p/>

<p>
	<input type="submit" value="HACE EL LOGIN CHABON" id="doLogin"  />
</p>



</body>
</html>