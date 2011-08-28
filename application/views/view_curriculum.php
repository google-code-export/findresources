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
<script type="text/javascript" src="<?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src="<?php echo site_url('js/json2.js')?>"></script>
<script type="text/javascript">
function showPopUp()
{
	$('.opacity').show().animate({opacity:'0.7'},500);
	$('.popup').show().animate({opacity:'1'},500);
}

function hidePopUp()
{
	$('.opacity').animate({opacity:'0'},500,function(){$(this).hide()});
	$('.popup').animate({opacity:'0'},500,function(){$(this).hide()});
}

$(function(){
	
	$('.popup .closePopUp').click(function(){
		hidePopUp();
	});
	
	$('.editFields').click(function(){
		showPopUp();
	});

	$('#cvEditorButton').click(function(){

		var curriculum = {
			'usuario':"unmail@unserver.com",
			'estadoCivil':0,
			'fechaNacimiento':"15/05/1966",
			'idPais':'ARG',
			'idProvincia':0,
			'partido':"Ramos Mejia",
			'calle':"Calle Falsa",
			'numero':"2222",
			'piso':"3",
			'departamento':"A",
			'codigoPostal':"CWI1417C",
			'telefono1':$('#telefono1').val(),
			'horarioContactoDesde1':"9",
			'horarioContactoHasta1':"18",
			'telefono2':"4554-1235",
			'horarioContactoDesde2':"",
			'horarioContactoHasta2':"",
			'idPaisNacionalidad':'ARG',
			gtalk:  $('#gtalk').val(),
			'twitter': "@twitteruser",
			'sms': "15-3838-4994"
		};
		
		$.post("curriculum/setCurriculum", {
				'curriculum': JSON.stringify(curriculum)
			},
		function(response){
			debugger;
			//response == 0 is ok
		},
		"json");
		
	});
	
	$('#getProvincias').click(function(){
		$.post("curriculum/getProvincias", {
			'idPais': 0
		},
		function(provincias){
			debugger;
			alert(provincias[0].descripcion);
		},
		"json");
	});

	$('#setHabilidades').click(function(){
		var habilidadesIndustrias = [
			{
				idIndustria: 1, 
				puntos: 5
			},
			{
				idIndustria: 2, 
				puntos: 5
			},
			{
				idIndustria: 3, 
				puntos: 5
			},
		];
	
		var habilidadesAreas = [
			  {
				idArea: 0, 
				idHerramienta: 0, 
				puntos: 3
			 },
			  {
				idArea: 1, 
				idHerramienta: 3, 
				puntos: 3
			 },
			 {
				idArea: 0, 
				idHerramienta: 2, 
				puntos: 3
			 },
		];

		$.post("curriculum/setHabilidadesDelCV", {
			'habilidadesIndustrias': JSON.stringify(habilidadesIndustrias),
			'habilidadesAreas': JSON.stringify(habilidadesAreas)
			},
			function(data){
				debugger;
			},
			"json"
		);

	});
	
	$('#setExperienciaLaboral').click(function(){
		var experienciaLaboral = {
				id: null, // null = nuevo
				compania: "una compania", 
				idIndustria: 1, 
				idPais: "ARG", 
				fechaDesde: "05/03/1984", 
				fechaHasta: "06/06/1986", 
				logro: "nos hicimos ricos, muy ricos."
		};
		
		$.post("curriculum/setExperienciaLaboral", {
			'experienciaLaboral': JSON.stringify(experienciaLaboral)
		},
		function(data){
			debugger;
		},
		"json");
	});
	
	$('#getHerramientasPorArea').click(function(){

		$.post("util/getHerramientasPorArea", {
			'idArea': '1'
		},
		function(data){
			console.log(data);
		},
		"json");
	});
	
	return false;
});
</script>
</head>
<body>

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
					<h3><?php echo $usuarioData->nombre ?> <?php echo $usuarioData->apellido ?><a href="javascript:;" class="editFields">Edit</a></h3>
					<p>Java developer at Network Solutions</p>
					<p class="grey"><span class="country"><?php echo $usuarioData->descripcionPais ?></span><i>|</i><span class="title">Information Technology and Services</span></p>
				</div>
			</div>
			
			<div class="block">
				<h2>Caracterisiticas Duras <a href="javascript:;" class="editFields">Edit</a></h2>
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
			
			<div class="block">
				<h2>Experiencia Laboral <a class="addpos" href="#">+ <b>Add</b> a position</a></h2>
				<?php foreach ($experienciaLaboralDelCv as $experiencia){ ?>
				<div class="job">
					<h5>Java Developer <a href="javascript:;" class="editFields">Edit</a></h5>
					<p class="company"><?php echo $experiencia->compania ?></p>
					
					<p class="industry"><?php echo $experiencia->idIndustria ?></p>
					
					<p class="when"><?php echo $experiencia->fechaDesde ?> – <?php echo $experiencia->fechaHasta ?></p>
					
					<p class="text"><?php echo $experiencia->logro ?></p>
					
					<p class="recommendations">No recommendations for this position<a href="#">Ask for a recommendation</a></p>
				</div>
				<?php } ?>
			</div>
			
			<div class="block">
				<h2>Educaci&oacute;n Formal <a class="addpos" href="#">+ <b>Add</b> a school</a></h2>
				<div class="study">
					<h5>Universidad Tecnológica Nacional <a href="javascript:;" class="editFields">Edit</a></h5>
					<p class="type">Engineering, Tecnology (on course)</p>
					<p class="when">2002 – 2012 (expected)</p>
					<p class="text">
					University:<br />
					5th. year on course of the career Information System Engineer
					26 subjects passed of 40 with an average 6.33
					</p>
					<p class="addActivity">You can <a href="#">add activities and societies</a> you participated in at this school.</p>
					<p class="recommendations">No recommendations for this position<a href="#">Ask for a recommendation</a></p>
				</div>
			</div>
			
		</div>
	
	</div>
	<!-- end CONTENT -->
	
	<!-- FOOTER -->
	<div class="ft">
		
	</div>
	<!-- end FOOTER -->
	
</div>

<?php 
	var_dump($usuarioData);
	echo $curriculumData->id;
	echo '<br/>';
	echo $curriculumData->usuario;
	echo '<br/>';
	foreach ($estadosCiviles as $unEstadoCivil){
		if($unEstadoCivil->id == $curriculumData->estadoCivil){
			echo $unEstadoCivil->descripcion;
		}
	}
	echo '<br/>';
	echo $curriculumData->fechaNacimiento;
	echo '<br/>';
	echo $curriculumData->idPais;
	echo '<br/>';
	echo $curriculumData->idProvincia;
	echo '<br/>';
	echo $curriculumData->partido;
	echo '<br/>';
	echo $curriculumData->calle;
	echo '<br/>';
	echo $curriculumData->numero;
	echo '<br/>';
	echo $curriculumData->piso;
	echo '<br/>';
	echo $curriculumData->departamento;
	echo '<br/>';
	echo $curriculumData->codigoPostal;
	echo '<br/>';
	echo $curriculumData->telefono1;
	echo '<br/>';
	echo $curriculumData->horarioContactoDesde1;
	echo '<br/>';
	echo $curriculumData->horarioContactoHasta1;
	echo '<br/>';
	echo $curriculumData->telefono2;
	echo '<br/>';
	echo $curriculumData->horarioContactoDesde2;
	echo '<br/>';
	echo $curriculumData->horarioContactoHasta2;
	echo '<br/>';
	echo $curriculumData->idPaisNacionalidad;
	echo '<br/>';
	echo $curriculumData->twitter;
	echo '<br/>';
	echo $curriculumData->gtalk;
	echo '<br/>';
	echo $curriculumData->sms;
	echo '<br/>';
?>

	<H1>EXPERIENCIA LABORAL DEL CV</H1>
<?php 
	foreach ($experienciaLaboralDelCv as $experiencia){
		echo $experiencia->id . ' ' . $experiencia->compania . ' ' . $experiencia->idIndustria . ' ' . $experiencia->idPais . ' ' .  $experiencia->fechaDesde . ' ' .  $experiencia->fechaHasta . ' ' .  $experiencia->logro;
	}
?>

	<H1>EDUCACION FORMAL DEL CV</H1>
<?php 
	var_dump($educacionFormalDelCv);
?>

	<H1>EDUCACION NO FORMAL DEL CV</H1>
<?php 
	var_dump($educacionNoFormalDelCv);
?>

	<H1>ESTADOS CIVILES DISPONIBLES</H1>
<?php 
	function imprimirArrayConDescripciones($array){
		foreach ($array as $item){
			echo $item->id . ' ';
			echo $item->descripcion;
			echo '<br/>';
		}
		
	}
	imprimirArrayConDescripciones($estadosCiviles);
?>

	<H1>PAISES</H1>
<?php 
	imprimirArrayConDescripciones($paises);
?>
	<H1>INDUSTRIAS DISPONIBLES</H1>
<?php 
	imprimirArrayConDescripciones($industriasDisponibles);
?>

	<H1>NIVELES DE EDUCACION DISPONIBLES</H1>
<?php 
	imprimirArrayConDescripciones($nivelesDeEducacion);
?>

	<H1>ENTIDADES EDUCATIVAS DIPONIBLES </H1>
<?php 
	imprimirArrayConDescripciones($entidadesEducativas);
?>

<H1>AREAS DISPONIBLES </H1>
<?php 
	imprimirArrayConDescripciones($areasDisponibles);
?>

<H1>TIPOS DE EDUCACION NO FORMAL </H1>
<?php 
	imprimirArrayConDescripciones($tiposDeEducacionNoFormal);
?>

<div id="cvEditorForm">
	<div>
		<label>gtalk:</label>
		<input type="text" id="gtalk" name="ngtalk" />
		<br />
		<label>telefono1:</label>
		<input type="text" id="telefono1" name="ntelefono1" />
	</div>
	<input type="submit" value="actualizate" id="cvEditorButton"  />
	<input type="submit" value="GET_PROVINCIAS" id="getProvincias"  />
	<input type="submit" value="SET_HABILIDADES" id="setHabilidades"  />
	<input type="submit" value="SET_EXPERIENCIA_LABORAL" id="setExperienciaLaboral"  />
	<input type="submit" value="getHerramientasPorArea" id="getHerramientasPorArea"  />
</div>

<div class="opacity" style="display:none;"></div>
<div class="popup" style="display:none;">
<table cellspacing="0" cellpadding="0" align="center">
<tr><td>
	<div class="in">
		<a href="javascript:;" class="closePopUp">Close</a>
		
	</div>
</td></tr>
</table>
</div

</body>
</html>

