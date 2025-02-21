<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php
$entrada_actual = conseguirEntrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {
	header("Location: blog-empleador.php");
}
?>
<?php require_once 'cabecera.php'; ?>
<div class="contenedor-entrada">
	<div class=" centrar-texto">
		<!--INICIO DE ENTRADA FINAL-->
		<p>Confirme, edite o elimine el comentario</p>
		<!--Botonera-->
		<?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
			<div class="contenedor centrar-texto">
				<!--Botones Editar y Eliminar-->
				<a href="editar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="boton-largo "><i class="far fa-edit" style="margin-right: 1rem; color: orange;"></i>Editar </a>
				<a href="borrar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="boton-largo "><i class="far fa-times-circle" style="margin-right: 1rem; color: red;"></i>Eliminar</a>
				<a href="./blog.php" class="boton-largo confirmar"><i class="far fa-check-circle" style="margin-right: 1rem; color: green;"></i> Confirmar </a>
			</div>
		<?php endif; ?>
	</div>
	<div class="separador"></div>
	<!--Introducción a datos-->
	<article class="contenedor">
		<div class="salida-formulario">
			<div class="dividir centrar-texto">
				<p><strong>Estafador/Fraudolento: </strong> <?= $entrada_actual['titulo'] ?></p>
				<p><strong>Fecha que se cometió la estafa: </strong> <?= $entrada_actual['fecha_estafa'] ?></p>
				<p><strong>Dirección donde se cometió la estafa:</strong> <?= $entrada_actual['direccion_estafa'] ?></p>
				<div class="contenedor">
					<div class="borde-abajo"></div>
				</div>

			</div>
			<div class="dividir">
				<div class="sesenta">
					<div class="">
						<p><strong>Tipo de estafa: </strong> <?= $entrada_actual['tipo_estafa'] ?> . <?= $entrada_actual['other_estafa'] ?> </p>
						<p><strong>Medio donde se realizo la estafa: </strong> <?= $entrada_actual['medio_estafa'] ?></p>
						<p><strong>Se realizo algún proceso legal: </strong> <?= $entrada_actual['demanda'] ?> </p>
						<div class="salida-formulario">
							<p><strong>Experiencia/Comentario:</strong></p>
							<?= $entrada_actual['descripcion'] ?>
						</div>

						<p><strong>Categoría: </strong> <?= $entrada_actual['categoria'] ?></p>
					</div>
				</div>
				<div class="cuarenta">
					<div class="">


						<?php if ($entrada_actual['imagen'] != "images/") : ?>
							<p>
							<strong>Nombre/Titulo del archivo:</strong>	 <?= $entrada_actual['producto'] ?>
						</p>
							<div class="contenedor-img centrar-texto">
								<img src="<?= $entrada_actual['imagen'] ?>" alt="">
								<br>
								<a class="enlaces" href="<?= $entrada_actual['imagen'] ?>"> <span>Enlace para visualizar archivo</span> </a>
							</div>


						<?php else : ?>
							<p style="font-size: small; color: var(--naranja); margin: 0;">No existen archivos ni imágenes anexados en esta entrada</p>
						<?php endif; ?>
					</div>

				</div>
			</div>

		</div>

	</article>
	<?php if (!isset($_SESSION['usuario'])) : ?>
		<div class="centrar-texto">
			<p>Si deseas responder este comentario primero deberás iniciar sesión</p>
			<a class="boton" href="./iniciar-sesion.php">Iniciar Sesión</a>
		</div>
	<?php endif; ?>


</div>
<div class="separador"></div>

<?php require_once 'footer.php'; ?>