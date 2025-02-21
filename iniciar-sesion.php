<?php
require_once 'cabecera.php';
?>
<!--SI EXISTE UN ERROR EN EL INICIO DE SESIÓN-->
<?php if (!isset($_SESSION['usuario'])) : ?>
  <div class="centrar-texto contenedor error-inicio-sesion">
    <h2>¡Ups! Creo que hubo un error</h2>
    <p>Intentemos de nuevo</p>
    <form class="inicio-sesion" action="login.php" method="POST">
      <input type="email" name="email" id="" placeholder="Tu correo">
      <input type="password" name="password" id="" placeholder="******">
      <input type="submit" value="Ingresar">
    </form>
   
    <div class="separador"></div>
    <div class="separador"></div>
  </div>

  <!--Si no existe errores-->
<?php else : ?>
  <!--Se utiliza clase INICIAR-SESION-->
  <div class="  centrar-texto">
    <div class="contenedor">
      <h2>Ha iniciado sesión correctamente</h2>
      <p>Seleccione una de las opciones:</p>
    <br>
      <div class="dividir">
          <div class="tres-partes">
            <div class="cuadros-iniciar-sesion">
              <h3>Comience a publicar y compartir experiencias</h3>
              <p>Aporte sus valiosas experiencias acerca de las estafas y/o fraudes</p>
            <a class="boton-negro" href="./crear-entradas.php">Comentar</a>
            </div>
          </div>
          <div class="tres-partes">
            <div class="cuadros-iniciar-sesion">
              <h3>Revise los comentarios y experiencias</h3>
              <p>Indague sobre su futuro trabajador o empleador, sus aptitudes, actitudes, desempeño laboral, antecedentes y mucho más</p>
              <a class="boton-negro" href="./blog.php">Blog</a>
            </div>
          </div>
          <div class="tres-partes">
            <div class="cuadros-iniciar-sesion">
              <h3>¿Necesita ayuda, o tiene dudas?</h3>
              <p> Con gusto le atenderemos y ayudaremos. Comuniquese con nosotros para cualquier aclaración</p>
              <a class="boton-negro" href="./ayuda.php">Ayuda</a>
            </div>
          
          </div>
      </div>
        <div class="separador"></div>
    </div>
  </div>
<?php endif; ?>

<?php
borrarErrores();
require_once 'footer.php';
?>