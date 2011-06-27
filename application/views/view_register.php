<html>
<head>
<title>Formulario de registracion</title>
<style type="text/css">

form li{
	list-style: none;
}

</style>



</head>

<body>
<h1>Registración de usuario</h1>

<p>Porfavor complete los detalles</p>

<?php
	
	echo form_open($base_url . 'user/register');
	
	$username = array(
		'name'	=>	'username',
		'id'	=>	'username',
		'value'	=>	set_value('username')
		
	);

	
	$name = array(
		'name'	=>	'name',
		'id'	=>	'name',
		'value'	=>	set_value('name')
	);
	
	$email = array(
		'name'	=>	'email',
		'id'	=>	'email',
		'value'	=>	set_value('email')
	);
	
	$password = array(
		'name'	=>	'password',
		'id'	=>	'password',
		'value'	=>	set_value('password')
	);

	$password_conf = array(
		'name'	=>	'password_conf',
		'id'	=>	'password_conf',
		'value'	=>	''
	);
	
	
?>

<ul>
	<li>
		<label>Nombre de usuario</label>
		<div>
			<?php echo form_input($username);?>
		</div>
	</li>
	
	<li>
		<label>Nombre completo</label>
		<div>
			<?php echo form_input($name);?>
		</div>
	</li>

	<li>
		<label>Email Address</label>
		<div>
			<?php echo form_input($email);?>
		</div>
	</li>
	
	<li>
		<label>Contraseña</label>
		<div>
			<?php echo form_password($password);?>
		</div>
	</li>

	<li>
		<label>Confirme contraseña</label>
		<div>
			<?php echo form_password($password_conf);?>
		</div>
	</li>
	
	<li>
		<?php echo validation_errors();?>
	</li>
	
	<li>
		<div>
			<?php echo form_submit(array('name' => 'register'), 'Registrarse'); ?>
		</div>
	</li>

</ul>

<?php echo form_close(); ?>

</body>

</html>

