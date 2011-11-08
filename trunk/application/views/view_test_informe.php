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

	<div class='header-block'>Informe de Exámen Psicotécnico</div><br /><br />
	<div id="page" style="height:auto;min-height:400px"> 


	<?php
		$i=0;
		if(array_key_exists("0", $informe)) { 
			foreach($informe as $inf) {
			//echo @$inf->informe."<br />--<br /><br />";
			if($i == 0) {
				echo "<b style='font-size:14px'>".@$inf->informe."</b>";
				$photo_filename = "/images/cv/".md5($usuarioData->id).".jpg";
				$photo_filename = (!file_exists($_SERVER['DOCUMENT_ROOT'].$photo_filename))? "/images/cv/default.jpg":$photo_filename;
				?>
				<div style="float:right; width:190px;"><br />
				<img src="<?php echo $photo_filename;?>" alt="Foto" style="padding:5px;background:#FFF;border: .1em solid black; width:150px;"/>
				</div>
				<?php
				echo "<ul>"; 
			} else{ 
				echo str_replace(".", "<li class='informe'>", @$inf->informe);
			}
			$i++;
			}
			echo "</ul>"; 
		} else {
			echo "Aún no han sido generados informes para este candidato.";
		} 
	?>
	

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