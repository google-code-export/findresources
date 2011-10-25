<?php 
/**
 * Este archivo pertenece a la vista del curriculum.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$gridIndustria
 * 		$gridHerramientas
 **/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/jquery-ui-1.8.16.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/flexigrid/flexigrid.pack.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />

<script type="text/javascript">

	
</script>

<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-ui.min-1.8.16.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>

<script type="text/javascript" src=" <?php echo site_url('js/flexigrid/flexigrid.pack.js')?>"></script>	
<script type="text/javascript" src=" <?php echo site_url('js/src/view_admin_usuarios.js')?>"></script>
<style type="text/css">
	#userEditorIdType {
		width: 50px;
	}
	
	#userEditorIdNumber {
		width: 87px;
	}
</style>

<title>FindResources </title>
</head>
<body>

<?php include("toolbar.php"); ?>
	<div class="body_container">
		
		<!-- HEADER -->
		<div class="hd">
			
		</div>
		<!-- end HEADER -->
		
		<!-- CONTENT -->
		<div class="content">
			<h1>Administración de usuarios</h1>	
			<a style="float: left; padding: 13px" href="javascript:addNewUser();"><img src="/images/src/add.png"/> <b>Agregar</b> un usuario </a> 
			<div class="CL">
				<div class="info clearfix block">
					<div style="float:left">
						<table id="usuariosGrid">	</table>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include("footer.php"); ?>

<div class="popup" id="userPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Usuario </div>
			<a href="#" class="closePopUp"></a>
			<div class="inside">
				<div>	
					<div class="field clearfix">
						<div class="label">Nombre:</div>
						<input type="text" id="userEditorFirstName"></input>
					</div>

					<div class="field clearfix">
						<div class="label">Apellido:</div>
						<input type="text" id="userEditorLastName"></input>
					</div>

					<div class="field clearfix">
						<div class="label">Email:</div>
						<input type="text" id="userEditorEmail"></input>
					</div>
					<div class="field clearfix">
						<div class="label">Contraseña:</div>
						<input type="password" id="userEditorPassword"></input>
					</div>

					<div class="field clearfix">
						<div class="label">Confirmar Contraseña:</div>
						<input type="password" id="userEditorPasswordConfirm"></input>
					</div>

			        <div class="field">
			        	<div class="label">Documento:</div>
			        	<div class="control">
							<select id="userEditorIdType"> 
							   <?php foreach ($tiposDeDocumentos as $id => $tipo){ ?>
							   			<option value="<?php echo $id?>">
											<?php echo $id?>
										</option> 
							   <?php } ?>
							</select>
			        		<input type="text" id="userEditorIdNumber" />
						</div>
			        </div>
			        <div class="field">
			        	<div class="label">Telefono:</div>
			        	<div class="control">
			        		<input type="text" id="userEditorPhone" />
						</div>
			        </div>
			        <div class="field">
			        	<div class="label">Pais:</div>
			        	<div class="control">
							<select id="userEditorCountry"> 
							   <?php  
							   		foreach ($paises as $id => $pais){
							   ?>
							   			<option value="<?php echo $id?>">
											<?php echo $pais?>
										</option> 
							   <?php  
							   		}
							   ?>
							</select>
						</div>
			        </div>

				</div>
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" onclick="performEditUserData();"> </input>
					<input type="submit" value="Cancelar" class="cancelPopUp"></input>
				</div>
				
			</div>
		</div>
	</td></tr>
	</table>
</div>

<div class="popup" id="userPaswordPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Contraseña de Usuario </div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
				<div>	
					<input type="hidden" id="userPasswordEditorEmail"></input>
					<div class="field clearfix">
						<div class="label">Contraseña:</div>
						<input type="password" id="userPasswordEditorPassword"></input>
					</div>

					<div class="field clearfix">
						<div class="label">Confirmar Contraseña:</div>
						<input type="password" id="userPasswordEditorPasswordConfirm"></input>
					</div>
				</div>
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" onclick="setUserPassword();" />
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
				
			</div>
		</div>
	</td></tr>
	</table>
</div>

</body>
</html>

