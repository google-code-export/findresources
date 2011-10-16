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
	<div id="toolbar_session">
		<div id="toolbar_fr_lenguage">
			<?php if(isset($_SESSION[SESSION_ID_USUARIO])){
				echo $_SESSION[SESSION_ID_USUARIO];
			}else {
				echo "NO LOGUEADO";
			}?>
		</div>
		<div id="toolbar_logout">
			<a href="javascript:logout()"> logout </a>		
		</div>
	</div>
</div>


