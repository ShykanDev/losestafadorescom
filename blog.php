<?php require_once 'cabecera.php'; ?>
<?php if (isset($_SESSION['usuario'])) : ?>
    <section class="blog">
        <!--PRIMERA PARTE BLOG-->
        <div class="contenedor-entrada">
            <h2 class="centrar-texto">Nuevos Comentarios</h2>

            <?php
            $entradas = conseguirEntradas($db, true);
            if (!empty($entradas)) :
                while ($entrada = mysqli_fetch_assoc($entradas)) :
            ?>
                    <article class="contenedor">
                       
                            <div class="salida-formulario">
                                <div class="dividir centrar-texto">
                                    <p><strong>Estafador/Fraudolento: </strong> <?= $entrada['titulo'] ?></p>
                                    <p><strong>Fecha que se cometió la estafa: </strong> <?= $entrada['fecha_estafa'] ?></p>
                                    <p><strong>Dirección donde se cometió la estafa:</strong> <?= $entrada['direccion_estafa'] ?></p>
                                    <div class="centrar-texto">
                                    <a href="entrada.php?id=<?= $entrada['id'] ?>"><span>Clic para visualizar el comentario y sus interacciones</span></a>  
                                    </div>

                                    <div class="contenedor">
                                        <div class="borde-abajo"></div>
                                    </div>

                                </div>
                                <div class="dividir">
                                    <div class="sesenta">
                                        <div class="">
                                            <p><strong>Tipo de estafa: </strong> <?= $entrada['tipo_estafa'] ?> . <?= $entrada['other_estafa'] ?> </p>
                                            <p><strong>Medio donde se realizo la estafa: </strong> <?= $entrada['medio_estafa'] ?></p>
                                            <p><strong>Se realizo algún proceso legal: </strong> <?= $entrada['demanda'] ?> </p>
                                            <div class="salida-formulario">
                                                <p><strong>Experiencia/Comentario:</strong></p>
                                                <?= $entrada['descripcion'] ?>
                                            </div>

                                            <p><strong>Categoría: </strong> <?= $entrada['categoria'] ?></p>
                                        </div>
                                    </div>
                                    <div class="cuarenta">
                                        <div class="">


                                            <?php if(($entrada['imagen'])!="image/") : ?>
                                                <p>
                                                    <strong>Nombre/Titulo del archivo:</strong> <?= $entrada['producto'] ?>
                                                </p>
                                                <div class="contenedor-img centrar-texto">
                                                    <img src="<?= $entrada['imagen'] ?>" alt="">
                                                    <br>
                                                    <a href="<?= $entrada['imagen'] ?>"> <span>Enlace para visualizar archivo</span> </a>
                                                </div>


                                            <?php else : ?>
                                                <p>No existen archivos ni imágenes anexados en esta entrada</p>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        
                    </article>
                    <div class="separador"></div>

                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>

<?php else : ?>
    <div class="contenedor">
        <h3>Inicie sesión para poder conocer las experiencias</h3>
        <div class="centrar-texto">
            <div class="dividir botones-opciones">
                <a class="boton-largo" href="#miModal"><i style="color:green; margin-right: 1rem;" class="fas fa-sign-in-alt"></i>Iniciar Sesión</a>
                <a class="boton-largo" href="./register.php"><i style="color:green; margin-right: 1rem;" class="fas fa-user-plus"></i>Registrarse</a>
            </div>
        </div>
    </div>

    <div class="contenedor ">
        <p>Conoce los comentarios, indaga y busca las experiencias con tema sobre las estafas y fraudes. Puedes responder a comentarios, investigar y realizar búsquedas, revisar perfiles y utilizar este sitio para tener experiencias de terceros.</p>  
    </div>
    <div class="contenedor franja-beneficios alinear-vertical">
        <div class="contenedor">
            <div class="dividir">
                <div class="tres-partes">
                    <p><strong>SITIO GRATUITO</strong></p>
                    <p>Disfruta de las herramientas de la página sin necesidad de realizar un pago. Conoce los estafadores y atribuye con comentarios que ayudarán a los demás</p>
                </div>
                <div class="tres-partes">
                    <p><strong>SITIO SEGURO</strong></p>
                    <p>Comparte experiencias sin el miedo de la represarías. Puedes comentar libremente, dando a conocer al estafador. Tienes la opción seleccionar si aparecerán tus datos o no</p>
                </div>
                <div class="tres-partes">
                    <p><strong>SITIO ÚNICO</strong></p>
                    <p>Todos los comentario ingresados en el sistema serán exclusivos a temas de estafas y fraudes. No habrá comentarios de otros temas, por lo tanto usa este sitio para delatar a los estafadores</p>
                </div>
            </div>
        </div>        
    </div>
<?php endif; ?>

<?php require_once 'footer.php'; ?>