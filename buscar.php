<?php require_once 'cabecera.php'; ?>
<?php if(isset($_SESSION['usuario'])) : ?>
<!-- CAJA PRINCIPAL -->
<div class="contenedor">
	<div class="separador"></div>

	<div class="texto-busqueda">
		<p> Resultados relacionados con: <strong><?= $_POST['busqueda'] ?></strong> </p>
	</div>
	<?php if ($_POST['busqueda']) : ?>
		<?php
		$entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

		if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
			while ($entrada = mysqli_fetch_assoc($entradas)) :
		?>
				<article class="contenedor bloque-cuadros">

					<a href="entrada.php?id=<?= $entrada['id'] ?>">
					<span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?> <i></i></span>
						 <h2> Comentario para: <strong><?= $entrada['titulo'] ?></strong></h2>
						 <p><strong>Medio de estafa: </strong> <?=$entrada['medio_estafa']?> </p>
						
						<p> <strong>Tipo de estafa:</strong> <?= $entrada['tipo_estafa'] ?> </p>
						<p><strong>Comentario:</strong>   <?= substr($entrada['descripcion'], 0, 180) . "..." ?></p>
						<div class="centrar-texto">
						<p> <em>Clic para visualizar experiencia</em> </p>
						</div>
						
					</a>
					
				</article>
				<div class="borde-abajo"></div>
			<?php
			endwhile;
		else :
			?>
			<div class="error">
				<p>No existen entradas referentes a esta búsqueda</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</div>
<?php else : ?>;
	<!-- CAJA PRINCIPAL -->
<div class="contenedor">
	<div class="separador"></div>

	<div class="texto-busqueda">
		<p> Resultados relacionados con: <strong><?= $_POST['busqueda'] ?></strong> </p>
	</div>
	<?php if ($_POST['busqueda']) : ?>
		<?php
		$entradas = conseguirEntradas($db, null, null, $_POST['busqueda']);

		if (!empty($entradas) && mysqli_num_rows($entradas) >= 1) :
			while ($entrada = mysqli_fetch_assoc($entradas)) :
		?>
				<article class="contenedor bloque-cuadros">

					<a href="#miModal">
					<span class="fecha"><?= $entrada['categoria'] . ' | ' . $entrada['fecha'] ?> <i></i></span>
						 <h2> Comentario para: <strong><?= $entrada['titulo'] ?></strong></h2>
						 <p><strong>Medio de estafa: </strong> <?=$entrada['medio_estafa']?> </p>
						
						<p> <strong>Tipo de estafa:</strong> <?= $entrada['tipo_estafa'] ?> </p>
						<p><strong>Comentario:</strong>   <?= substr($entrada['descripcion'], 0, 180) . "..." ?></p>
						<div class="centrar-texto">
						<p> <em>Para visualizar y/o responder el comentario, inicia sesión</em> </p>
						</div>
						
					</a>
					
				</article>
				<div class="borde-abajo"></div>
			<?php
			endwhile;
		else :
			?>
			<div class="error">
				<p>No existen entradas referentes a esta búsqueda</p>
			</div>
		<?php endif; ?>
	<?php endif; ?>

</div>
		<?php endif;?>
<!--fin principal-->

<?php require_once 'footer.php'; ?>