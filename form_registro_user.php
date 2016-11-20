<?php
require_once("clases/class.MasterPage.php");
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuarios</title>
	<meta name="viewport"  content="width=device-width,initial-scale=1"/>
	<link rel="stylesheet" href="css/estilos.css" />
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>
	<?php
		MasterPage::drawHeader();
	?>
	<section id="contenedor">
		<article id="sec-reg-user">
			<fieldset>
				<legend>Registro de Usuarios</legend>
				<form>
					<label>Nombre:</label><br />
					<input type="text" name="txt_nombre" placeholder="inroduce tu nombre" /><br />
					<label>Apellidos:</label><br />
					<input type="text" name="txt_apellidos" placeholder="introduce tus apellidos" /><br />
					<label>RFC:</label><br />
					<input type="text" name="txt_RFC" placeholder="introduce tu rfc" /><br />
					<label>Direccion:</label><br />
					<input type="text" name="txt_Direccion" placeholder="Introduce tu direccion" /><br />
					<label>CP:</label><br />
					<input type="text" name="txt_CP" placeholder="introduce tu cp" /><br />
					<label>Tel:</label><br />
					<input type="text" name="txt_tel" placeholder="introduce tu telefono" /><br />
					<label>Correo:</label><br />
					<input type="mail" name="txt_correo" placeholder="introduce tu correo" /><br />
					<label>Password:</label><br />
					<input type="password" name="txt_pw" placeholder="introduce tu password" /><br />
					<label>Confir. Password:</label><br />
					<input type="password" name="txt_pw2" placeholder="confirma tu password" /><br />
					<input type="button" class="boton" onClick="RegistrarUser()" value="Registrar" />
					<a href="index.php">Accesar</a>
					<div id="div_resp"></div>
				</form>
			</fieldset>
		</article>
	</section>
	<?php
		MasterPage::drawFooter();
	?>
</body>
</html>