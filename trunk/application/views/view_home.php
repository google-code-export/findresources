<?php 
/**
 * Este archivo pertenece a la vista del home.
 * El siguiente php tiene como parametros que recible del controller al cargarse 
 * las siguientes variables>
 * 		$dataUsuario
 * */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
<script type="text/javascript" src=" <?php echo site_url('js/jquery-1.6.2.min.js')?>"></script>
<script type="text/javascript" src=" <?php echo site_url('js/json2.js')?>"></script>

<title>Find Resources</title>

<style type="text/css">

body {
 background-color: #fff;
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
 text-align: center;
}

a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}

h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}

code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}

.company_logo{
}


</style>

<script type="text/javascript">
	$(function(){
		
		$('#desloguear').click(function(){

			$.ajax({
			      url: "home/doLogout",
			      global: false,
			      type: "POST",
			      dataType: "json",
			      async:true,
			      success: function(response){
						window.location="login";
				  },
				  error: function(response){
						alert(response);
				  }
		    });
		});
		
		$('#irACurriculum').click(function(){
			window.location="curriculum";
		});
		
		return false;
	});
	
</script>		

</head>
<body>
<?php include("toolbar.php"); ?>


<h1>Bienvenido a FindResources</h1>
<div class="company_logo">
	<img src="images/argentina_soft_logo.png"/>
</div>

<H1>ESTAS ADENTRO NENE!</H1>
Welcome to the find resources tool
AQUI VAMOS A VER ALGO NOSE QUE.



<p>
	<input type="submit" value="CV" id="irACurriculum"  />
	<input type="submit" value="DESLOGUIAME YA!" id="desloguear"  />
</p>

<?php 
	var_dump($usuarioData);
?>

<?php include("footer.php"); ?>

</body>
</html>