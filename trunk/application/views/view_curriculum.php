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
 * */

?>

<!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<body>
<script type="text/javascript" src=" <?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/json2.js')?>"></script>

<script type="text/javascript">
	$(function(){
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
		    	 	idIndustria: 0, 
		    	 	puntos: 3
		    	},
		     	{
		    	 	idIndustria: 1, 
		    	 	puntos: 3
		    	},
		     	{
		    	 	idIndustria: 2, 
		    	 	puntos: 3
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
					idRubro: 1, 
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
		
		
		
		
		
		return false;
	});
</script>

un cv <br/>
<?php 
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
	<H1>HABILIDADES INDUSTRIAS DEL CV</H1>
<?php 
	foreach ($habilidadesIndustriasDelCV as $habilidad){
		echo $habilidad->descripcionIndustria . " puntos-> ". $habilidad->puntos . '<br/>' ;
	}
?>

	<H1>HABILIDADES AREAS DEL CV</H1>
<?php 
	foreach ($habilidadesAreasDelCV as $habilidad){
		echo $habilidad->descripcionArea . " - ". $habilidad->descripcionHerramienta . "puntos-> ". $habilidad->puntos . '<br/>' ;
	}
?>


	<H1>EXPERIENCIA LABORAL DEL CV</H1>
<?php 
	foreach ($experienciaLaboralDelCv as $experiencia){
		echo $experiencia->id . ' ' . $experiencia->compania . ' ' . $experiencia->idRubro . ' ' . $experiencia->idPais . ' ' .  $experiencia->fechaDesde . ' ' .  $experiencia->fechaHasta . ' ' .  $experiencia->logro;
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
</div>

</body>
</html>

