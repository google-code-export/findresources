<?php 
/**
 * Este archivo pertenece a la vista del curriculum.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$curriculumData
 * 		$habilidadesIndustriasDelCV
 * 		$habilidadesAreasDelCV
 * 		$experienciaLaboralDelCv
 * 		$educacionFormalDelCv
 * 		$educacionNoFormalDelCv
 * 		$estadosCiviles
 * 		$paises
 * 		$industriasDisponibles
 * 		$areasDisponibles
 * 		$nivelesDeEducacion
 * 		$entidadesEducativas
 * 		$tiposDeEducacionNoFormal
 **/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_curriculum.css')?>" />
<script type="text/javascript">
	var availableIndustries = <?php  echo json_encode($industriasDisponibles); ?>;

	var availableAreas = <?php  echo json_encode($areasDisponibles); ?>;

	var availableTools = new Array(); //fill in $('#availableAreasSelect').change();	

	var availableCountries = <?php  echo json_encode($paises); ?>;

	var workExperiences = <?php  echo json_encode($experienciaLaboralDelCv); ?>;

	var formalEducation = <?php  echo json_encode($educacionFormalDelCv); ?>;
	
	var informalEducation = <?php  echo json_encode($educacionNoFormalDelCv); ?>;

	var educationAvailableAreas = <?php  echo json_encode($areasDisponibles); ?>;

	var educationAvailableLevels = <?php  echo json_encode($nivelesDeEducacion); ?>;

	var educationAvailableInstitutions = <?php  echo json_encode($entidadesEducativas); ?>;
	
	var informalEducationTypes = <?php  echo json_encode($tiposDeEducacionNoFormal); ?>;

	var cvData = <?php echo json_encode($curriculumData);?>;
	
</script>
<script type="text/javascript" src="<?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/json2.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/view_curriculum.js')?>"></script>
</head>
<body>

<?php include("toolbar.php"); ?>

<div class="layout">
	
	<!-- HEADER -->
	<div class="hd">
		
	</div>
	<!-- end HEADER -->
	
	<!-- CONTENT -->
	<div class="content">
		<div class="CL">
			
			<div class="info clearfix block">
				<!-- div class="photo"-->
					<!--img src="img/face.jpg" alt="Nombre" /-->
				<!--/div>
				<div class="right"-->
					<h2>Información Personal <a href="javascript:editCVData();" class="editFields">Editar</a></h2>
					<div class="row clearfix">
						<div><?php echo ($curriculumData->estadoCivil == "") ? "" : $estadosCiviles[$curriculumData->estadoCivil]?>&nbsp;</div>
						<div><?php echo $curriculumData->fechaNacimiento?></div>
					</div>
					<div class="row clearfix">
						<!-- div><!--?php echo $curriculumData->partido?></div-->					
						<div><?php echo $curriculumData->calle?>&nbsp;</div> 
						<div><?php echo $curriculumData->numero?>&nbsp;</div>
						<div><?php echo $curriculumData->piso?>&nbsp;</div>
						<div><?php echo $curriculumData->departamento?></div>					
					</div>
					<div class="row clearfix">
						<div><?php echo $curriculumData->codigoPostal?>&nbsp;</div>					
						<div><?php echo $curriculumData->idProvincia?>&nbsp;</div>			
						<div><?php echo ($curriculumData->idPais=="") ? ""  :  $paises[$curriculumData->idPais]?></div>
					</div>
	
					<div class="row clearfix">
						<div>Tel:&nbsp;<?php echo $curriculumData->telefono1?>&nbsp;</div>					
						<div><?php echo $curriculumData->horarioContactoDesde1?>&nbsp;a&nbsp;</div>					
						<div><?php echo $curriculumData->horarioContactoHasta1?></div>					
					</div>
	
					<div class="row clearfix">
						<div>Tel:&nbsp;<?php echo $curriculumData->telefono2?>&nbsp;</div>	
						<div><?php echo $curriculumData->horarioContactoDesde2?>&nbsp; a &nbsp;</div>
						<div><?php echo $curriculumData->horarioContactoHasta2?></div>					
					</div>

					<div><?php echo ($curriculumData->idPaisNacionalidad == "")? ""  :   $paises[$curriculumData->idPaisNacionalidad]?>&nbsp;</div>
					<div><?php echo $curriculumData->twitter?>&nbsp;</div>
					<div><?php echo $curriculumData->gtalk?>&nbsp;</div>
					<div><?php echo $curriculumData->sms?></div>
					<div>$ <?php echo $curriculumData->sueldoPretendido?></div>

				<!--/div-->
			</div>
			
			<div class="block" id="hardProperties">
				<h2>Caracterisiticas Duras <a href="javascript:editHardProperties();" class="editFields">Editar</a></h2>
				<div class="inblock">
					<h4>Industrias</h4>
					<ul>
					<?php foreach ($habilidadesIndustriasDelCV as $habilidad){ ?>
						<li><?php echo $habilidad->descripcionIndustria ?>: <?php echo $habilidad->puntos ?></li>
					<?php } ?>
					</ul>
					
					<h4>Areas</h4>
					<ul>
					<?php foreach ($habilidadesAreasDelCV as $habilidad){ ?>
						<li><?php echo $habilidad->descripcionArea ?> - <?php echo $habilidad->descripcionHerramienta ?>: <?php echo $habilidad->puntos ?></li>
					<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="block" id="workExperience">
		
				<h2>Experiencia Laboral <a href="javascript:addWorkExperience();">+ <b>Agragar</b> una posición</a></h2>
							
				<?php foreach ($experienciaLaboralDelCv as $i => $experiencia){ ?>

				<div class="job" id="job<?php echo $i ?>">
				
					<h5><?php echo $experiencia->titulo; ?> <a href="javascript:editWorkExperience(<?php echo $i ;?>);" class="editFields">Editar</a></h5>
					
					<p class="company"><?php echo $experiencia->compania; ?></p>
					<p class="industry">Industria: <?php echo $industriasDisponibles[$experiencia->idIndustria]; ?></p>
					<p class="country"><?php echo $paises[$experiencia->idPais]; ?></p>
					<p class="when"><span class="dateFrom"><?php echo $experiencia->fechaDesde ?></span> – <span class="dateTo"><?php echo $experiencia->fechaHasta; ?></span></p>
					<p class="logro"><?php echo $experiencia->logro; ?></p>
					<p class="descripcion"><?php echo $experiencia->descripcion; ?></p>
					
				</div>
				<?php } ?>
				
			</div>
			
			<div class="block">
				<h2>Educaci&oacute;n Formal <a href="javascript:addFormalEducation();">+ <b>Agregar</b> educación</a></h2>
				
				<?php foreach ($educacionFormalDelCv as $i => $educacion){ ?>
				
				<div class="study">
					<h5><?php echo ($educacion->idEntidad != "")?$entidadesEducativas[$educacion->idEntidad]: $educacion->descripcionEntidad?>
					<a href="javascript:editFormalEducation(<?php echo $i ?>);" class="editFields">Edit</a></h5>
					<p class="title"><?php echo $educacion->titulo?> </p>
					<p class="when"><span class="dateFrom"><?php echo $educacion->fechaInicio?></span> – <span class="dateTo"><?php echo $educacion->fechaFinalizacion?></span></p>
					<p class="eduLevel"><?php echo $nivelesDeEducacion[$educacion->idNivelEducacion]?></p>
					<p>Area: <span class="area"><?php echo $areasDisponibles[$educacion->idArea]?></span></p>
					<p>Estado: 
					<span class="state">
					<?php 
						switch ($educacion->estado){
							case "T":
								echo "Terminado";
							break;
							case "A":
								echo "Abandonado";
							break;
							case "C":
								echo "En Curso";
							break;
							default:
								echo "";
							break;
						}
					?></span></p>
					<p class="average">Promedio <?php echo $educacion->promedio ?></p>
				</div>
				
				<?php } ?>
				
			</div>
			
			<div class="block">
				<h2>Educaci&oacute;n No Formal <a href="javascript:addInformalEducation();">+ <b>Agregar</b> educación</a></h2>
				
				<?php foreach ($educacionNoFormalDelCv as $id => $educacion){ ?>
				<div class="study">
					<h5><?php echo $educacion->descripcion?> <a href="javascript:editInformalEducation(<?php echo $id?>);" class="editFields">Edit</a></h5>
					<p class="type"><?php echo $tiposDeEducacionNoFormal[$educacion->idTipoEducacionNoFormal];?> </p>
					<p class="when">Duración: <?php echo $educacion->duracion?> </p>
				</div>
				
				<?php } ?>
			</div>
		</div>
	
	</div>
	<!-- end CONTENT -->
	
	<!-- FOOTER -->
	<div class="ft">
		<!-- ?php include("footer.php"); ?-->
	</div>
	<!-- end FOOTER -->
	
</div>

<div class="opacity" style="display:none;"></div>

<div class="popup" id="cvDataPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Información Personal </div>
		<a href="javascript:;" class="closePopUp">Cerrar</a>
		<div class="inside">
			<div>	
				<div class="field clearfix">
					<div class="label">Estado Civil:</div>
					<select id="cvDataEditorMaritalStatus">
						<?php foreach ($estadosCiviles as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>
				<div class="field clearfix">
					<div class="label">Fecha de nac:</div>
					<input type="text" id="cvDataEditorBirthDay" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Calle:</div>
					<input type="text" id="cvDataEditorAddressStreet" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Numero:</div>
					<input type="text" id="cvDataEditorAddressNumber" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Piso:</div>
					<input type="text" id="cvDataEditorAddressFloor" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Dto:</div>
					<input type="text" id="cvDataEditorAddressApt" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Código Postal:</div>
					<input type="text" id="cvDataEditorZipCode" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Provincia:</div>
					<input type="text" id="cvDataEditorState" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Pais:</div>
					<select id="cvDataEditorCountry">
						<?php foreach ($paises as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>
				
				<div class="field clearfix">
					<div class="label">Tel 1:</div>
					<input type="text" id="cvDataEditorPhone1" value="" />
				</div>

				<div class="field clearfix">
					<div class="label">Horario Desde:</div>
					<input type="text" id="cvDataEditorContactFrom1" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Hasta:</div>
					<input type="text" id="cvDataEditorContactTo1" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Tel 2:</div>
					<input type="text" id="cvDataEditorPhone2" value="" />
				</div>

				<div class="field clearfix">
					<div class="label">Horario Desde:</div>
					<input type="text" id="cvDataEditorContactFrom2" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Hasta:</div>
					<input type="text" id="cvDataEditorContactTo2" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Nacionalidad:</div>
					<input type="text" id="cvDataEditorNationality" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Twitter:</div>
					<input type="text" id="cvDataEditorTwitter" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">GTalk:</div>
					<input type="text" id="cvDataEditorGTalk" value="" />
				</div>

				<div class="field clearfix">
					<div class="label">SMS:</div>
					<input type="text" id="cvDataEditorSMS" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">SMS:</div>
					<input type="text" id="cvDataEditorSMS" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Sueldo Pretnd.:</div>
					<input type="text" id="cvDataEditorDesiredSalary" value="" />
				</div>
			</div>
			<input type="submit" value="Guardar" class="sendButton" />
		</div>
	</div>
</td></tr>
</table>
</div>


<div class="popup" id="hardPropertiesPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Características Duras </div>
		<a href="javascript:;" class="closePopUp">Cerrar</a>
		<div class="inside">
			<h4>Industrias</h4>
			<div class="clearfix">
				<select id="availableIndustriesSelect">
					<?php foreach ($industriasDisponibles as $id => $industria){ ?>
						<option value="<?php echo $id; ?>"><?php echo $industria;?></option> 
					<?php } ?>
				</select>

				<a href="javascript:addIndustry();"> + Agregar</a>
			</div>

			<ul id="editItemIndustryList">
			<?php foreach ($habilidadesIndustriasDelCV as $habilidad){ ?>
				<li id="editItemIndustry<?php echo $habilidad->idIndustria ?>" class="industryItem">
					<div class="field">
						<div class="label"><?php echo $habilidad->descripcionIndustria ?>:</div> 
						<input type="text" class="pointsInput" value="<?php echo $habilidad->puntos ?>"/>
						<a href="javascript:removeIndustry(<?php echo $habilidad->idIndustria ?>);">X</a>
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
				<a href="javascript:addTool();"> + Agregar</a>
			</div>
			
			<ul id="editItemToolList">
			<?php foreach ($habilidadesAreasDelCV as $habilidad){ ?>
				<li id="editItemTool<?php echo $habilidad->idHerramienta ?>" area="<?php echo $habilidad->idArea ?>" class="toolItem">
					<div class="field">
						<div class="label">
							<?php echo $habilidad->descripcionArea ?> - <?php echo $habilidad->descripcionHerramienta ?>: 
						</div>
		        		<input type="text" class="pointsInput" value="<?php echo $habilidad->puntos ?>"/>
						<a href="javascript:removeTool(<?php echo $habilidad->idHerramienta ?>);">X</a>
					</div>
				</li>
			<?php } ?>
			</ul>
			<input type="submit" value="Guardar" class="sendButton"/>
		</div>
	</div>
</td></tr>
</table>
</div>

<div class="popup" id="workExperiencePopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Experiencia Laboral </div>
		<a href="javascript:;" class="closePopUp">Cerrar</a>
		<div class="inside">
			<div>	
				<input id="workExperienceEditorId" type="hidden" value="" name="" />
				
				<div class="field clearfix">
					<div class="label">Titulo:</div>
					<input type="text" id="workExperienceEditorTitle" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Empresa:</div>
					<input type="text" id="workExperienceEditorCompany" value="" />
				</div>

				<div class="field clearfix">
					<div class="label">Industria:</div>
					<select id="workExperienceEditorIndustry">
					   <?php foreach ($industriasDisponibles as $id => $unaIndustria){?>
					   			<option value="<?php echo $id?>">
									<?php echo $unaIndustria?>
								</option> 
					   <?php } ?>
					</select>
				</div>
				
				<div class="field clearfix">
					<div class="label">Pais:</div>
					<select id="workExperienceEditorCountry"> 
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
				

				<div class="field clearfix">
					<div class="label">Fecha Desde:</div>
					<input type="text" id="workExperienceEditorDateFrom" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Fecha Hasta:</div>
					<input type="text" id="workExperienceEditorDateTo" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Logro:</div>
					<input type="text" id="workExperienceEditorGoal" value="" />
				</div>

				<div class="field clearfix">
					<div class="label">Descripcion:</div>
					<textarea id="workExperienceEditorDescription"></textarea>
				</div>
			</div>
			<input type="submit" value="Guardar" class="sendButton" />
		</div>
	</div>
</td></tr>
</table>
</div>


<div class="popup" id="formalEducationPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Educación Formal </div>
			<a href="javascript:;" class="closePopUp">Cerrar</a>
			<div class="inside">
				<div>	
					<input id="formalEducationEditorId" type="hidden" value="" name="" />
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
					</div>
	
					<div class="field clearfix">
						<div class="label">Otra:</div>
						<input type="text" id="formalEducationEditorInstitutionDescription" disabled="disabled"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Titulo:</div>
						<input type="text" id="formalEducationEditorTitle"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Nivel:</div>
						<select id="formalEducationEditorEducationLevel">
						   <?php foreach ($nivelesDeEducacion as $id => $desc){ ?>
						   			<option value="<?php echo $id;?>">
										<?php echo $desc;?>
									</option> 
						   <?php } ?>
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
					</div>
	
					<div class="field clearfix">
						<div class="label">Estado:</div>
						<select id="formalEducationEditorStatus">
				   			<option value="T">Terminado</option> 
				   			<option value="A">Abandonado</option> 
				   			<option value="C">En Curso</option> 
						</select>
					</div>
	
					<div class="field clearfix">
						<div class="label">Desde:</div>
						<input type="text" id="formalEducationEditorDateFrom"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Hasta:</div>
						<input type="text" id="formalEducationEditorDateTo"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Promedio:</div>
						<input type="text" id="formalEducationEditorAverage"/>
					</div>

				</div>
				<input type="submit" value="Guardar" class="sendButton" />
			</div>
		</div>
	</td></tr>
	</table>
</div>

<div class="popup" id="informalEducationPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Educación Informal </div>
			<a href="javascript:;" class="closePopUp">Cerrar</a>
			<div class="inside">
				<div>	
					<input id="informalEducationEditorId" type="hidden" value="" name="" />
					
					
					<div class="field clearfix">
						<div class="label">Descripción:</div>
						<textarea id="informalEducationEditorDescription"></textarea>
					</div>

					<div class="field clearfix">
						<div class="label">Tipo:</div>
						<select id="informalEducationEditorType">
						   <?php foreach ($tiposDeEducacionNoFormal as $id => $desc){ ?>
						   			<option value="<?php echo $id;?>">
										<?php echo $desc;?>
									</option> 
						   <?php } ?>
						</select>
					</div>
	
					<div class="field clearfix">
						<div class="label">Duración:</div>
						<input type="text" id="informalEducationEditorDuration"/>
					</div>
	
				</div>
				<input type="submit" value="Guardar" class="sendButton" />
			</div>
		</div>
	</td></tr>
	</table>
</div>

<?php include("footer.php"); ?>
</body>
</html>

