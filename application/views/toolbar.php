<?php 
/**
 * Este archivo dibuja la toolbar de los usuarios.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$usuarioData
 * */
?>
<script type="text/javascript">
	function logout (){
		$.ajax({
		      url: "home/doLogout",
		      global: false,
		      type: "POST",
		      async:true,
		      success: function(response){
					window.location="login";
			  },
			  error: function(response){
					alert(response);
			  }
	    });
	}

	
</script>

<?php 	
	switch ($usuarioData->idTipoUsuario) {
		case "C": //CANDIDATO
?>
	<a href="home">HOME</a> - <a href="curriculum"> CURRICULUM </a> - DATOS PERSONALES - <a href="test_luscher"> COMPLETAR TEST PSICOTECNICO </a> -  <a href="javascript:logout()"> LOG OUT </a>
	

<?php 	
        break;
	    case "E": //EMPRESA
?>

	HOME - TICKETS - BUSQUEDAS - DATOS DE LA EMPRESA

<?php 
        break;
	    case "P": //EXPERTO

?>
	HOME - Feedback Test  - Feedback Informe Final

<?php 
        break;
	    case "A": //ADMINISTRADOR

?>
	HOME - Alta de Usuario Experto
<?php 
		break;
    	default:
?>
			ERROR EN TIPO DE USUARIO.
<?php 
		break;

	} //end switch
		
?>
