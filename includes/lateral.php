<!-- BARRA LATERAL -->
<aside class="sidebar seccion-2">
	<!--Boton Buscar-->
	<div id="buscador" class="block-aside">
		<h3 class="centrar-texto">Buscar por Nombre</h3>
		<form action="buscar.php" method="POST">

			<input type="text" name="busqueda" />
			<input type="submit" value="Buscar" />
		</form>
	</div>

	<!--Boton Buscar-->
	<div id="buscador" class="block-aside">
		<h3 class="centrar-texto">Buscar por Domicilio</h3>
		<form action="buscar-domicilio.php" method="POST">

			<input type="text" name="busqueda" />
			<input type="submit" value="Buscar" />
		</form>
	</div>

	<!--Botonera-->
	<?php if (isset($_SESSION['usuario'])) : ?>
		<div id="usuario-logueado" class="block-aside">
			<div class="bienvenida-lateral">
				<h3> <strong>Bienvenido(a)</strong>, <?= $_SESSION['usuario']['nombre'] . ' ' . $_SESSION['usuario']['apellidos']; ?></h3>
				<img src="./img/gato-user.png" alt="">
			</div>
			<!--botones-->
			<div class=" contenedor-botones botones-sesion">
				<ul>
					<li><a href="crear-entradas.php" class=" boton-entrada">Comentar</a></li>

					<li><a href="mis-datos.php" class=" boton-datos">Mis datos</a></li>
					<li><a href="cerrar.php" class="boton-sesion">Cerrar sesión</a></li>
				</ul>
			</div>

		</div>
	<?php endif; ?>

	<!--Inicio de Login and Register-->

	<?php if (!isset($_SESSION['usuario'])) : ?>

		
		<a class="boton-login" href="./iniciar-sesion.php">Iniciar Sesión</a>

		<div class="contenedor-login">
			<div class="block-aside avisos">
				<p class="centrar-texto ">Para comenzar: Primero deberás registrarte y luego iniciar sesión</p>
			</div>
		</div>
		
	

		<div id="register" class="">
		<a class="boton-login" href="./register.php">Registrar</a>
			<?php borrarErrores(); ?>
		</div>
	<?php endif; ?>
</aside>