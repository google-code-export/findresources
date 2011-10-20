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
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/view_home.js')?>"></script>

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_home.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<title>Find Resources</title>

<script type="text/javascript">
	var userData = <?php  echo json_encode_utf8($usuarioData); ?>;
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
		<div id="homeCandidatePersonalDataBody" class="block">
			<h2>Datos Personales: <a href="javascript:editUserData();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
			<div class="inblock">
				<div class="clearfix">
					<div class="label" > Nombre: </div><div> <?php echo $usuarioData->nombre;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Apellido: </div><div> <?php echo $usuarioData->apellido;?></div>
				</div>
	
				<div class="clearfix">
					<div class="label" > <?php echo $usuarioData->idTipoDocumento;?> : </div> <div><?php echo $usuarioData->numeroDocumento;?></div>
				</div>
	
				<div class="clearfix">
					<div class="label" > Teléfono </div><div class=""> <?php echo $usuarioData->telefono;?></div>
				</div>
	
				<div class="clearfix">
					<div class="label" > Pais </div><div> <?php echo $usuarioData->descripcionPais;?></div>
				</div>
			</div>
		</div>
	</div>
	<div id="homeCandidateLinks">
		<div id="homeCurriculumLink" class="clearfix" align="center">
			<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/curriculum"> 
				<img src="/images/src/cv.png" />
			</a><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Editar Curriculum Vitae
		</div>

		<div id="homeTestLink" class="clearfix" align="center">
<?php if($test_pendiente == "SI") { ?>
			<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a href="/Test"> 
				<img src="/images/src/test.gif" />
			</a><br />&nbsp;&nbsp;Realizar Psicotécnico
<?php } else { ?>
			<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="/images/src/ok2.png" />
			<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Psicotécnico realizado
<?php } ?>
		</div>
	</div>
	<div class="opacity" style="display:none;"></div>	
	<div class="popup" id="userDataPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle">Datos Personales</div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
			
				<div class="field clearfix">
					<div class="label">Nombre:</div>
					<input type="text" id="userDataEditorFirstName" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Apellido:</div>
					<input type="text" id="userDataEditorLastName" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Documento Tipo:</div>
					<select id="userDataEditorIdType">
						<?php foreach ($tiposDeDocumentos as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $id;?></option> 
						<?php } ?>
					</select>
				</div>
				<div class="field clearfix">
					<div class="label">Numero:</div>
					<input type="text" id="userDataEditorIdNumber" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Teléfono:</div>
					<input type="text" id="userDataEditorPhone" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Pais:</div>
					<select id="userDataEditorCountry">
						<?php foreach ($paises as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>
				
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" />
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
			</div>
		</div>
	</td></tr>
	</table>
	</div>
			
			
	<?php 	
        break;
	    case "E": //EMPRESA
?>
	<div id="homeCandidatePersonalData">
		<div id="homeCandidatePersonalDataBody" class="block">
			<h2>Datos de la Empresa: <a href="javascript:editUserData();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
			<div class="inblock">
				<div class="clearfix">
					<div class="label" >Razón Social: </div><div> <?php echo $usuarioData->razonSocial;?></div>
				</div>
	
				<div class="clearfix">
					<div class="label" > <?php echo $usuarioData->idTipoDocumento;?> : </div> <div><?php echo $usuarioData->numeroDocumento;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Industria: </div> <div><?php echo $usuarioData->descripcionIndustria;?></div>
				</div>	
				<div class="clearfix">
					<div class="label" > Nombre: </div><div> <?php echo $usuarioData->nombre;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Apellido: </div><div> <?php echo $usuarioData->apellido;?></div>
				</div>
				<div class="clearfix">
					<div class="label" > Teléfono </div><div class=""> <?php echo $usuarioData->telefono;?></div>
				</div>
	
				<div class="clearfix">
					<div class="label" > Pais </div><div> <?php echo $usuarioData->descripcionPais;?></div>
				</div>
			</div>
		</div>
	</div>
	<br /><br />
	<div class="clearfix" align=center>
		<a href="/busquedas"> 
			<img src="/images/src/search.png" /> 
		</a>
		<br />BÚSQUEDAS<br /><br /><br />
		<a href="/tickets"> 
			<img src="/images/src/ticket.png" width=30px /> 
		</a>
		<br />TICKETS
	</div>
 
	<div class="opacity" style="display:none;"></div>	
	<div class="popup" id="userDataPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle">Datos de la Empresa</div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
			
				<div class="field clearfix">
					<div class="label">Nombre:</div>
					<input type="text" id="userDataEditorFirstName" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Apellido:</div>
					<input type="text" id="userDataEditorLastName" value="" />
				</div>
				<div class="field clearfix">
				  	<div class="label">Razon social</div>
				  	<div class="control">
						<input type="text" id="userDataEditorRazonSocial" value=""/>
					</div>
				</div>
				 <div class="field clearfix">
				    <div class="label">Industria:</div>
				    <div class="control">
						<select id="userDataEditorIdIndustria"> 
					   <?php foreach ($industriasDisponibles as $id => $unaIndustria){?>
					   			<option value="<?php echo $id?>" >
									<?php echo $unaIndustria?>
								</option> 
					   <?php } ?>
						</select>
					</div>
				</div>
				<div class="field clearfix">
					<div class="label">CUIT:</div>
					<input type="text" id="userDataEditorIdNumber" value="" />
					<input type="hidden" id="userDataEditorIdType" value="CUIT" />
				</div>
				<div class="field clearfix">
					<div class="label">Teléfono:</div>
					<input type="text" id="userDataEditorPhone" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Pais:</div>
					<select id="userDataEditorCountry">
						<?php foreach ($paises as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>
				
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" />
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
			</div>
		</div>
	</td></tr>
	</table>
	</div>
	


<?php 
        break;
	    case "P": //EXPERTO

?>
	HOME - Feedback Test  - Feedback Informe Final

<?php 
        break;
	    case "A": //ADMINISTRADOR

?>
		<div class="admin">
		
			<div class="block">
				<h2>Usuarios: </h2>
				<div class="inblock usuarios">
					<img src="/images/src/new_user_icon.gif" /> 
					<a href="admin_usuarios"> 
						<br /> Expertos
					</a>
				</div>
			</div>
				
			<div class="block informes">
				<h2>Informes: </h2>
				<div class="inblock">
					<img src="/images/src/report.png" /> 
					
					<div>
						<a href="informe_conocimientos"> 
							Conocimientos
						</a>
						<br />
			
						<a href="informe_aspectos"> 
							Aspectos de la personalidad
						</a>
						<br />
						
						<a href="informe_psicotecnicos"> 
							Estadisticas por psicotécnico
						</a>
						<br />
						
						<a href="informe_clientes"> 
							Clientes
						</a>
						<br />
						
						<a href="informe_busquedas"> 
							Puestos solicitados
						</a>
						<br />
						
						<a href="informe_cv"> 
							Curriculums
						</a>
						<br />
					</div>
				</div>
			</div>
		</div> <!-- END OF .admin  -->

			
			
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