<?php 
/**
 * Este archivo dibuja la toolbar de los usuarios.
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
<link rel=StyleSheet href="<?php echo site_url('css/toolbar.css')?>"/>

<div id="toolbar_header">
	<a id="toolbar_fr_logo" href="<?php echo site_url('home')?>"></a>
	<div id="toolbar_slogan">Donde no encontrás un trabajo, encontrás el tuyo... </div>
	
	<div id="toolbar_session">
		<div id="toolbar_fr_lenguage">
			<?php if(isset($_SESSION[SESSION_ID_USUARIO])){
				echo $_SESSION[SESSION_ID_USUARIO];
			}else {
				echo "";
			}?>
		</div>
		<div id="toolbar_logout">
			<?php if(isset($_SESSION[SESSION_ID_USUARIO]) && $_SESSION[SESSION_ID_USUARIO] != ""){?>
				<a href="javascript:logout()"> cerrar sesión </a>
			<?php }?>
		</div>
	</div>
</div>


