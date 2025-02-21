<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>


<?php
$entradas_actual = conseguirRespuesta($db, $_GET['id']);

$entrada_actual = conseguirEntrada($db, $_GET['id']);

if (!isset($entrada_actual['id'])) {
	//header("Location: blog-empleador.php");
}
?>

<?php require_once 'cabecera.php'; ?>
<div class="contenedor">
	<h2>Comentario: <span> <?= $entrada_actual['titulo'] ?></span> </h2>
</div>
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
							<p><strong>Experiencia/Comentario:</strong><?= substr($entrada_actual['descripcion'], 0, 999) . "..." ?></p>
							
						</div>

						<p><strong>Categoría: </strong> <?= $entrada_actual['categoria'] ?></p>
					</div>
				</div>
				<div class="cuarenta">
					<div class="">


						<?php if ($entrada_actual['imagen'] != "images/") : ?>
							<p>
								<strong>Nombre/Titulo del archivo:</strong> <?= $entrada_actual['producto'] ?>
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
	
	<!--Botones editar y eliminar-->
	<div class="contenedor centrar-texto">
		<?php if (isset($_SESSION["usuario"]) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']) : ?>
			<!--Botones Editar y Eliminar-->

			<a href="editar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="boton-negro "><i class="far fa-edit" style="margin-right: 1rem; color: orange;"></i>Editar </a>
			<a href="borrar-entrada.php?id=<?= $entrada_actual['id'] ?>" class="boton-negro"><i class="far fa-times-circle" style="margin-right: 1rem; color: red;"></i>Eliminar</a>
		<?php endif; ?>
		<div class="separador"></div>
	</div>
</article>
<!--Final Entrada-->


<!--/////////////////////////////SECCION RESPUESTAS////////////////////////////-->
<div class=""></div>
<?php if (isset($_SESSION['usuario'])) : ?>
	<!--Principio Session-->

	<div class=" contenedor centrar-texto">
		<form action="guardar-entrada2.php" method="POST" enctype="multipart/form-data">

			<!--Hidden  del ID-->
			<input type="hidden" name="respuesta_id" value="<?= $entrada_actual['id'] ?>">
			<input type="hidden" name="confirmar_id" value="<?= $entrada_actual['id'] ?>">

			<!--Hiden del Nombre del Arrendador-->
			<input type="hidden" name="titulo" value=" <?= $entrada_actual['titulo'] ?>" />

			<!--Categoria de la entrada-->
			<input type="hidden" name="categoria" value="<?= $entrada_actual['categoria'] ?>">


			<!--Redactar Experiencia-->
			<textarea name="descripcion" placeholder="Llena este campo con tu respuesta"></textarea>
			<br>
			<input type="submit" onclick='alert("Clic en aceptar para continuar")' value="Responder" />
		</form>
		<?php borrarErrores(); ?>
	</div>


	<!--Principio Entrada Respuesta-->

	<!--/////////////////////////////PRIMER RESPUESTA////////////////////////////-->

	<?php
	$entradas = conseguirEntradas1($db, $_GET['id']);
	while ($entrada1 = mysqli_fetch_array($entradas)) :
		if ($entrada_actual['id'] == $entrada1['respuesta_id']) :
	?>
			<div class="borde-abajo"></div>
			<div class="contenedor centrar-texto bordes">
				<div class="dividir">
					<div class="dos-partes">
						<!--Respuesta de:-->
						<p>Fecha: <em><?= $entrada1['fecha'] ?></em></p>
					</div>
					<div class="dos-partes">
						<p> Respuesta de: <span style="color: var(--azul-fuerte)"><?= $entrada1['usuario'] ?></span> </p>
					</div>
				</div>
				<!--Experiencia-->
				<p>
					Respuesta:
					<span> <?= substr($entrada1['descripcion'], 0, 1000) . "..." ?></span>
				</p>
			</div>



			<!--/////////////////////////////FORMULARIO DE LA RESPUESTA////////////////////////////-->


			</a>


			<!--Introducción a datos-->

		<?php endif; ?>
	<?php endwhile; ?>


<?php endif; ?>

<div class="separador"></div>



<?php require_once 'footer.php'; ?>