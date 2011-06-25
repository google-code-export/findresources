<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
<meta content="text/html; charset=ISO-8859-1" http-equiv="Content-Type"/>
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
</head>
<body>

<h1>Bienvenido a FindResources</h1>
<div class="company_logo">
	<img src="images/argentina_soft_logo.png"/>
</div>

<p>Ingrese nombre de usuario y contraseña.</p>

<p>Para ingresar como candidato: cadidato/candidato.</p>
<p>Para ingresar como empresa: empresa/empresa.</p>
<p>Para ingresar como psicologo: psicologo/psicologo.</p>


<?php echo form_open(base_url() . 'user/login'); ?>
	<div>
		<label>User:</label>
		<?php echo form_input(array('id' => 'username', 'name' => 'username'))?>		
		<p/>
		<label>Pass:</label>
		<?php echo form_password(array('id' => 'password', 'name' => 'password'))?>		
	</div>
	<p/>
	<?php 
	
	if ($this->session->flashdata('login_error'))
	{
		echo 'You entered an incorrect username or password';
	}
	echo validation_errors();?>

	<?php echo form_submit(array('name' => 'submit'), 'Login');?>

<?php echo form_close();?>

</body>
</html>