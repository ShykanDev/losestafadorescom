<?php require_once 'cabecera.php'; ?>
<!--INCIO DE LA EXPERIENCIA-->
<!--ELEMENTOS DE LA EXPERIENCIA-->
<?php

$entradas = conseguirEntradas($db, true);
if (!empty($entradas)) :
	$entrada = mysqli_fetch_assoc($entradas);
?>
	<div class="contenedor">
		<h1>Visualicemos como se mostrara su experiencia.</h1>
		<div class="dividir">
			<div class="ochenta">
				<p>Estos son los datos que ha ingresado, para visualizar, editar o eliminar el comentario clic en Pre-visualizar </p>
			</div>
			<div class="veinte centrar-texto alinear-vertical">
				<!--Botonera para enlaces-->
				<a class="boton-negro" href="entrada-final.php?id=<?= $entrada['id'] ?>">Pre-visualizar</a>
			</div>
		</div>
	</div>
	<div class="separador"></div>

	<article class="contenedor">
		<div class="salida-formulario">
			<div class="dividir centrar-texto">
				<p><strong>Estafador/Fraudolento: </strong> <?= $entrada['titulo'] ?></p>
				<p><strong>Fecha que se cometió la estafa: </strong> <?= $entrada['fecha_estafa'] ?></p>
				<p><strong>Dirección donde se cometió la estafa:</strong> <?= $entrada['direccion_estafa'] ?></p>
				<div class="borde-abajo"></div>
			</div>
			<div class="dividir">
				<div class="sesenta">
					<div class="">
						<p><strong>Tipo de estafa: </strong> <?= $entrada['tipo_estafa'] ?> . <?= $entrada['other_estafa'] ?> </p>
						<p><strong>Medio donde se realizo la estafa: </strong> <?= $entrada['medio_estafa'] ?></p>
						<p><strong>Se realizo algún proceso legal: </strong> <?= $entrada['demanda'] ?> </p>
						<div class="salida-formulario">
						<p><strong>Experiencia/Comentario:</strong></p>
						
						<?= substr($entrada['descripcion'], 0, 10000000) . "..." ?>
						</div>
						
						<p><strong>Categoría: </strong> <?= $entrada['categoria'] ?></p>
					</div>
				</div>
				<div class="cuarenta">
					<div class="">
						

						<?php if ($entrada['imagen'] != "images/") : ?>
							<h4>
								Nombre/Titulo del archivo: <?= $entrada['producto'] ?>
							</h4>
							<div class="contenedor-img centrar-texto">
								<img src="<?= $entrada['imagen'] ?>" alt="">
								<br>
								<a class="enlaces" href="<?= $entrada['imagen'] ?>"> <span>Enlace para visualizar archivo</span> </a>
							</div>


						<?php else : ?>
							<p style="font-size: small; color: var(--naranja); margin: 0;">No existen archivos ni imágenes anexados en esta entrada</p>
						<?php endif; ?>
					</div>

				</div>
			</div>

		</div>
	</article>
	<div class="separador"></div>
<?php
endif;
?>


<?php require_once 'footer.php'; ?>