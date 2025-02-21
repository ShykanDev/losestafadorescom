<?php require_once 'includes/redireccion.php'; ?>
<?php require_once 'cabecera.php'; ?>	


<!-- CAJA PRINCIPAL -->
<div class="contenedor">
	<div class="perfil centrar-texto" >
		<h1 ><span>Mi Perfil</span> </h1>
		
		<?php if(isset($_SESSION['completado'])): ?>
			<div class="exito" >
				<?=$_SESSION['completado']?>
			</div>
		<?php elseif(isset($_SESSION['errores']['general'])): ?>
			<div class="error">
				<?=$_SESSION['errores']['general']?>
			</div>
		<?php endif; ?>
			<div >
				<form action="actualizar-usuario.php" method="POST"> 
                <!--Icono Usuario-->
               <i style="font-size: 10rem;" class="fas fa-user-circle"></i>

				<p for="nombre">Nombre</p>
                <input type="text" name="nombre" value="<?=$_SESSION['usuario']['nombre']; ?>"/>
                <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

				<p for="apellidos">Apellidos</p>
				<input type="text" name="apellidos" value="<?=$_SESSION['usuario']['apellidos']; ?>"/>
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

				<p for="email">Email</p>
				<input type="email" name="email" value="<?=$_SESSION['usuario']['email']; ?>"/>
				<?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

				<input type="submit" name="submit" value="Actualizar" />
				</form>
			</div>
	</div>
	
	
	<?php borrarErrores(); ?>

</div> <!--fin principal-->
<div class="separador"></div>
			
<?php require_once 'footer.php'; ?>
