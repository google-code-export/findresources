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
<script type="text/javascript" src=" <?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/view_busquedas.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/hardSkills.js')?>"></script>

<link rel=StyleSheet href="<?php echo site_url('css/global.css')?>"/>
<link rel=StyleSheet href="<?php echo site_url('css/tabs.css')?>"/>
<link rel=StyleSheet href="<?php echo site_url('css/view_busquedas.css')?>"/>



<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<title>Find Resources</title>

<script type="text/javascript">

	var userSearchs = <?php echo json_encode_utf8($busquedasDelUsuario["busquedasActivas"]); ?>;

 	var availableIndustries = <?php  echo json_encode_utf8($industriasDisponibles); ?>;

	var availableAreas = <?php  echo json_encode_utf8($areasDisponibles); ?>;

	var availableTools = new Array(); //fill in $('#availableAreasSelect'.change(;	

	var availableCountries = <?php echo json_encode_utf8($paises); ?>;

	var selectedSearch	= <?php echo isset($busquedaSeleccionada)?json_encode_utf8($busquedaSeleccionada): "null";?>;

	var availableSoftSkills	= <?php echo json_encode_utf8($habilidadesBlandasDisponibles['habilidadesBlandas']); ?>;
	
</script>



</head>
<body>
<?php include("toolbar.php"); ?>
<h1>Busquedas </h1>

	<div id="searchBody" class="clearfix">
		<div id="leftPanel">
			<div id="newSearchLink" class="clearfix">
				<a class="newSearch" href="javascript:newSearch();"><img src="images/src/add.png"/> <b>Nueva</b> búsqueda</a>
			</div> <!-- END OF newSearchLink -->
			<div id="savedSearchLinks" class="clearfix">
				
				<?php 
				foreach ($busquedasDelUsuario["busquedas_activas"] as $i => $busq){ ?>
					<div class="savedSearchLink">
						<a href="busquedas?busquedaId=<?php echo $busq->id_busqueda?>">
							<?php 
							echo $busq->d_busqueda?>
						</a>
						<a class="editSearchDataLink" href="javascript:editSearchData(<?php echo $i ?>);">
							<img src="images/src/pencil.gif"/>
						</a>
					</div>
				<?php }?>
				
			</div> <!-- END OF savedSearchsLinks -->
		</div>
		<div id="rightPanel">
			<?php if(!isset($busquedaSeleccionada)){?>
				<div id="noSelectedSearch">
					Seleccione una búsqueda.
				</div>
			<?php }else{?>
				<div id="selectedSearch">
					<div id="searchTabs" class="clearfix">
						<ul class="tabs">  
						    <li><a href="#tab1">Opciones</a></li>  
						    <li><a href="#tab2">Estado</a></li>  
						    <li><a href="#tab3">Resultados</a></li>  
						</ul>  
							  
						<div class="tab_container">  
						    <div id="tab1" class="tab_content">
								<div class="block" id="hardProperties">
									<h2>Caracterísiticas Duras <a href="javascript:editHardSkills();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
									<div class="inblock">
										<h4>Industrias</h4>
										<ul>
										<?php foreach ($busquedaSeleccionada['industrias']  as $id => $habilidad){ ?>
											<li><?php echo $habilidad->d_industria ?>: <?php echo $habilidad->valoracion ?> - <?php echo $habilidad->importancia ?></li>
										<?php } ?>
										</ul>
									</div>
					
									<div class="inblock">
										<h4>Areas</h4>
										<ul>
										<?php foreach ($busquedaSeleccionada['herramientas'] as $habilidad){ ?>
											<li><?php echo $habilidad->d_area ?> - <?php echo $habilidad->d_herramienta ?>: <?php echo $habilidad->valor_herramienta ?> - <?php echo $habilidad->importancia ?></li>
										<?php } ?>
										</ul>
									</div>
								</div>
								<div class="block" id="softSkills">
									<h2>Características Blandas <a href="javascript:editSoftSkills();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
									<div class="inblock">
										<?php foreach ($busquedaSeleccionada['habilidadesBlandas'] as $habilidad){ ?>
											<div class="row clearfix">
												<?php echo $habilidad->d_habilidad_blanda; ?>
											</div>
										<?php } ?>
									</div>
								</div>
												
								<div class="block" id="hardSkills">
									<h2>Educacion Formal <a href="javascript:editFormalEducation();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
									
									<?php foreach ($busquedaSeleccionada['educacionFormal'] as $educacion) { ?>
										<!-- id_bus_edu_formal -->
										<div class="study inblock">
											<div class="row clearfix">
												<div class="label"> Entidad: </div> 
												<?php echo ($educacion->id_entidad_educativa != "")?$entidadesEducativas[$educacion->id_entidad_educativa]: $educacion->d_entidad ?>
												<?php echo $educacion->c_modo_entidad ?>
											</div>								
											<div class="row clearfix">
												<div class="label"> Titulo: </div> 
												<?php echo $educacion->titulo ?>
												<?php echo $educacion->c_modo_titulo ?>
											</div>								
											<div class="row clearfix">
												<div class="label"> Nivel de Educación: </div> 
												<?php echo $educacion->id_nivel_educacion ?>
												<?php echo $educacion->c_modo_nivel_educacion ?>
											</div>								
											<div class="row clearfix">
												<div class="label"> Area: </div> 
												<?php echo $educacion->id_area ?>
												<?php echo $educacion->c_modo_area ?>
											</div>								
											<div class="row clearfix">
												<div class="label"> Estado: </div> 
												<?php echo $educacion->estado ?>
												<?php echo $educacion->c_modo_estado ?>
											</div>								
											<div class="row clearfix">
												<div class="label"> Promedio: </div> 
												de 
												<?php echo $educacion->promedio_desde ?> a 
												<?php echo $educacion->promedio_hasta ?>
												<?php echo $educacion->c_modo_promedio ?>
											</div>								
										</div>
									<?php } ?>
								</div>
		
								<div class="block" id="hardProperties">
									<h2>Datos Adicionales <a href="javascript:editAditionalData();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>

									<?php foreach ($busquedaSeleccionada["recurso"] as $recurso) { ?>
										<div class="study inblock">
											<div class="row clearfix">
												<div class="label"> Edad: </div> 
												de
												<?php echo $recurso->edadDesde ?> a
												<?php echo $recurso->edadHasta?> -
												<?php echo $recurso->edadModo?>  
											</div>								
											<!--div class="row clearfix">
												<div class="label">Nacionalidad: </div> 
												<--?php echo $busquedaSeleccionada["recurso"]->nacionalidad ?>
											</div-- >
											<div class="row clearfix">
												<div class="label">Provincia:</div> 
												<!--?php echo $recurso->provincia ?>
											</div-- >
												<div class="row clearfix">
												<div class="label">Localidad:</div> 
												<!--?php echo $recurso->localidad ?>
											</div-->
											<div class="row clearfix">
												<div class="label">Posee twitter:</div> 
												<?php echo $recurso->twitterModo ?>
											</div>
											<div class="row clearfix">
												<div class="label">Posee gtalk:</div> 
												<?php echo $busquedaSeleccionada["recurso"]->gtalkModo ?>
											</div>
											<div class="row clearfix">
												<div class="label">Posee sms:</div> 
												<?php echo $busquedaSeleccionada["recurso"]->smsModo ?>
											</div>
										</div>
									<?php } ?>
								</div>
		
						    </div>
						    
						    <div id="tab2" class="tab_content">
						    
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
						    </div>  <!--  END OF TAB1 -->
						    
						    
						    
						    <div id="tab3" class="tab_content">  
						    
								<!--a href="busquedas/modificarBusqueda/1">Modificar Búsqueda</a>
								<a href="busquedas/eliminarBusqueda/1">Eliminar Búsqueda</a> <!-- falta sp --  >
								<a href="busquedas/verDetalle/1">Ver Detalle</a>
								<a href="busquedas/seleccionarCandidatos/1">Seleccionar Candidatos</a-->
						    </div>  <!--  END OF TAB2 -->
						    
						    <div id="tab3" class="tab_content">
						    	RESULTADOS  
						    </div>  <!--  END OF TAB3 -->
						    
						    
					    </div>  <!--  END OF tab_container --> 
					</div> <!-- END OF searchTabs -->
				</div> <!-- end of rightPanel -->
			</div> <!-- end of selected search -->
		<?php }?>
	</div> <!-- end of searchBody -->
	
	<div id="busquedas_footer">
		<?php include("footer.php"); ?>
	</div>
	
	
	<div class="opacity" style="display:none;"></div>
	
	<div class="popup" id="searchDataPopUp" style="display:none;">
		<table cellspacing="0" cellpadding="0" align="center">
		<tr><td>
			<div class="in">
				<div class="popuptitle"> Datos de la Búqueda</div>
				<a href="javascript:;" class="closePopUp"></a>
				<div class="inside">
					<div>	
						<div class="field clearfix">
							<div class="label">Descripción:</div>
							<input type="text" id="searchDataEditorDescription" value="" />
						</div>
						<div class="field clearfix">
							<div class="label">Fecha Hasta:</div>
							<input type="text" id="searchDataEditorDateTo" value="" />
						</div>
						<div class="field clearfix">
							<div class="label">Cantidad de personal:</div>
							<input type="text" id="searchDataEditorResourcesQuantity" value="" />
						</div>
						<div class="field clearfix">
							<div class="label">Estado:</div>
							<input type="text" id="searchDataEditorStatus" value="" />
						</div>
						
					</div>
					<div class="buttonsPopUp">
						<input type="submit" value="Guardar" class="sendButton" onclick="javascript:setSearchData();"  />
						<input type="submit" value="Cancelar" class="cancelPopUp" />
					</div>
				</div>
			</div>
		</td></tr>
		</table>
	</div>
	
	<div class="popup" id="hardSkillsPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Características Duras </div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
				<h4>Industrias</h4>
				<div class="clearfix">
					<select id="availableIndustriesSelect">
						<?php foreach ($industriasDisponibles as $id => $industria){ ?>
							<option value="<?php echo $id; ?>"><?php echo $industria;?></option> 
						<?php } ?>
					</select>
	
					<a href="javascript:addIndustry(true);"> <img src="images/src/add.png"/> Agregar</a>
				</div>
	
				<ul id="editItemIndustryList">
					<?php foreach ($busquedaSeleccionada["industrias"] as $id => $habilidad){ ?>
					<li id="editItemIndustry<?php echo $habilidad->id_industria ?>" class="industryItem">
						<div class="field">
							<div class="label"><?php echo $habilidad->d_industria ?>:</div> 
							<input type="text" class="pointsInput" value="<?php echo $habilidad->valoracion ?>"/>
							<input type="text" class="importanceInput" value="<?php echo $habilidad->importancia ?>"/>
							<a href="javascript:removeIndustry(<?php echo $habilidad->id_industria?>);">X</a>
						</div>
					</li>
				<?php } ?>
				</ul>
				
				<h4>Areas</h4>
				<div>
					<select id="availableAreasSelect">
						<option id="availableAreasDefaultOption" value="-1" selected="selected">Areas</option>
						<?php foreach ($areasDisponibles as $id => $area){ ?>
							<option value="<?php echo $id; ?>"><?php echo $area;?></option> 
						<?php } ?>
					</select>
					<select id="availableToolsSelect">
						<option value="0">Herramientas</option> 
					</select>
					<a href="javascript:addTool(true);"> <img src="images/src/add.png"/> Agregar</a>
				</div>
				
				<ul id="editItemToolList">
				<?php foreach ($busquedaSeleccionada["herramientas"] as $id => $habilidad){ ?>
					<li id="editItemTool<?php echo $habilidad->id_herramienta ?>" class="toolItem">
						<div class="field">
							<div class="label">
								<?php echo $habilidad->d_area ?> - <?php echo $habilidad->d_herramienta ?>: 
							</div>
			        		<input type="text" class="pointsInput" value="<?php echo $habilidad->valor_herramienta ?>"/>
							<input type="text" class="importanceInput" value="<?php echo $habilidad->importancia ?>"/>
							<a href="javascript:removeTool(<?php echo $habilidad->id_herramienta ?>);">X</a>
						</div>
					</li>
				<?php } ?>
				</ul>
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" onclick="javascript:setHardSkills()"/>
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
			</div>
		</div>
	</td></tr>
	</table>
	</div> <!-- END OF hardSkillsPopUp-->
	
	
	<div class="popup" id="softSkillsPopUp" style="display:none;">
		<table cellspacing="0" cellpadding="0" align="center">
		<tr><td>
			<div class="in">
				<div class="popuptitle">Características Blandas</div>
				<a href="#" class="closePopUp"></a>
				<div class="inside">
					<h4>Habilidades</h4>
					<div>
						<select id="availableSoftSkillsSelect">
							<option id="availableSoftSkillsDefaultOption" value="-1" selected="selected">Características</option>
							
							<?php foreach ($habilidadesBlandasDisponibles['habilidadesBlandas'] as $habilidad){ ?>
								<option value="<?php echo $habilidad->id_habilidad_blanda; ?>"><?php echo $habilidad->d_habilidad_blanda;?></option> 
							<?php } ?>
						</select>
						<a href="javascript:addSoftSkill();"> <img src="images/src/add.png"/> Agregar</a>
					</div>
				
					<ul id="editItemSoftSkillList">
						<?php 
						foreach ($busquedaSeleccionada['habilidadesBlandas'] as $habilidad){ ?>
							<li id="editSoftSkillItem<?php echo $habilidad->id_habilidad_blanda ?>" class="softSkillItem">
								<?php echo $habilidad->d_habilidad_blanda?>
								<a href="javascript:removeSoftSkill(<?php echo $habilidad->id_habilidad_blanda ?>);">X</a>
							</li>
						<?php } ?>
					</ul>
					<div class="buttonsPopUp">
						<input type="submit" value="Guardar" class="sendButton" />
						<input type="submit" value="Cancelar" class="cancelPopUp" />
					</div>
				</div>
			</div>
		</td></tr>
		</table>
	</div>
	
	
</body>
</html>