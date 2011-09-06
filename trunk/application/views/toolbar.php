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
<link rel=StyleSheet href="css/toolbar.css"/>

<div id="toolbar_header">
	<a id="toolbar_fr_logo" href="home"></a>
	<div id="toolbar_fr_company">
    	<div id="toolbar_fr_company_name">find resources</div>
        <div id="toolbar_fr_company_slogan">Donde encontrás el trabajo que te gusta </div>
	</div>
	<div id="toolbar_session">
		<div id="toolbar_fr_lenguage">
			English / Español
		</div>
		<div id="toolbar_logout">
			<a href="javascript:logout()"> logout </a>		
		</div>
	</div>
</div>


