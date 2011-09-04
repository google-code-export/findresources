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
<link rel="stylesheet" type="text/css" href="<?php echo site_url('css/view_curriculum.css')?>" />
<script type="text/javascript">
	var availableIndustries = new Array();
	<?php foreach ($industriasDisponibles as  $id => $industria){ ?>
		availableIndustries[<?php echo $id; ?>] = "<?php echo $industria;?>";
	<?php } ?>

	var availableAreas = new Array();
	<?php foreach ($areasDisponibles as $id => $area){ ?>
		availableAreas[<?php echo $id; ?>] = "<?php echo $area;?>";
	<?php } ?>

	var availableTools = new Array(); //fill in $('#availableAreasSelect').change();	

	var availableCountries = new Array();
	<?php foreach ($paises as $id => $pais){ ?>
		availableCountries["<?php echo $id; ?>"] = "<?php echo $pais;?>";
	<?php } ?>

	var workExperiences = new Array();
	<?php foreach ($experienciaLaboralDelCv as $id => $experiencia){ ?>
		workExperiences[<?php echo $id; ?>] = {
				company:  "<?php echo $experiencia->compania;?>",
				idIndustry: "<?php echo $experiencia->idIndustria;?>",
				idCountry:  "<?php echo $experiencia->idPais;?>",
				dateFrom:  "<?php echo $experiencia->fechaDesde;?>",
				dateTo:  "<?php echo $experiencia->fechaHasta;?>",
				goal:  "<?php echo $experiencia->logro;?>",
				description:  "<?php echo $experiencia->descripcion;?>",
				title:  "<?php echo $experiencia->titulo;?>"
		};
	<?php } ?>

	var formalEducation = new Array();
	<?php foreach ($educacionFormalDelCv as $id => $educacion){ ?>
		formalEducation[<?php echo $id; ?>] = {
				idInstitution:  "<?php echo $educacion->idEntidad;?>",
				descriptionInstitution: "<?php echo $educacion->descripcionEntidad;?>",
				title:  "<?php echo $educacion->titulo;?>",
				idEducationLevel:  "<?php echo $educacion->idNivelEducacion;?>",
				idArea:  "<?php echo $educacion->idArea;?>",
				status:  "<?php echo $educacion->estado;?>",
				dateFrom:  "<?php echo $educacion->fechaInicio;?>",
				dateTo:  "<?php echo $educacion->fechaFinalizacion;?>",
				average:  "<?php echo $educacion->promedio;?>"
		};
	<?php } ?>
	
	var informalEducation = new Array();
	<?php foreach ($educacionNoFormalDelCv as $id => $educacion){ ?>
		formalEducation[<?php echo $id; ?>] = {
				idType:  "<?php echo $educacion->idTipoEducacionNoFormal;?>",
				description: "<?php echo $educacion->descripcion;?>",
				duration:  "<?php echo $educacion->duracion;?>"
		};
	<?php } ?>

	var educationAvailableAreas = new Array();
	<?php foreach ($areasDisponibles as $id => $desc){ ?>
		educationAvailableAreas[<?php echo $id; ?>] = "<?php echo $desc?>";
	<?php } ?>

	
	var educationAvailableLevels = new Array();
	<?php foreach ($nivelesDeEducacion as $id => $desc){ ?>
		educationAvailableLevels[<?php echo $id; ?>] = "<?php echo $desc?>";
	<?php } ?>

	var educationAvailableInstitutions = new Array();
	<?php foreach ($entidadesEducativas as $id => $desc){ ?>
		educationAvailableInstitutions[<?php echo $id; ?>] = "<?php echo $desc?>";
	<?php } ?>

	
	var informalEducationTypes = new Array();
	<?php foreach ($tiposDeEducacionNoFormal as $id => $type){ ?>
		informalEducationTypes[<?php echo $id; ?>] = "<?php echo $type;?>";
	<?php } ?>
	
	
</script>
<script type="text/javascript" src="<?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/json2.js')?>"></script>
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
			
			<div class="info clearfix">
				<div class="photo">
					<img src="img/face.jpg" alt="Nombre" />
				</div>
				<div class="right">
					<h3><?php echo $usuarioData->nombre; ?> <?php echo $usuarioData->apellido; ?><a href="javascript:;" class="editFields">Edit</a></h3>
					<p>Java developer at Network Solutions</p>
					<p class="grey"><span class="country"><?php echo $usuarioData->descripcionPais; ?></span><i>|</i><span class="title">Information Technology and Services</span></p>
				</div>
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
				
					<h5><?php echo $experiencia->titulo ?> <a href="javascript:editWorkExperience(<?php echo $i ?>);" class="editFields">Editar</a></h5>
					
					<p class="company"><?php echo $experiencia->compania ?></p>
					<p class="industry">Industria: <?php echo $industriasDisponibles[$experiencia->idIndustria] ?></p>
					<p class="country"><?php echo $paises[$experiencia->idPais] ?></p>
					<p class="when"><span class="dateFrom"><?php echo $experiencia->fechaDesde ?></span> – <span class="dateTo"><?php echo $experiencia->fechaHasta ?></span></p>
					<p class="logro"><?php echo $experiencia->logro ?></p>
					<p class="descripcion"><?php echo $experiencia->descripcion ?></p>
					
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
				<h2>Educaci&oacute;n No Formal <a class="addpos" href="#">+ <b>Agregar</b> educación</a></h2>
				
				<?php foreach ($educacionNoFormalDelCv as $educacion){ ?>
				
				<div class="study">
					<h5><?php echo $educacion->descripcion?> <a href="javascript:<?php echo $educacion->id?>;" class="editFields">Edit</a></h5>
					<p class="type"><?php echo $educacion->idTipoEducacionNoFormal?> </p>
					<p class="when">Duracion: <?php echo $educacion->duracion?> </p>
				</div>
				
				<?php } ?>
			</div>
		</div>
	
	</div>
	<!-- end CONTENT -->
	
	<!-- FOOTER -->
	<div class="ft">
		
	</div>
	<!-- end FOOTER -->
	
</div>

<div class="opacity" style="display:none;"></div>

<div class="popup" id="hardPropertiesPopUp" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<a href="javascript:;" class="closePopUp">Close</a>
		
		<div class="inside">
			<h4>Industrias</h4>
			<div>
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
					<?php echo $habilidad->descripcionIndustria ?>: 
					<input type="text" class="pointsInput" value="<?php echo $habilidad->puntos ?>"/>
					<a href="javascript:removeIndustry(<?php echo $habilidad->idIndustria ?>);">X</a>
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
					<?php echo $habilidad->descripcionArea ?> - <?php echo $habilidad->descripcionHerramienta ?>: 
	        		<input type="text" class="pointsInput" value="<?php echo $habilidad->puntos ?>"/>
					<a href="javascript:removeTool(<?php echo $habilidad->idHerramienta ?>);">X</a>
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
		<a href="javascript:;" class="closePopUp">Close</a>
		<div class="inside">
			<div>	
				<input id="workExperienceEditorId" type="hidden" value="" name="" />
				<label>Titulo:</label>
				<input type="text" id="workExperienceEditorTitle" value="" />
				<br />
				<label>Empresa:</label>
				<input type="text" id="workExperienceEditorCompany" value="" />
				<br />
				<label>Industria:</label>
				<select id="workExperienceEditorIndustry">
				   <?php foreach ($industriasDisponibles as $id => $unaIndustria){?>
				   			<option value="<?php echo $id?>">
								<?php echo $unaIndustria?>
							</option> 
				   <?php } ?>
				</select>
				
				<br />
				<label>Pais:</label>
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
				<br />
				<label>Fecha Desde:</label>
				<input type="text" id="workExperienceEditorDateFrom" value="" />
				<br />
				<label>Fecha Hasta:</label>
				<input type="text" id="workExperienceEditorDateTo" value="" />
				<br />
				<label>Logro:</label>
				<input type="text" id="workExperienceEditorGoal" value="" />
				<br />

				<label>Descripcion:</label>
				<input type="text" id="workExperienceEditorDescription" value="" />
				<br />
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
		<a href="javascript:;" class="closePopUp">Close</a>
		<div class="inside">
			<div>	
				<input id="formalEducationEditorId" type="hidden" value="" name="" />
				<label>Institución:</label>
				<select id="formalEducationEditorInstitution">
				   <option value="">Otra</option>
				   <?php foreach ($entidadesEducativas as $id => $desc){ ?>
				   			<option value="<?php echo $id;?>">
								<?php echo $desc;?>
							</option> 
				   <?php } ?>
				</select>
				<br />

				<label>Otra:</label>
				<input type="text" id="formalEducationEditorInstitutionDescription" disabled="disabled"/>
				<br />

				<label>Titulo:</label>
				<input type="text" id="formalEducationEditorTitle"/>
				<br />

				<label>Nivel:</label>
				<select id="formalEducationEditorEducationLevel">
				   <?php foreach ($nivelesDeEducacion as $id => $desc){ ?>
				   			<option value="<?php echo $id;?>">
								<?php echo $desc;?>
							</option> 
				   <?php } ?>
				</select>
				<br />


				<label>Area:</label>
				<select id="formalEducationEditorArea">
				   <?php foreach ($areasDisponibles as $id => $desc){ ?>
				   			<option value="<?php echo $id;?>">
								<?php echo $desc;?>
							</option> 
				   <?php } ?>
				</select>
				<br />

				<label>Estado:</label>
				<select id="formalEducationEditorStatus">
		   			<option value="T">Terminado</option> 
		   			<option value="A">Abandonado</option> 
		   			<option value="C">En Curso</option> 
				</select>
				<br />

				<label>Desde:</label>
				<input type="text" id="formalEducationEditorDateFrom"/>
				<br />

				<label>Hasta:</label>
				<input type="text" id="formalEducationEditorDateTo"/>
				<br />

				<label>Promedio:</label>
				<input type="text" id="formalEducationEditorAverage"/>
				<br />



			</div>
			<input type="submit" value="Guardar" class="sendButton" />
		</div>
	</div>
</td></tr>
</table>
</div>
</body>
</html>

