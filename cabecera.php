<?php require_once 'includes/conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/icono.png">
    <!--FontAwesome-->
    <script src="https://kit.fontawesome.com/678f51be9f.js" crossorigin="anonymous"></script>
    <!--Fuente de Google-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!--Normalize-->
    <link rel="stylesheet" href="./CSS/normalize.css">
    <!--Estilos CSS-->
    <link rel="stylesheet" href="./CSS/style.css">

    <title>Losestafadores.com</title>
</head>
<script>
    function ordenarSelect(id_componente) {
        var selectToSort = jQuery('#' + id_componente);
        var optionActual = selectToSort.val();
        selectToSort.html(selectToSort.children('option').sort(function(a, b) {
            return a.text === b.text ? 0 : a.text < b.text ? -1 : 1;
        })).val(optionActual);
    }
    $(document).ready(function() {
        ordenarSelect('actividades');
    });
</script>

<body class="fondo-body">
    <?php if (!isset($_SESSION['usuario'])) : ?>
        <!--Modal-->
        <div id="miModal" class="modal">
            <div class="modal-contenido">
                <a href="#"><strong>Cerrar</strong> </a>
                <h2>Iniciar Sesión</h2>
                <form class="inicio-sesion" action="login.php" method="POST">
                    <input type="email" name="email" id="" placeholder="Tu correo">
                    <input type="password" name="password" id="" placeholder="******">
                    <input type="submit" value="Ingresar">
                </form>
                <p>Si no se ha registrado clic en <strong><a href="./register.php">Crear cuenta</a></strong> </p>
            </div>
        </div>
    <?php else : ?>
        <div id="miModal" class="modal">
            <div class="modal-contenido">
                <a href="#"><strong>X</strong> </a>
                <h2>Sesión iniciada correctamente</h2>
            </div>
        </div>
    <?php endif; ?>

    <!--ModalMenu-->
    <div id="miModal2" class="modal2">
        <div class="modal-contenido2 db">

            <div class="flex">

                <div class="dos-partes">
                    <form action="buscar.php" method="post">
                        <div class="busqueda ">
                            <i class="fas fa-search"></i>
                            <input type="search" name="busqueda" id="">
                            <input type="submit" value="Buscar">
                        </div>

                    </form>
                </div>

                <div class="dos-partes">
                    <a style="font-size: 2rem;" href="#">X</i></a>
                </div>
            </div>

        </div>

        <div class="centrar-texto nav">
            <?php if (isset($_SESSION['usuario'])) : ?>

                <a href="./mis-datos.php"><i class="fas fa-user-circle"></i></a>
                <div class="borde-abajo"></div>
                <a href="./nosotros.php">Nosotros</a>
                <div class="borde-abajo"></div>
                <a href="./crear-entradas.php">Comentar</a>
                <div class="borde-abajo"></div>
                <a href="./blog.php">Blog</a>
                <div class="borde-abajo"></div>
                <a  title="Ayuda" href="./ayuda.php"><i class="far fa-question-circle"></i></a>
                <div class="borde-abajo"></div>
                <a href="./contacto.php">Contacto</a>
                <div class="borde-abajo"></div>
                <a title="Salir" href="./cerrar.php"><i class="fas fa-sign-out-alt"></i></a>
                <div class="separador"></div>

        </div>

        <div class="centrar-texto nav">
        <?php else : ?>
            <a href="#miModal">Iniciar Sesión</a>
            <div class="borde-abajo"></div>
            <a href="./nosotros.php">Nosotros</a>
            <div class="borde-abajo"></div>
            <a href="./blog.php">Blog</a>
            <div class="borde-abajo"></div>
            <a title="Ayuda" href="./ayuda.php"><i class="far fa-question-circle"></i></a>
            <div class="borde-abajo"></div>
            <a href="./contacto.php">Contacto</a>
            <div class="separador"></div>
        </div>

    <?php endif; ?>
    </div>

    </div>

    <!--Barra-->
    <div class="barra2">
        <div class="barra">
            <div class="logo">
                <a href="./index.php"><img src="./img/icono-blanco.png" alt="">
                    <p style="color: orange; font-size: 2rem; font-weight:400;"> <strong>losestafadores.com</strong> </p>
                </a>
            </div>

            <form action="buscar.php" method="post">
                <div class="busqueda mostrar2">
                    <i class="fas fa-search"></i>
                    <input type="search" name="busqueda" id="">
                    <input type="submit" value="Buscar">
                </div>
            </form>

            <div class=" nav">
                <div class="mostrar">
                    <a href="#miModal2"><i class="fas fa-bars"></i> </a>
                </div>

                <div class=" mostrar2">
                    <?php if (isset($_SESSION['usuario'])) : ?>

                        <a href="./mis-datos.php"><i class="fas fa-user-circle"></i></a>
                        <a href="./nosotros.php">Nosotros</a>
                        <a href="./crear-entradas.php">Comentar</a>
                        <a href="./blog.php">Blog</a>
                        <a  title="Ayuda" href="./ayuda.php"><i class="far fa-question-circle"></i></a>
                        <a href="./contacto.php">Contacto</a>
                        <a title="Salir" href="./cerrar.php"><i class="fas fa-sign-out-alt"></i></a>
                </div>

                <div class="nav">
                <?php else : ?>
                    <a href="#miModal">Iniciar Sesión</a>
                    <a href="./nosotros.php">Nosotros</a>
                    <a href="./blog.php">Blog</a>
                    <a  title="Ayuda" href="./ayuda.php"><i class="far fa-question-circle"></i></a>
                    <a href="./contacto.php">Contacto</a>

                <?php endif; ?>
                </div>
            </div>

        </div>
    </div>