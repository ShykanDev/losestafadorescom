<?php require_once 'cabecera.php'; ?>
<!--INTRODUCCION AL REGISTRO-->
<!-- Mostrar errores -->
<?php if (isset($_SESSION['usuario'])) : ?>
    <div class="contenedor">
        <div class="centrar-texto">
            <div class="separador"></div>
            <div class="exito">
                <p> <i class="far fa-check-square"></i> Sesión ya iniciada</p>
            </div>
            <div class="dividir">
                <div class="tres-partes">
                    <div class="cuadros-iniciar-sesion">
                        <h3>Comienza a publicar y compartir experiencias</h3>
                        <p>Aporte sus valiosas experiencias, delatando a los estafadores</p>
                        <a class="boton-negro" href="./crear-entradas.php">Comentar</a>
                    </div>
                </div>
                <div class="tres-partes">
                    <div class="cuadros-iniciar-sesion">
                        <h3>Revisa los comentarios y experiencias</h3>
                        <p>Conozca si el producto, servicio, persona o empresa ha cometido fraudes y tome a base de comentarios su mejor decisión</p>
                        <a class="boton-negro" href="./blog.php">Blog</a>
                    </div>
                </div>
                <div class="tres-partes">
                    <div class="cuadros-iniciar-sesion">
                        <h3>¿Necesitas ayuda, o tienes dudas?</h3>
                        <p>¿Necesitas apoyo? Con gusto te atenderemos y ayudaremos</p>
                        <a class="boton-negro" href="./ayuda.php">Ayuda</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="separador"></div>
    </div>
<?php else : ?>
    <?php if (isset($_SESSION['completado'])) : ?>
        <!--Cuando la sesión ya está iniciada-->
        <!--PARTE DE CUANDO YA SE INICIO SESIÓN-->
        <!--MENSAJE DE BIENVENIDA-->
        <section class="iniciar-sesion">
            <div class="contenedor centrar-texto">
                <div class="contenido-iniciar-sesion">
                    <div class="item">
                        <div class="  centrar-texto">
                            <div class="contenedor">
                                <div class="exito">
                                    <p> <i class="far fa-check-circle"></i> <?= $_SESSION['completado'] ?> </p>
                                </div>
                                <h2>Inicie Sesión para poder acceder y escoger una de las opciones</h2>
                                <a class="boton-negro" href="#miModal">Iniciar Sesión</a>
                                <br>
                                <div class="dividir">
                                    <div class="tres-partes">
                                        <div class="cuadros-iniciar-sesion">
                                            <h3>Comienza a publicar y compartir experiencias</h3>
                                            <p>Aporte valiosas experiencias dando a conocer los estafadores</p>

                                        </div>
                                    </div>
                                    <div class="tres-partes">
                                        <div class="cuadros-iniciar-sesion">
                                            <h3>Revisa los comentarios y experiencias</h3>
                                            <p>Indague sobre si su proximo producto, servicio, trabajo o compra es segura o si esta tratando con un estafador</p>

                                        </div>
                                    </div>
                                    <div class="tres-partes">
                                        <div class="cuadros-iniciar-sesion">
                                            <h3>¿Necesitas ayuda, o tienes dudas?</h3>
                                            <p>¿Necesitas apoyo? Con gusto te atenderemos y ayudaremos</p>

                                        </div>
                                    </div>
                                </div>
                                <div class="separador"></div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </section>

    <?php elseif (isset($_SESSION['errores']['general'])) : ?>
        <div class="error centrar-texto">
            <div class="alerta alerta-error">
            </div>

            <?= $_SESSION['errores']['general'] ?>
        </div>
    <?php endif; ?>

    <?php if (!isset($_SESSION['completado'])) : ?>

        <div class="fondo-register">

            <div class=" contenedor bloque-registro centrar-texto">

                <h3>Crear cuenta</h3>
                <form action="registro.php" method="POST">
                    <div class="dividir">
                        <div class="dos-partes">
                            <p for="nombre">Nombre</p>
                            <input type="text" name="nombre" placeholder="Nombre(s)" />
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                            <p>Apellido</p>
                            <input type="text" name="apellidos" placeholder="Apellido(s)" />
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                            <p for="date">Fecha de nacimiento:</p>
                            <input type="date" name="date" />
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'date') : ''; ?>

                            <p for="pais">Región:</p>
                            <select name="pais" id="pais">
                                <option value="" disabled selected>==Seleccionar==</option>
                                <option value="argentina">Argentina</option>
                                <option value="bolivia">Bolivia</option>
                                <option value="brasil">Brasil</option>
                                <option value="chile">Chile</option>
                                <option value="colombia">Colombia</option>
                                <option value="costa-rica">Costa Rica</option>
                                <option value="cuba">Cuba</option>
                                <option value="ecuador">Ecuador</option>
                                <option value="el-salvador">El Salvador</option>
                                <option value="guatemala">Guatemala</option>
                                <option value="honduras">Honduras</option>
                                <option value="mexico">México</option>
                                <option value="nicaragua">Nicaragua</option>
                                <option value="panama">Panamá</option>
                                <option value="paraguay">Paraguay</option>
                                <option value="peru">Perú</option>
                                <option value="rep-dominicana">República Dominicana</option>
                                <option value="uruguay">Uruguay</option>
                                <option value="venezuela">Venezuela</option>
                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'pais') : ''; ?>

                        </div>
                        <div class="dos-partes">
                            <p>Correo</p>
                            <input type="email" name="email" placeholder="Correo" />
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                            <p>Contraseña</p>
                            <input type="password" name="password" placeholder="Contraseña" />
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                            <p>¿Comentara como empresa o persona?</p>
                            <select name="tipo" id="tipo">
                                <option value="" selected disabled>==Seleccione==</option>
                                <option value="Empresa">Empresa</option>
                                <option value="Persona">Persona</option>

                            </select>
                            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'tipo') : ''; ?>

                            <div class="aceptar-terminos contenedor">
                                <p for="condiciones">Para poder registrarte deberás aceptar los <a href="./privacidad.html">Términos y Condiciones</a> </p>
                                <input type="checkbox" name="acepto" id="acepto" required>
                                <p>Aceptar</p>
                            </div>
                           
                            
                        </div>
                    </div>
                    <input class="boton-negro" type="submit" name="submit" value="Registrar" />

                </form>
            </div>
        </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<?php borrarErrores(); ?>
</div>
</div>

<?php borrarErrores(); ?>
<?php require_once 'footer.php'; ?>