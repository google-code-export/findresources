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




<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/jquery-ui-1.8.16.css')?>" />
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/tabs.css')?>"/>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/starrating.css')?>"/>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/style.css')?>"/>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/starrating.css')?>"/>
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/view_busquedas.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/flexigrid/flexigrid.pack.css')?>" />
	

<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/flexigrid/flexigrid.pack.js')?>"></script>	
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-ui.min-1.8.16.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/starrating.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/view_busquedas.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/hardSkills.js')?>"></script>



<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<title>Find Resources</title>

<script type="text/javascript">

	var userSearchs = <?php echo json_encode_utf8($busquedasDelUsuario); ?>;

	var availableIndustries = <?php  echo json_encode_utf8($industriasDisponibles); ?>;

	var availableAreas = <?php  echo json_encode_utf8($areasDisponibles); ?>;

	var availableTools = new Array(); //fill in $('#availableAreasSelect'.change(;	

	var availableCountries = <?php echo json_encode_utf8($paises); ?>;

	var selectedSearch	= <?php echo isset($busquedaSeleccionada)?json_encode_utf8($busquedaSeleccionada): "null";?>;

	var availableSoftSkills	= <?php echo json_encode_utf8($habilidadesBlandasDisponibles['lista_hab_blandas']); ?>;

	var busquedaId	= <?php echo $_GET["busquedaId"];?>
	
</script>
</head>
<body>
<?php include("toolbar.php"); ?>
<div class="body_container">
	<h1>Búsquedas </h1>
	
		<div id="searchBody" class="clearfix">
			<div id="leftPanel">
				<div id="newSearchLink" class="clearfix">
					<a class="newSearch" href="javascript:newSearch();"><img src="images/src/add.png"/> <b>Nueva</b> búsqueda</a>
				</div> <!-- END OF newSearchLink -->
				<div id="savedSearchLinks" class="clearfix">
					
					<?php 
					foreach ($busquedasDelUsuario as $i => $busq){ ?>
						<div class="savedSearchLink 
						<?php 
						switch ($busq->d_estado) {
							case "Nueva" : 
								echo "newSearchLink";
								break;
							case "Terminada":
								echo "closedSearchLink";
								break;
							case "Activa":
								echo "activatedSearchLink";							
								break;
							case "Cancelada":
								echo "cancelledSearchLink";							
								break;
							case "Pendiente":
								echo "pendingSearchLink";							
								break;
							
						}
						?>">
							<a href="busquedas?busquedaId=<?php echo $busq->id_busqueda?>">
								<?php echo $busq->d_titulo?>
							</a>
							<!--a class="editSearchDataLink" href="javascript:editSearchData(<?php echo $i ?>);">
								<img src="images/src/pencil.gif"/>
							</a-->
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
						<div id="searchDescription">
							<div style="float:left;" >
							<h3>
								Búsqueda: <b><?php echo $estadoBusqueda["titulo"] ?></b>
							</h3>
							</div>
							<div style="float:right;" >
							<a class="editSearchDataLink button" href="javascript:editSearchData(<?php echo $busquedaId?>);" title="Editar">
								<img src="images/src/edit16.png" style="vertical-align:sub;width:15px" /> Editar datos
							</a>
							</div>	
						</div>
						<div id="searchTabs" class="clearfix">
							<ul class="tabs">  
							    <li><a href="#tab1">Opciones</a></li>  
							    <li><a href="#tab2" onclick="javascript:setGrid(<?php echo $busquedaId?>,'N')">Resultados</a></li>  
							</ul>
								  
							<div class="tab_container">  
							    <div id="tab1" class="tab_content">
									<div class="block" id="hardProperties">
										<h2>Conocimientos <a href="javascript:editHardSkills();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
										<div class="inblock">
											<h4>Areas de negocio</h4>
											<ul>
											<?php foreach ($busquedaSeleccionada['lista_industria']  as $id => $habilidad){ ?>
												<li class="clearfix">
													<div class="label"> 
														<?php echo $habilidad->d_industria; ?> : 
													</div>											
													<ul class='star-rating' >
														<li class='current-rating' value="<?php echo $habilidad->valoracion ?>" ></li>
													</ul>

													<div title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
													<div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: <?php echo $habilidad->importancia ?>%;"></div>
													</div>

													<div class="importanceLabel"><?php echo $habilidad->importancia ?> %</div>

												</li>		
											<?php } ?>
											</ul>
										</div>
						
										<div class="inblock">
											<h4>Herramientas</h4>
											<ul>
											<?php foreach ($busquedaSeleccionada['lista_herramienta'] as $habilidad){ ?>
												<li class="clearfix">
													<div class="label"> 
														<?php echo $habilidad->d_area ?> - <?php echo $habilidad->d_herramienta ?>: 
													</div>
													<ul class='star-rating'>
														<li class='current-rating' value="<?php echo $habilidad->valor_herramienta ?>"></li>
													</ul>
													<div title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
													<div class="ui-slider-range ui-widget-header ui-slider-range-min" style="width: <?php echo $habilidad->importancia ?>%;"></div>
													</div>
													<div class="importanceLabel"> 
														<?php echo $habilidad->importancia ?> %
													</div>											
												</li>
											<?php } ?>
											</ul>
										</div>
									</div>
									<div class="block" id="softSkills">
										<h2>Aspectos de la Personalidad <a href="javascript:editSoftSkills();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
										<?php if(count($busquedaSeleccionada['hab_blanda'])) {?><div class="inblock"> <?php  }?>
											<?php foreach ($busquedaSeleccionada['hab_blanda'] as $habilidad){ ?>
												<div class="row clearfix">
													<?php echo $habilidad->d_habilidad_blanda; ?>
												</div>
											<?php } ?>
										<?php if(count($busquedaSeleccionada['hab_blanda'])) {?></div> <?php  }?>
									</div>
													
									<div class="block" id="hardSkills">
										<h2>Educación Formal 
											<a class="addFields" href="javascript:addFormalEduction();"><img src="images/src/add.png"/> Agregar una educación</a>
										</h2>
										
										<?php foreach ($busquedaSeleccionada['edu_formal'] as $i => $educacion) { ?>
											<!-- id_bus_edu_formal -->
											<div class="inblock">
												<a href="javascript:editFormalEducation(<?php echo $i ;?>);" class="editFields">
													<img src="images/src/pencil.gif"/> Editar
												</a> 
												<a href="javascript:eraseFormalEducation(<?php echo $i ;?>);" class="eraseFields">
													<img src="images/src/delete.png"/> Quitar
												</a>
												
												<div class="row clearfix" style="margin-top: 17px;">
													<div class="label"> Entidad: </div> 
													<?php echo ($educacion->id_entidad_educativa != "")?$entidadesEducativas[$educacion->id_entidad_educativa]: $educacion->d_entidad ?>
													<?php echo ($educacion->c_modo_entidad == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
												<div class="row clearfix">
													<div class="label"> Titulo: </div> 
													<?php echo $educacion->titulo ?>
													<?php echo ($educacion->c_modo_titulo == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
												<div class="row clearfix">
													<div class="label"> Nivel de Educación: </div> 
													<?php echo $educacion->d_nivel_educcacion ?>
													<?php echo ($educacion->c_modo_nivel_educacion == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
												<div class="row clearfix">
													<div class="label"> Area: </div> 
													
													<?php 
													var_dump($educacion);
													echo $educacion->d_area ?>
													<?php echo ($educacion->c_modo_area == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
												<div class="row clearfix">
													<div class="label"> Estado: </div> 
													<?php echo $educacion->d_estado ?>
													<?php echo ($educacion->c_modo_estado == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
												<div class="row clearfix">
													<div class="label"> Promedio: </div> 
													de 
													<?php echo $educacion->promedio_desde ?> a 
													<?php echo $educacion->promedio_hasta ?>
													<?php echo ($educacion->c_modo_promedio == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>								
											</div>
										<?php } ?>
									</div>
			
									<div class="block" id="hardProperties">
										<?php $recurso = $busquedaSeleccionada["recurso"]   ?>
										
										<h2>Datos Adicionales <a href="javascript:editAditionalData();" class="editFields"><img src="images/src/pencil.gif"/>Editar</a></h2>
											<div class="study inblock">
												<?php if( $recurso["edad_desde"] != "" OR $recurso["edad_hasta"] != "")  { ?>
												<div class="row clearfix">
													<div class="label"> Edad: </div> 
													<?php echo @$recurso["edad_desde"] ?> a
													<?php echo @$recurso["edad_hasta"]?> años
													<?php echo (@$recurso["edad_c_modo"] == "R")? "(Requerido)" : "(Deseado)"?>  
												</div>								
												<?php } ?>
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
													<?php echo (@$recurso["twitter_c_modo"] == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>
												<div class="row clearfix">
													<div class="label">Posee gtalk:</div> 
													<?php echo (@$recurso["gtalk_c_modo"] == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>
												<div class="row clearfix">
													<div class="label">Posee sms:</div> 
													<?php echo (@$recurso["sms_c_modo"] == "R")? "(Requerido)" : "(Deseado)" ?>
												</div>
											</div>
									</div>
			
							    </div> <!--  END OF TAB1 -->
							    
							    
							    <div id="tab2" class="tab_content">
							<div style="float:right;" >
								<a class="editSearchDataLink button" href="javascript:setGrid(<?php echo $busquedaId?>,'S')" title="Actualizar" >
								<img src="images/src/refresh.png" style="vertical-align:sub"/> Actualizar Resultados 
							</a>
							</div><br /><br /><br />
							    	<table class="flexme1">	</table>
							    </div>  <!--  END OF TAB2 -->
							    
							    
						    </div>  <!--  END OF tab_container --> 
						</div> <!-- END OF searchTabs -->
					</div> <!-- end of rightPanel -->
				</div> <!-- end of selected search -->
			<?php }?>
		</div> <!-- end of searchBody -->
		
		<div id="busquedas_footer">
			<?php include("footer.php"); ?>
		</div>
		
		
		<div class="popup" id="searchDataPopUp" style="display:none;">
			<table cellspacing="0" cellpadding="0" align="center">
			<tr><td>
				<div class="in">
					<div class="popuptitle"> Datos de la Búqueda</div>
					<a href="javascript:;" class="closePopUp"></a>
					<div class="inside">
						<div>
							<input type="hidden" id="searchDataEditorId" value="" />
							<div class="field clearfix">
								<div class="label">Título:</div>
								<input type="text" id="searchDataEditorTitle" value="" />
							</div>
							<div class="field clearfix">
								<div class="label">Descripción:</div>
								<textarea id="searchDataEditorDescription"> </textarea>
							</div>
							<div class="field clearfix">
								<div class="label">Cantidad de personal:</div>
								<input type="text" id="searchDataEditorResourcesQuantity" value="" />
							</div>
							<div class="field clearfix" id="searchDataEditorTicketContainer">
								<div class="label">Tickets Disponibles:</div>
								<select id="searchDataEditorTicket" style="width:170px">
								<option value="" selected=selected >Seleccione..</option>
								<?php foreach($tickets as $ticket) { ?>
								<!-- <option value="<?php echo $ticket->id_ticket;?>">Ticket #<?php echo str_pad($ticket->id_ticket, 3, "0", STR_PAD_LEFT)." | Saldo: ".str_pad($ticket->q_saldo, 5, "0", STR_PAD_LEFT)." | ".$ticket->duracion." días";?></option> -->
								<optgroup label="Ticket #<?php echo $ticket->id_ticket;?>" >
								  <option value="" disabled=disabled >Saldo: <?php  echo $ticket->q_saldo;?></option>
								  <option value="" disabled=disabled >Duración: <?php echo $ticket->duracion." días";?></option>
								  <option value="<?php echo $ticket->id_ticket;?>">UTILIZAR TICKET #<?php echo $ticket->id_ticket;?></option>
								</optgroup>							
								<?php } ?>
	
	
								</select>
								<label id="searchDataEditorTicketInfo"/>
							</div>
							<label id="searchDataEditorTicketInfo"/>	
							<div class="field clearfix" id="searchDataEditorDateToContainer">
								<div class="label">Fecha Hasta:</div>
								<label id="searchDataEditorDateTo"/>
							</div>
							<div class="field clearfix" id="searchDataEditorStatusContainer">
								<div class="label">Estado:</div>
								<label id="searchDataEditorStatus" />
							</div>
					
						</div>
						<div class="buttonsPopUp">
							<a href="javascript:setSearchData();" class="button save sendButton">Guardar</a>
							<a href="#" class="button cancelPopUp">Cancelar</a>
							<div id="finishSearchButton" align="right" ><br /><a href="javascript:finishSearch();" class="button delete finishButton" >Finalizar Búsqueda</a></div>
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
				<div class="popuptitle">Conocimientos</div>
				<a href="javascript:;" class="closePopUp"></a>
				<div class="inside">
					<div class="clearfix">
						<div id="seniorityTitle">Seniority</div>
						<div id="importanceTitle">Importancia</div>
					</div>
					<h4>Areas de negocio</h4>
					<div class="clearfix">
						<select id="availableIndustriesSelect">
							<?php foreach ($industriasDisponibles as $id => $industria){ ?>
								<option value="<?php echo $id; ?>"><?php echo $industria;?></option> 
							<?php } ?>
						</select>
		
						<a class="addIndustry" href="javascript:addIndustry(true);"> <img src="images/src/add.png"/> Agregar</a>
					</div>
		
					<ul id="editItemIndustryList">
						<?php foreach ($busquedaSeleccionada["lista_industria"] as $id => $habilidad){ ?>
						<li id="editItemIndustry<?php echo $habilidad->id_industria ?>" class="industryItem">
							<div class="field">
								<div class="label"><?php echo $habilidad->d_industria ?>:</div> 
								<div class="starRatingContainer">
									<ul class='star-rating'>
										<li class='current-rating' value="<?php echo $habilidad->valoracion ?>"></li>
										<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->id_industria ?> .current-rating', 1); return false;" 
									           title='Trainee' class='one-star'>1</a></li>
										<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->id_industria ?> .current-rating',2); return false;" 
									           title='Junior' class='two-stars'>2</a></li>
										<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->id_industria ?> .current-rating',3); return false;" 
									           title='Semi senior' class='three-stars'>3</a></li>
										<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->id_industria ?> .current-rating',4); return false;" 
									           title='Senior' class='four-stars'>4</a></li>
										<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->id_industria ?> .current-rating',5); return false;" 
									           title='Experto' class='five-stars'>5</a></li>
									</ul>
								</div>

								<div class="sliderContainer">
									<div class="slider" title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)">
										<label>%</label>
										<input type="text" class="importanceInput" value="<?php echo $habilidad->importancia ?>"/>
									</div>
								</div>

								<a class="removeSkillLink" href="javascript:removeIndustry(<?php echo $habilidad->id_industria?>);"><img src="images/src/delete.png"></img></a>
							</div>
						</li>
					<?php } ?>
					</ul>
					
					<h4 id="toolEditorList">Herramientas</h4>
					<div>
						<select id="availableAreasSelect">
							<option id="availableAreasDefaultOption" value="-1" selected="selected">Areas</option>
							<?php foreach ($areasDisponibles as $id => $area){ ?>
								<option value="<?php echo $id; ?>"><?php echo $area;?></option> 
							<?php } ?>
						</select>
						<select id="availableToolsSelect">
							<option value="-1">Herramientas</option> 
						</select>
						<a class="addTool" href="javascript:addTool(true);"> <img src="images/src/add.png"/> Agregar</a>
					</div>
					
					<ul id="editItemToolList">
					<?php foreach ($busquedaSeleccionada["lista_herramienta"] as $id => $habilidad){ ?>
						<li id="editItemTool<?php echo $habilidad->id_herramienta ?>" class="toolItem">
							<div class="field">
								<div class="label">
									<?php echo $habilidad->d_area ?> - <?php echo $habilidad->d_herramienta ?>: 
								</div>
	
								<div class="starRatingContainer">
									<ul class='star-rating'>
										<li class='current-rating' value="<?php echo $habilidad->valor_herramienta ?>"></li>
										<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->id_herramienta ?> .current-rating', 1); return false;" 
									           title='Trainee' class='one-star'>1</a></li>
										<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->id_herramienta ?> .current-rating',2); return false;" 
									           title='Junior' class='two-stars'>2</a></li>
										<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->id_herramienta ?> .current-rating',3); return false;" 
									           title='Semi senior' class='three-stars'>3</a></li>
										<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->id_herramienta ?> .current-rating',4); return false;" 
									           title='Senior' class='four-stars'>4</a></li>
										<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->id_herramienta ?> .current-rating',5); return false;" 
									           title='Experto' class='five-stars'>5</a></li>
									</ul>
								</div>
	
								<div class="sliderContainer">
									<div class="slider" title="Importancia: Determina el grado de deseado del puesto. 100% es requerido.)">
										<label>%</label>
										<input type="text" class="importanceInput" value="<?php echo $habilidad->importancia ?>"/>
									</div>
								</div>

								<a class="removeSkillLink" href="javascript:removeTool(<?php echo $habilidad->id_herramienta ?>);"><img src="images/src/delete.png"></img></a>
							</div>
						</li>
					<?php } ?>
					</ul>
					<div class="buttonsPopUp">
						<a href="javascript:setHardSkills();" class="button save sendButton">Guardar</a>
						<a href="#" class="button cancelPopUp">Cancelar</a>
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
					<div class="popuptitle">Aspectos de la Personalidad</div>
					<a href="#" class="closePopUp"></a>
					<div class="inside">
						<h4>Habilidades</h4>
						<div>
							<select id="availableSoftSkillsSelect">
								<option id="availableSoftSkillsDefaultOption" value="-1" selected="selected">Características</option>
								
								<?php foreach ($habilidadesBlandasDisponibles['lista_hab_blandas'] as $index => $habilidad){ ?>
									<option value="<?php echo $index ?>"><?php echo $habilidad->d_habilidad_blanda;?></option> 
								<?php } ?>
							</select>
							<a href="javascript:addSoftSkill();"> <img src="images/src/add.png"/> Agregar</a>
						</div>
						<br />
						<ul id="editItemSoftSkillList">
							<?php 
							foreach ($busquedaSeleccionada['hab_blanda'] as $habilidad){ ?>
								<li id="editSoftSkillItem<?php echo $habilidad->id_habilidad_blanda ?>" class="softSkillItem">
									<img src='/images/src/bullet_flecha.png' /> <?php echo $habilidad->d_habilidad_blanda?>
									<a href="javascript:removeSoftSkill(<?php echo $habilidad->id_habilidad_blanda ?>);">&nbsp;<img src="/images/src/delete.png"/></a>
									<br /><br />
								</li>
							<?php } ?>
						</ul>
						<div class="buttonsPopUp">
							<a href="javascript:setSoftSkills();" class="button save sendButton">Guardar</a>
							<a href="#" class="button cancelPopUp">Cancelar</a>
						</div>
					</div>
				</div>
			</td></tr>
			</table>
		</div>
	
		<div class="popup" id="formalEducationPopUp" style="display:none;">
			<table cellspacing="0" cellpadding="0" align="center">
			<tr><td>
				<div class="in">
					<div class="popuptitle">Educación Formal</div>
					<a href="javascript:;" class="closePopUp"></a>
					<div class="inside">
						<div>
							<input type="hidden" id="formalEducationId" value="" />
							<div class="field clearfix">
								<div class="label">Institución:</div>
								<select id="formalEducationEditorInstitution">
								   <option value="">Otra</option>
								   <?php foreach ($entidadesEducativas as $id => $desc){ ?>
								   			<option value="<?php echo $id;?>">
												<?php echo $desc;?>
											</option> 
								   <?php } ?>
								</select>
								<select class="modeField" id="formalEducationEditorInstitutionMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
							
							<div class="field clearfix">
								<div class="label">Otra:</div>
								<input type="text" id="formalEducationEditorInstitutionDescription" disabled="disabled"/>
							</div>
							
							<div class="field clearfix">
								<div class="label">Título:</div>
								<input type="text" id="formalEducationEditorTitle" value="" />
								<select class="modeField" id="formalEducationEditorTitleMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
							
							<div class="field clearfix">
								<div class="label">Nivel:</div>
								<select id="formalEducationEditorLevel">
								   <?php foreach ($nivelesDeEducacion as $id => $desc){ ?>
								   			<option value="<?php echo $id;?>">
												<?php echo $desc;?>
											</option> 
								   <?php } ?>
								</select>
								<select class="modeField" id="formalEducationEditorLevelMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
			
			
							<div class="field clearfix">
								<div class="label">Area:</div>
								<select id="formalEducationEditorArea">
								   <?php foreach ($areasDisponibles as $id => $desc){ ?>
								   			<option value="<?php echo $id;?>">
												<?php echo $desc;?>
											</option> 
								   <?php } ?>
								</select>
								<select class="modeField" id="formalEducationEditorAreaMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
	
							<div class="field clearfix">
								<div class="label">Estado:</div>
								<select id="formalEducationEditorStatus">
						   			<option value="T">Terminado</option> 
						   			<option value="A">Abandonado</option> 
						   			<option value="C">En Curso</option> 
								</select>
								<select class="modeField" id="formalEducationEditorStatusMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
						
							<div class="field clearfix">
								<div class="label">Promedio: desde </div>
								<input type="text" id="formalEducationEditorAverageFrom" value="" />
								a
								<input type="text" id="formalEducationEditorAverageTo" value="" />
								<select class="modeField" id="formalEducationEditorAverageMode">
								   			<option value="P">Deseado</option>
								   			<option value="R">Requerido</option> 
								</select>
							</div>
						</div>
						
						
						<div class="buttonsPopUp">
							<a href="javascript:setFormalEducation();" class="button save sendButton">Guardar</a>
							<a href="#" class="button cancelPopUp">Cancelar</a>
						</div>
					</div>
				</div>
			</td></tr>
			</table>
		</div>
		
		
		<div class="popup" id="aditionalDataPopUp" style="display:none;">
			<table cellspacing="0" cellpadding="0" align="center">
			<tr><td>
				<div class="in">
					<div class="popuptitle">Datos Adicionales</div>
					<a href="javascript:;" class="closePopUp"></a>
					<div class="inside">
						<div>
							<div class="field clearfix">
								<div class="label">Edad: </div>
								De&nbsp;
								<input type="text" id="aditionalDataEditorAgeFrom" value="<?php echo @$recurso["edad_desde"]?>"/>
								&nbsp;a&nbsp;
								<input type="text" id="aditionalDataEditorAgeTo" value="<?php echo @$recurso["edad_hasta"]?>"/>
								años&nbsp;
								<select class="modeField" id="aditionalDataEditorAgeMode">
								   			<option value="P" <?php if ($recurso["edad_c_modo"] == "P") echo "selected";?>>Deseado</option>
								   			<option value="R" <?php if ($recurso["edad_c_modo"] == "R") echo "selected";?>>Requerido</option> 
								</select>
							</div>
							<div class="field clearfix">
								<div class="label">Posee twitter:</div>
								<select class="modeField" id="aditionalDataEditorTwitterMode">
								   			<option value="P" <?php if ($recurso["twitter_c_modo"] == "P") echo "selected";?>>Deseado</option>
								   			<option value="R" <?php if ($recurso["twitter_c_modo"] == "R") echo "selected";?>>Requerido</option> 
								</select>
							</div>
							<div class="field clearfix">
								<div class="label">Posee gtalk:</div>
								<select class="modeField" id="aditionalDataEditorGtalkMode">
								   			<option value="P" <?php if ($recurso["gtalk_c_modo"] == "P") echo "selected";?>>Deseado</option>
								   			<option value="R" <?php if ($recurso["gtalk_c_modo"] == "R") echo "selected";?>>Requerido</option> 
								</select>
							</div>
							<div class="field clearfix">
								<div class="label">Posee sms:</div>
								<select class="modeField" id="aditionalDataEditorSmsMode">
								   			<option value="P" <?php if ($recurso["sms_c_modo"] == "P") echo "selected";?>>Deseado</option>
								   			<option value="R" <?php if ($recurso["sms_c_modo"] == "R") echo "selected";?>>Requerido</option> 
								</select>
							</div>
						</div>
						
						
						<div class="buttonsPopUp">
							<a href="javascript:setAditionalData();" class="button save sendButton">Guardar</a>
							<a href="#" class="button cancelPopUp">Cancelar</a>
						</div>
					</div>
				</div>
			</td></tr>
			</table>
		</div>
</div>

</body>
</html>