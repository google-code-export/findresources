<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
    <link rel="StyleSheet" type="text/css" href="<?php echo site_url('css/style.css')?>" />
    <link rel=StyleSheet type="text/css" href="<?php echo site_url('css/global.css')?>"/>
    <script src="<?php echo base_url();?>js/libs/jquery-1.6.2.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo site_url("images/src/favicon.ico")?>" />
    <title>FindResources</title>
	<script type="text/javascript">
		$(function() {
		
			///para el caso de que esta pantalla este en un iframe.
			//se resizea el iframe.
			if(self!=parent){
				var parentIFrame = parent.document.getElementById("candidateReportIframe");
				parentIFrame.height = $("body").css("height");
				
				//get out the border
				$(".body_container").css("border","none");
				
			}; 
		});
	</script>
		    
</head> 
<body> 
<?php 
	if(@$perfil != "empresa"){
		//it is an iframe, no show it.
		include("toolbar.php");
	}
?>

<div class="body_container">

	<h1>Informe de Exámen Psicotécnico</h1>
	<div id="page" style="height:auto;min-height:400px"> 

	<p style="font-size:14px">
	<?php
		if(array_key_exists("0", $informe)) { 
			foreach($informe as $inf) {
			echo "<ul>";
			echo "<li style='list-style-type: none;font-size:16px;font-family:Tahoma;font-weight:bold;margin-left:10px;padding:20px;'>".
					str_replace(".", "<li style='list-style-type: circle;font-size:14px;font-family:Tahoma;margin-left:30px;padding:10px;font-family:Tahoma;'>", @$inf->informe);
				//echo @$inf->informe."<br /><br /><br />";
			echo "</ul>";
			}
		} else {
			echo "Aún no han sido generados informes para este candidato.";
		} 
	?>
	
	</p>
	</div> 
</div>
<div id="test_footer">
<?php 
if(@$perfil != "empresa"){
	//it is an iframe, no show it.
	include("footer.php");	
}
 ?>
</div>
</body>
</html>