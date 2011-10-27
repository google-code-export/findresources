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

<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/jquery-ui-1.8.16.css')?>" />
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/global.css')?>" />
<link rel=StyleSheet type="text/css" href="<?php echo site_url('css/starrating.css')?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_curriculum.css')?>" />
<link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
<script type="text/javascript">
	var availableIndustries = <?php  echo json_encode_utf8($industriasDisponibles); ?>;

	var availableAreas = <?php  echo json_encode_utf8($areasDisponibles); ?>;

	var availableTools = new Array(); //fill in $('#availableAreasSelect').change();	

	var availableCountries = <?php  echo json_encode_utf8($paises); ?>;

	var workExperiences = <?php  echo json_encode_utf8($experienciaLaboralDelCv); ?>;

	var formalEducation = <?php  echo json_encode_utf8($educacionFormalDelCv); ?>;
	
	var informalEducation = <?php  echo json_encode_utf8($educacionNoFormalDelCv); ?>;

	var educationAvailableAreas = <?php  echo json_encode_utf8($areasDisponibles); ?>;

	var educationAvailableLevels = <?php  echo json_encode_utf8($nivelesDeEducacion); ?>;

	var educationAvailableInstitutions = <?php  echo json_encode_utf8($entidadesEducativas); ?>;
	
	var informalEducationTypes = <?php  echo json_encode_utf8($tiposDeEducacionNoFormal); ?>;

	var cvData = <?php echo json_encode_utf8($curriculumData);?>;
	
</script>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/libs/jquery-ui.min-1.8.16.js')?>"></script>

<script type="text/javascript" src="<?php echo site_url('js/libs/json2.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/starrating.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/utils.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/src/view_curriculum.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/src/hardSkills.js')?>"></script>
<title>FindResources - <?php echo $usuarioData->nombre." ".$usuarioData->apellido;?></title>
</head>
<body>

<?php include("toolbar.php"); ?>

<div class="body_container">
		<h1>Curriculum</h1>	
		<div class="CL">
			<div class="header-block"><?php echo $usuarioData->nombre." ".$usuarioData->apellido;?></div>
			<div class="info clearfix block">
				<div class="photo" ><br />
				<?php 
				$photo_filename = "/images/cv/".md5($usuarioData->id).".jpg";
				$photo_filename = (!file_exists($_SERVER['DOCUMENT_ROOT'].$photo_filename))? "/images/cv/default.jpg":$photo_filename;
				?>
					<img src="<?php echo $photo_filename;?>" alt="Foto"/>
				</div>
				<div class="right">
					<h2>&nbsp;&nbsp;Información Personal <?php if($perfil == "usuario") { ?> <a href="javascript:editCVData();" class="editFields"><img src="/images/src/pencil.gif"/>Editar</a><?php } ?></h2>
					<div class="inblock2">
						<div class="row clearfix">
							<div><?php echo ($curriculumData->estadoCivil == "") ? "" : "<b>Estado civil:</b> ".$estadosCiviles[$curriculumData->estadoCivil]?>&nbsp;</div>
							<div><?php if($curriculumData->fechaNacimiento!="") echo "<b>Fecha de Nac.:</b> ".$curriculumData->fechaNacimiento;?></div>
						</div>
						<div class="row clearfix">
							<!-- div><!--?php echo $curriculumData->partido?></div-->					
							<div><?php if($curriculumData->calle !="") echo "<b>Dirección:</b> ".$curriculumData->calle;?>&nbsp;</div> 
							<div><?php echo $curriculumData->numero?>&nbsp;</div>
							<div><?php if($curriculumData->piso !="") echo $curriculumData->piso."º";?>&nbsp;</div>
							<div><?php echo $curriculumData->departamento;?>&nbsp;</div>
							<div><?php if($curriculumData->codigoPostal != "") echo "(CP:".$curriculumData->codigoPostal.")";?>&nbsp;</div>
						</div>
						<div class="row clearfix">
				
							<div><?php if($curriculumData->idProvincia!= "") echo "<b>Provincia:</b> ".$curriculumData->idProvincia;?>,&nbsp;</div>			
							<div><?php echo ($curriculumData->idPais=="") ? ""  :  $paises[$curriculumData->idPais]?></div>
						</div>
		
						<?php if($curriculumData->telefono1 !=""){?>
							<div class="row clearfix">
								<div><?php echo "<b>Tel:</b> ".$curriculumData->telefono1?>&nbsp;</div>					
								<?php if($curriculumData->horarioContactoDesde1 !=""){?>
									<div><?php echo "de ".$curriculumData->horarioContactoDesde1?>&nbsp;a&nbsp;</div>					
									<div><?php echo $curriculumData->horarioContactoHasta1?></div>					
							<?php } ?>

							</div>
						<?php } ?>
		
						<?php if($curriculumData->telefono2 !=""){?>
							<div class="row clearfix">
								<div><?php echo "<b>Tel. (2) : </b>".$curriculumData->telefono2?>&nbsp;</div>
								<?php if($curriculumData->horarioContactoDesde2 !=""){?>
									<div><?php echo "de ".$curriculumData->horarioContactoDesde2?>&nbsp; a &nbsp;</div>
									<div><?php echo $curriculumData->horarioContactoHasta2?></div>
								<?php } ?>

							</div>
						<?php } ?>
	
						<?php if($curriculumData->idPaisNacionalidad !=""){?>
							<div><?php echo "<b>Nacionalidad:</b> ".$paises[$curriculumData->idPaisNacionalidad];?></div>
						<?php } ?>
						
						<div><?php if($curriculumData->gtalk != "") echo "<b>Gtalk:</b> ".$curriculumData->gtalk;?></div>

						<div><?php if($curriculumData->twitter != "") echo "<b>Twitter:</b> ".$curriculumData->twitter;?></div>
						
						<div><?php if($curriculumData->sms !="") echo "<b>Skype:</b> ".$curriculumData->sms;?></div>

						<?php if($curriculumData->sueldoPretendido !=""){?>
							<div><?php echo "<b>Sueldo pretendido:</b> $".$curriculumData->sueldoPretendido?></div>
						<?php } ?>
					</div>

				</div>
			</div>
			
			<div class="block" id="hardSkills">
				<h2>Conocimientos <?php if($perfil == "usuario") { ?><a href="javascript:editHardSkills();" class="editFields"><img src="/images/src/pencil.gif"/>Editar</a><?php } ?></h2>
				<div class="inblock">
					<h4>Áreas de negocio</h4>
					<ul>
					<?php foreach ($habilidadesIndustriasDelCV as $habilidad){ ?>
						<li class="clearfix">
							<div class="label"> 
								<?php echo $habilidad->descripcionIndustria ?>: 
							</div>						
							
							<div class="starRatingContainer"> 
								<ul class='star-rating'>
									<li class='current-rating' value="<?php echo $habilidad->puntos ?>"></li>
								</ul>
							</div>						
						</li>
					<?php } ?>
					</ul>
				</div>

				<div class="inblock">
					<h4>Herramientas</h4>
					<ul>
					<?php foreach ($habilidadesAreasDelCV as $habilidad){ ?>
						<li class="clearfix">
							<div class="label"> 
								<?php echo $habilidad->descripcionArea ?> - <?php echo $habilidad->descripcionHerramienta ?>: 
							</div>						
							<div class="starRatingContainer"> 
								<ul class='star-rating'>
									<li class='current-rating' value="<?php echo $habilidad->puntos ?>"></li>
								</ul>
							</div>						
						</li>
					<?php } ?>
					</ul>
				</div>
			</div>
			
			<div class="block" id="workExperience">
		
				<h2>Experiencia Laboral <?php if($perfil == "usuario") { ?><a class="addFields" href="javascript:addWorkExperience();"><img src="/images/src/add.png"/> <b>Agregar</b> una posición</a> <?php  } ?></h2>
							
				<?php foreach ($experienciaLaboralDelCv as $i => $experiencia){ ?>

				<div class="job inblock" id="job<?php echo $i ?>">
				
					<h3><?php echo $experiencia->titulo; ?>  
								<?php if($perfil == "usuario") { ?>
								<a href="javascript:editWorkExperience(<?php echo $i ;?>);" class="editFields">
									<img src="/images/src/pencil.gif"/> Editar
								</a> 
								<a href="javascript:eraseWorkExperience(<?php echo $i ;?>);" class="eraseFields">
									<img src="/images/src/delete.png"/> Quitar
								</a>
								<?php } ?>
					</h3>
					
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
				<h2>Educaci&oacute;n Formal <?php if($perfil == "usuario") { ?><a class="addFields" href="javascript:addFormalEducation();"><img src="/images/src/add.png"/> <b>Agregar</b> educación</a><?php } ?></h2>
				
				<?php foreach ($educacionFormalDelCv as $i => $educacion){ ?>
				
				<div class="study inblock">
					<h3><?php echo ($educacion->idEntidad != "")?$entidadesEducativas[$educacion->idEntidad]: $educacion->descripcionEntidad?>
						<?php if($perfil == "usuario") { ?>
						<a href="javascript:editFormalEducation(<?php echo $i ?>);" class="editFields">
							<img src="/images/src/pencil.gif"/>Editar
						</a>
						<a href="javascript:eraseFormalEducation(<?php echo $i ;?>);" class="eraseFields">
							<img src="/images/src/delete.png"/> Quitar
						</a>
						<?php } ?>
					</h3>
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
				<h2>Educaci&oacute;n Informal <?php if($perfil == "usuario") { ?><a class="addFields" href="javascript:addInformalEducation();"><img src="/images/src/add.png"/> <b>Agregar</b> educación</a><?php } ?></h2>
				
				<?php foreach ($educacionNoFormalDelCv as $id => $educacion){ ?>
				<div class="study inblock">
					<h3><?php echo $educacion->institucion?> 
						<?php if($perfil == "usuario") { ?>
						<a href="javascript:editInformalEducation(<?php echo $id?>);" class="editFields">
							<img src="/images/src/pencil.gif"/>Editar
						</a>
						<a href="javascript:eraseInformalEducation(<?php echo $id ;?>);" class="eraseFields">
							<img src="/images/src/delete.png"/> Quitar
						</a>
						<?php } ?>
					</h3>
					<p class="type"><?php echo $educacion->descripcion?> </p>
					<p class="type"><?php echo $tiposDeEducacionNoFormal[$educacion->idTipoEducacionNoFormal];?> </p>
					<p class="when">Duración: <?php echo $educacion->duracion?> </p>
				</div>
				
				<?php } ?>
			</div>
		</div>
</div>


<div class="popup" id="cvDataPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Información Personal </div>
		<a href="javascript:;" class="closePopUp"></a>
		<div class="inside">
			<div>
				<div class="field clearfix">
					<div class="label">Foto:</div>
					<form method="post" enctype="multipart/form-data" action="/curriculum/upload" id="photoupload" target="iframeUpload">
						<input type="file" name="photo" size="20" id="cvDataEditorPhoto" onchange="javascript:upload();"/>
						<input type="hidden" value="<?php echo $usuarioData->id;?>" name="usr" />
						<iframe name="iframeUpload" style="display:none"></iframe>
					</form>
				</div>
				<div class="field clearfix">
					<div class="label">Estado Civil:</div>
					<select id="cvDataEditorMaritalStatus">
						<?php foreach ($estadosCiviles as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>
				<div class="field clearfix">
					<div class="label">Fecha de nacimiento:</div>
					<input class="datepicker" type="text" id="cvDataEditorBirthDay" value="" />
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
					<div class="label">Pais:</div>
					<select id="cvDataEditorCountry">
						<?php foreach ($paises as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
				</div>

				<div class="field clearfix">
					<div class="label">Provincia:</div>

					<select id="cvDataEditorState">
						<?php foreach ($provinciasDisponibles as $id => $desc){ ?>
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
					<select id="cvDataEditorNationality">
						<?php foreach ($paises as $id => $desc){ ?>
							<option value="<?php echo $id; ?>"><?php echo $desc;?></option> 
						<?php } ?>
					</select>
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
					<div class="label">Skype:</div>
					<input type="text" id="cvDataEditorSMS" value="" />
				</div>
				<div class="field clearfix">
					<div class="label">Sueldo Pret.:</div>
					<input type="text" id="cvDataEditorDesiredSalary" value="" />
				</div>
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


<div class="popup" id="hardSkillsPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Conocimientos </div>
		<a href="javascript:;" class="closePopUp"></a>
		<div class="inside">
			<h4>Áreas de negocio</h4>
			<div class="clearfix">
				<select id="availableIndustriesSelect">
					<?php foreach ($industriasDisponibles as $id => $industria){ ?>
						<option value="<?php echo $id; ?>"><?php echo $industria;?></option> 
					<?php } ?>
				</select>

				<?php if($perfil == "usuario") { ?><a href="javascript:addIndustry();"> <img src="/images/src/add.png"/> Agregar</a><?php } ?>
			</div>

			<ul id="editItemIndustryList">
			<?php foreach ($habilidadesIndustriasDelCV as $habilidad){ ?>
				<li id="editItemIndustry<?php echo $habilidad->idIndustria ?>" class="industryItem">
					<div class="field">
					
						<div class="label"><?php echo $habilidad->descripcionIndustria ?>:</div> 
						
						<div class="starRatingContainer"> 
							<ul class='star-rating'>
								<li class='current-rating' value="<?php echo $habilidad->puntos ?>"></li>
								<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->idIndustria ?> .current-rating', 1); return false;" 
							           title='Trainee' class='one-star'>1</a></li>
								<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->idIndustria ?> .current-rating',2); return false;" 
							           title='Junior' class='two-stars'>2</a></li>
								<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->idIndustria ?> .current-rating',3); return false;" 
							           title='Semi senior' class='three-stars'>3</a></li>
								<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->idIndustria ?> .current-rating',4); return false;" 
							           title='Senior' class='four-stars'>4</a></li>
								<li><a href="#" onclick="vote('#editItemIndustry<?php echo $habilidad->idIndustria ?> .current-rating',5); return false;" 
							           title='Experto' class='five-stars'>5</a></li>
							</ul>
						</div>
						<a class="removeSkillLink" href="javascript:removeIndustry(<?php echo $habilidad->idIndustria ?>);"><img src="/images/src/delete.png"></img></a>
					</div>
				</li>
			<?php } ?>
			</ul>
			
			<h4 class="toolsTitle" >Herramientas</h4>
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
				<?php if($perfil == "usuario") { ?><a href="javascript:addTool();"> <img src="/images/src/add.png"/> Agregar</a><?php  } ?>
			</div>
			
			<ul id="editItemToolList">
			<?php foreach ($habilidadesAreasDelCV as $habilidad){ ?>
				<li id="editItemTool<?php echo $habilidad->idHerramienta ?>" area="<?php echo $habilidad->idArea ?>" class="toolItem">
					<div class="field">
						<div class="label">
							<?php echo $habilidad->descripcionArea ?> - <?php echo $habilidad->descripcionHerramienta ?>: 
						</div>
		        		
						<div class="starRatingContainer"> 
							<ul class='star-rating'>
								<li class='current-rating' value="<?php echo $habilidad->puntos ?>"></li>
								<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->idHerramienta ?> .current-rating', 1); return false;" 
							           title='Trainee' class='one-star'>1</a></li>
								<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->idHerramienta ?> .current-rating',2); return false;" 
							           title='Junior' class='two-stars'>2</a></li>
								<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->idHerramienta ?> .current-rating',3); return false;" 
							           title='Semi senior' class='three-stars'>3</a></li>
								<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->idHerramienta ?> .current-rating',4); return false;" 
							           title='Senior' class='four-stars'>4</a></li>
								<li><a href="#" onclick="vote('#editItemTool<?php echo $habilidad->idHerramienta ?> .current-rating',5); return false;" 
							           title='Experto' class='five-stars'>5</a></li>
							</ul>
		        		</div>
		        		
						<a class="removeSkillLink" href="javascript:removeTool(<?php echo $habilidad->idHerramienta ?>);"><img src="/images/src/delete.png"></img></a>
					</div>
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

<div class="popup" id="workExperiencePopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<div class="popuptitle"> Experiencia Laboral </div>
		<a href="javascript:;" class="closePopUp"></a>
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
					<input type="text" class="datepicker" id="workExperienceEditorDateFrom" value="" />
				</div>
				
				<div class="field clearfix">
					<div class="label">Fecha Hasta:</div>
					<input type="text"  class="datepicker" id="workExperienceEditorDateTo" value="" />
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
			<div class="buttonsPopUp">
				<input type="submit" value="Guardar" class="sendButton" />
				<input type="submit" value="Cancelar" class="cancelPopUp" />
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
			<div class="popuptitle"> Educación Formal </div>
			<a href="javascript:;" class="closePopUp"></a>
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
						<div class="label">Área:</div>
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
						<input class="datepicker" type="text" id="formalEducationEditorDateFrom"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Hasta:</div>
						<input class="datepicker" type="text" id="formalEducationEditorDateTo"/>
					</div>
	
					<div class="field clearfix">
						<div class="label">Promedio:</div>
						<input type="text" id="formalEducationEditorAverage"/>
						(Ej: 6,98)
					</div>

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

<div class="popup" id="informalEducationPopUp" style="display:none;">
	<table cellspacing="0" cellpadding="0" align="center">
	<tr><td>
		<div class="in">
			<div class="popuptitle"> Educación Informal </div>
			<a href="javascript:;" class="closePopUp"></a>
			<div class="inside">
				<div>	
					<input id="informalEducationEditorId" type="hidden" value="" name="" />
					
					
					<div class="field clearfix">
						<div class="label">Institución:</div>
						<input type="text" id="informalEducationEditorInstitution"></input>
					</div>
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
				<div class="buttonsPopUp">
					<input type="submit" value="Guardar" class="sendButton" />
					<input type="submit" value="Cancelar" class="cancelPopUp" />
				</div>
			</div>
		</div>
	</td></tr>
	</table>
</div>

<?php include("footer.php"); ?>
</body>
</html>

