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
<script type="text/javascript" src=" <?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/view_busquedas.js')?>"></script>

<link rel=StyleSheet href="css/global.css"/>
<link rel=StyleSheet href="css/tabs.css"/>
<link rel=StyleSheet href="css/view_busquedas.css"/>

<title>Find Resources</title>


</head>
<body>
<?php include("toolbar.php"); ?>
<h1>Busquedas </h1>
<div id="searchBody" class="clearfix">
	<h2>Razón Social: <?php echo $usuarioData->razonSocial;?></h2>
	SEARCH BODY :)
	<?php echo var_export($busquedasDelUsuario);?>
</div>
<div id="busquedas">
	<div id="busquedas_header">
	</div>
	<div id="busquedas_body">
		<div id="busquedas_wellcome">
			
		</div><br /><br/><br />
		<div id="busquedas_tabs">
			<ul class="tabs">  
			    <li><a href="#tab1">Nueva Búsqueda</a></li>  
			    <li><a href="#tab2">Ver Búsquedas</a></li>  
			</ul>  
			  
			<div class="tab_container">  
			    <div id="tab1" class="tab_content">
			    
					<div class="field">
			        	<div class="label">Característica Dura</div>
			        	<div class="control">
			        			<input type="text" name="caracteristicaDura" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
						<div class="label">Nivel</div>
						<div class="control">
			        			<input type="text" name="nivel" />
			        	</div>
				    </div><br /><br /><br />
					<div class="field">
						<div class="label">Tipo</div>
						<div class="control">
								<select>
								  <option value="Deseada">Deseada</option>
								  <option value="Necesaria">Necesaria</option>
								</select>
			        	</div>
			        </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Característica Blanda</div>
			        	<div class="control">
			        			<input type="text" name="caracteristicaBlanda" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Descripción</div>
			        	<div class="control">
			        			<textarea name="descripcion" ></textarea>
						</div>
				    </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Otro Criterio</div>
			        	<div class="control">
			        			<input type="text" name="otrocriterio" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Experiencia laboral</div>
			        	<div class="control">
			        			<input type="text" name="experiencialaboral" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Datos personales</div>
			        	<div class="control">
			        			<input type="text" name="datospersonales" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
			        	<div class="label">Educación Formal</div>
			        	<div class="control">
			        			<input type="text" name="educacionformal" />
						</div>
				    </div><br /><br /><br />
					<div class="field">
						<div class="label">Tipo</div>
						<div class="control">
								<select>
								  <option value="Obligatorio">Obligatorio</option>
								  <option value="Opcional">Opcional</option>
								</select>
			        	</div>
				    </div>
                       
					        
			    </div>  
			    <div id="tab2" class="tab_content">  
					<a href="busquedas/modificarBusqueda/1">Modificar Búsqueda</a>
					<a href="busquedas/eliminarBusqueda/1">Eliminar Búsqueda</a> <!-- FALTA HACER SP -->
					<a href="busquedas/verDetalle/1">Ver Detalle</a>
					<a href="busquedas/seleccionarCandidatos/1">Seleccionar Candidatos</a>
			   
			        </div>
			    </div>  
			</div>  
		</div>
	</div>
	<div id="busquedas_footer">
		<?php include("footer.php"); ?>
	</div>
	


</body>
</html>