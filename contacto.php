<?php
require_once 'cabecera.php';
?>

<section class="contacto">
    <div class="contenedor">
        <div class="centrar-texto">
            <h2>Contactate con nosotros</h2>
            <p>Envíenos un mensaje, con gusto lo leeremos y le responderemos. Sea por una duda, comentario, opinión, queja, criticas, consejos, entre otros. Estamos para ayudarte</p>
        </div>
       
        
    </div>
    <div class="contenedor dividir">
        <div class="dos-partes">
            <div class=" centrar-texto">
                <img src="./img/contacto.jpeg" alt="espacio">
            </div>
        </div>
        <div class="dos-partes">
        <div class="centrar-texto contenedor formulario-ayuda">
            <form action="enviar-correo.php" method="POST">
                <input type="text" name="nombre" placeholder="¿Cuál es su nombre?">
                <input type="email" name="email" placeholder="Su correo electrónico">
                <textarea name="mensaje" placeholder="Escriba su comentario o solicitud"></textarea>
                <input  onclick='alert("Mensaje enviado. Gracias por comunicarte con nosotros, un asesor se pondrá en contacto contigo en brevedad")' type="submit" value="Enviar">
            </form>
        </div>
        
        </div>
    </div>


    
   
</section>
<?php
require_once 'footer.php';
?>