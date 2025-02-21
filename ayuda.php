<?php
include_once 'cabecera.php';
?>

<section class="ayuda">
    <div class="contenedor">
        <h2>Estamos aquí para ayudarte</h2>
        <p>Le mostraremos las preguntas con sus respuestas más populares en el sitio, primero revise si alguna le puede ayudar. En caso que necesite más información o no se haya resuelto su duda mande un mensaje. Con gusto le atenderemos</p>

        <div class="dividir">
            <div class="dos-partes">
                <input type="checkbox" id="spoiler1"></input>
                <label for="spoiler1">¿Es gratis?</label>
                <div class="spoiler">Como bien lo hemos comentado, este sitio es completamente gratuito, apoyelo compartiendo</div>

                <input type="checkbox" id="spoiler2"></input>
                <label for="spoiler2">¿Necesito dar información delicada?</label>
                <div class="spoiler">Su información de <a href="./registrar.php"><em>registro</em></a> no requiere de datos bancarios, íntimos o delicados</div>

                <input type="checkbox" id="spoiler3"></input>
                <label for="spoiler3">¿Puedo tener represarías al dar un comentario?</label>
                <div class="spoiler">En absoluto, por parte del sitio, no se compartirá información como domicilios, correos o números de contacto. Aparecerá solo el nickname o su nombre en dado caso</div>


            </div>
            <div class="dos-partes">
                <div class="centrar-texto">
                    <input type="checkbox" id="spoiler4"></input>
                    <label for="spoiler4">¿Qué tan fiable es?</label>
                    <div class="spoiler">La honestidad es un valor y un hábito que se debe ejercer en cada individuo, el sistema cuenta con una forma de respuestas donde se podrá abrir un debate, en este caso de acuerdo a nuestros <a href="./privacidad.php"><em>Términos y Condiciones</em></a> en dado caso que se incumplan serán eliminados los comentarios que no sean verídicos o no acaten las normas establecidas en el sitio</div>

                    <input type="checkbox" id="spoiler5"></input>
                    <label for="spoiler5">Eliminar comentarios</label>
                    <div class="spoiler">Sabemos que los mal-entendidos son comúnes. Para poder eliminar un comentario, si es dueño del comentario, podrá eliminarlo <a href="./iniciar-sesion.php" target="_blank" rel="noopener noreferrer"><em>iniciando sesión</em>. En caso que no lo seas, puede abrir disputa comentando o respondiendo al comentario o en dado caso poniendose en <a href="./contacto.php"><em>Contacto</em></a> con nosotros</div>

                    <input type="checkbox" id="spoiler6"></input>
                    <label for="spoiler6">Eliminar cuenta y/o comentarios</label>
                    <div class="spoiler">Lamentamos que habilite esta parte 😢. Si desea eliminar la cuenta, comuniquese con nosotros, aquí mismo o en <a href="./contacto.php"><em>Contacto</em></a> nosotros daremos de baja su cuenta, los comentarios en parte, deberán de pasar por dos filtros, una de autenticidad de usuario y de disputa, si cumplen con los dos, se eliminará su cuenta con los comentarios, en caso contrario, solo su cuenta. Si quiere saber más de los filtros puede visitar los <a href="./privacidad.php"><em>Términos de Uso</em></a></div>

                </div>
            </div>
        </div>
        <div class="separador"></div>
        <div class="centrar-texto">
            <h2>¿No hemos resuelto tu duda?</h2>
        </div>
        
        <div class="dividir">
            <div class="dos-partes">
                <p>Mandanos un mensaje explicándonos su duda, sugerencia, comentario, entre otros. Le escucharemos y atenderemos </p>
                <div class="centrar-texto formulario-ayuda">
                    <form action="enviar-correo.php" method="POST">
                        <input type="text" name="nombre" placeholder="¿Cuál es su nombre?">
                        <input type="email" name="email" placeholder="Su correo electrónico">
                        <textarea name="mensaje" placeholder="Escriba su comentario o solicitud"></textarea>
                        <input class="boton" type="submit" value="Enviar">
                    </form>
                    <div class="separador"></div>
                </div>
            </div>
            <div class="dos-partes">
                <img src="./img/mujer-feliz.jpeg" alt="">
            </div>
        </div>


    </div>
</section>


<?php
include_once 'footer.php';
?>