<?php 
/**
 * Este archivo pertenece a la vista del home.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$dataUsuario
 * */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src=" <?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/json2.js')?>"></script>

<link rel=StyleSheet href="css/global.css"/>
<link rel=StyleSheet href="css/view_home.css"/>

<title>Find Resources</title>


<script type="text/javascript">
	$(function(){
		
		$('#desloguear').click(function(){

			$.ajax({
			      url: "home/doLogout",
			      global: false,
			      type: "POST",
			      async:true,
			      success: function(response){
						window.location="login";
				  },
				  error: function(response){
						alert(response);
				  }
		    });
		});
		
		$('#irACurriculum').click(function(){
			window.location="curriculum";
		});
		
		return false;
	});
	
</script>		

</head>
<body>
<?php include("toolbar.php"); ?>


<h1>Bienvenido a FindResources</h1>
<div id="homeBody" class="clearfix">

<?php 	
	switch ($usuarioData->idTipoUsuario) {
		case "C": //CANDIDATO
?>
	<div id="homeCandidatePersonalData">
	
			<h2>Datos Personales:</h2>
			<div class="row clearfix">
				<div class="label" > Nombre: </div><div class="field"> <?php echo $usuarioData->nombre;?></div>
			</div>
			<div class="row clearfix">
				<div class="label" > Apellido: </div><div class="field"> <?php echo $usuarioData->apellido;?></div>
			</div>

			<div class="row clearfix">
				<div class="label" > <?php echo $usuarioData->idTipoDocumento;?> : </div> <div class="field"><?php echo $usuarioData->numeroDocumento;?></div>
			</div>

			<div class="row clearfix">
				<div class="label" > Teléfono </div><div class="field"> <?php echo $usuarioData->telefono;?></div>
			</div>

			<div class="row clearfix">
				<div class="label" > Pais </div><div class="field"> <?php echo $usuarioData->descripcionPais;?></div>
			</div>
	</div>
	<div id="homeCandidateLinks">
		<div id="homeCurriculumLink" class="clearfix">
			<a href="curriculum"> 
				CURRICULUM 
			</a>
		</div>
		<div id="homeTestLink" class="clearfix">
			<a href="test_luscher"> 
				COMPLETAR TEST PSICOTECNICO 
			</a>
		</div>
	</div>
	

<?php 	
        break;
	    case "E": //EMPRESA
?>

	HOME - TICKETS - BUSQUEDAS - DATOS DE LA EMPRESA

<?php 
        break;
	    case "P": //EXPERTO

?>
	HOME - Feedback Test  - Feedback Informe Final

<?php 
        break;
	    case "A": //ADMINISTRADOR

?>
		HOME - Alta de Usuario Experto
<?php 
		break;
    	default:
?>
			ERROR EN TIPO DE USUARIO.
<?php 
		break;

	} //end switch
		
?>
</div>
<?php include("footer.php"); ?>

</body>
</html>