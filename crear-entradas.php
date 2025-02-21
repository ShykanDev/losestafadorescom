<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'cabecera.php'; ?>

<!-- CAJA PRINCIPAL -->
<section>
	<div class="empleador">
		<div class="contenedor blog ">
			<h2 class="centrar-texto">Aquí podrá comentar y compartir sus experiencias acerca de las estafas</h2>

			<i>Recuerde: Cada comentario creado en losestafadores.com es responsabilidad exclusiva del creador del comentario. Para más información visite nuestros <a href="./privacidad.html"><em>Términos y Condiciones</em> </a></i>
			<div class="borde-abajo"></div>

			<!--Asi vas a comentar-->
			<div class="dividir">
				<div class="cuarenta">
					<div class="bloque-cuadros">
						<p><i class="far fa-user-circle"></i> Estos son los datos que se ingresaron al sistema</p>
					</div>
					<div class="bloque-cuadros">
						<div class="dividir">
							<div class="dos-partes">
								<p>Nombre: <?= $_SESSION['usuario']['nombre']; ?></p>
								<p>Correo: <?= $_SESSION['usuario']['email']; ?></p>
							</div>
							<div class="dos-partes">
								<p>Categoria: <?= $_SESSION['usuario']['tipo']; ?></p>
							</div>
						</div>
					</div>
				</div>
				<div class="sesenta">
					<div class="bloque-cuadros">
						<p>El Nombre: <em><?= $_SESSION['usuario']['nombre']; ?></em> es el que se usará para dar referencia al comentario creado, si no quiere que aparezca puede editar el nombre, cambiando los datos de su perfil.</p>
						<div class="centrar-texto">
							<a class="boton-negro" href="./mis-datos.php">Mis Datos</a>
						</div>
					</div>
				</div>
			</div>
			<div class="bloque-instrucciones">
				<h3>Llene el formulario como se va indicando</h3>
				<div class="dividir">
					<div class="dos-partes">
						<p>Todos los datos con <span>*</span> son obligatorios</p>
						<p>Todos los comentarios creados son y serán propiedad del usuario. Consulte nuestros <a href="./privacidad.php"><strong>Términos de Uso</strong></a></p>
						<p></p>
					</div>
					<div class="dos-partes">
						<p>Si tiene dudas y/o comentarios comuniquese con nosotros <a href="./contacto.php"><strong>aquí</strong></a></p>
						<p>Anexe multimedia no mayor a 5mb</p>
					</div>
				</div>
			</div>
			<br>
		</div>
		<div class="contenedor formulario-entrada">
			<form action="guardar-entrada.php" method="POST" enctype="multipart/form-data" >
				<div class="dividir">
					<div class="dos-partes">
					
						<p>Nombre del Estafador: <span>*</span></p>
						<input type="text" name="titulo" id="nombre" placeholder="Empresa, servicio, producto, banco, persona...">
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>
						
						<p>Fecha que se realizo la estafa: <span>*</span></p>
						<input type="month" name="fecha_estafa" id="fecha_estafa">
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'fecha_estafa') : ''; ?>

						<p>Lugar donde se cometió la estafa: <span>*</span></p>
						<input type="text" name="direccion_estafa" id="direccion_estafa" placeholder="Dirección">
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'direccion_estafa') : ''; ?>

						<p>Tipo de Estafa: <span>*</span></p>
						<select name="tipo_estafa" id="tipo_estafa">
							<option value="Otro">Otro</option>
							<option value="Inmuebles">Inmuebles</option>
							<option value="Educativo">Educativo</option>
							<option value="Gobierno">Gobierno</option>
							<option value=">Producto">Producto</option>
							<option value="Servicio">Servicio</option>
							<option value="Bancos">Bancos</option>
							<option value="Prestamistas">Prestamistas</option>
							<option value="Empresas">Empresas</option>
							<option value="Ofertas Laborale">Ofertas Laborales</option>
							<option value="Trabajos">Trabajos</option>
						</select>
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'tipo_estafa') : ''; ?>

						<p>Otro tipo de estafa:</p>
						<input type="text" name="other_estafa" id="" placeholder="Agregue otro tipo de Estafa">
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'other_estafa') : ''; ?>
					</div>
					<div class="dos-partes">
						<p>Medio por el cual conocio al estafador: <span>*</span></p>
						<input type="text" name="medio_estafa" id="" placeholder="Televisión, Redes Sociales, Teléfono, recomendaciones..."> 
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'medio_estafa') : ''; ?>

						<p>¿Se realizó un proceso legal en su contra? <span>*</span></p>
						<div class="flex">
						<label for="si-demanda">Si</label>
						<input type="radio" name="demanda" value="Si se realizo proceso legal" id="si-demanda">
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'demanda') : ''; ?>
			
						<label for="no-demanda">No</label>
						<input type="radio" name="demanda" id="no-demanda" value="No se realizo proceso legal">	
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'demanda') : ''; ?>	
						</div>
						<br>

						<p>Redacte su experiencia libremente: <span>*</span></p>
						<textarea name="descripcion" id="" ></textarea>
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

						<p>¿Desea agregar evidencia multimedia? </p>

						<p>Nombre del archivo:</p>
						<input type="text" name="producto" id="">
						
						<input type="file" name="imagen" id="">
						<p style="font-size: 1.3rem; margin-top: 0; " >Los archivos admitidos son: PDF, JPG, PNG y mp4 con un máximo de 5mb</p>
						<?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'imagen') : ''; ?>
						<br>

						

						<p>Seleccione una opción</p>
						<select name="categoria">
							<?php
							$categorias = conseguirCategorias($db);
							if (!empty($categorias)) :
								while ($categoria = mysqli_fetch_assoc($categorias)) :
							?>
									<option selected value="<?= $categoria['id'] ?>">
										<?= $categoria['nombre'] ?>
									</option>
							<?php
								endwhile;
							endif;
							?>
						</select>
					</div>
				</div>
				<div class="centrar-texto">
					<input type="submit" value="Comentar">
				</div>
			</form>
		</div>
		<?php borrarErrores(); ?>
	</div>
</section>
<div class="separador">
</div>

<!--fin principal-->
<?php require_once 'footer.php'; ?>