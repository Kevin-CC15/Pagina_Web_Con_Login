<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Pagina principal </title>
    <link rel='stylesheet' type='text/css' media='screen' href='Estilos/estilo_index.css'>
    <style>
        .barra-sesion {
            background: #2c3e50;
            color: #ffffff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .barra-sesion a {
            color: #f1c40f;
            text-decoration: none;
            margin-left: 15px;
            font-weight: bold;
        }
        .barra-sesion a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<div class="barra-sesion">
    <span>Bienvenido, <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong></span>
    <div>
        <a href="dashboard.php">Gestionar Usuarios</a>
        <a href="logout.php" style="color: #e74c3c;">Cerrar Sesión</a>
    </div>
</div>

<header>
    <h2>Pagina principal </h2>
    <p>Estamos en: </p>
    <div id="fecha-hora-actual" style="font-size: 1.1rem; font-weight: bold;"></div>
</header>

<body>

<script src="funciones/Tiempo.js"></script>

<div class="tarjetas-div fondo-tarjeta1">

    <div class="tarjeta-contenido">
        <h2>Bienvenido a mi pagina web</h2>
        <p>Mi nombre es kevin Canul y esta pagina web tiene como objetivo compartir mis gustos y mis intereses al igual que dar a conocer temas que podrian ser del interes de otras personas.</p>
        <p>Si te interesa conocer mas sobre mi, no dudes en explorar las diferentes secciones de esta pagina.</p>
        <a href="#Paginas_Relacionadas" class="boton-pagina">Explorar</a>
    </div>

    <div class="tarjeta-imagen">
        <img src="img/img_div/Moomin_div1.png" alt="Imagen de fondo">
    </div>

</div>

<div class="tarjetas-div fondo-tarjeta2">

    <div class="tarjeta-imagen">
        <img src="img/img_div/Moomin_div2.png" alt="Imagen de fondo">
    </div>

    <div class="tarjeta-contenido">
        <h2>Mas sobre mi</h2>
        <p>Mi nombre completo es Kevin Jesus Canul Coba soy originario de un pueblo llamado valladolid en el estado de yucatan, mexico. Soy el segundo hijo de tres hermanos naci el 15 de octubre del 2006 actualmente tengo 19 años y estudio ingenieria en software en la UADY tengo bastantes pasatiempos entre ellos dibujar y leer.</p>
        <p> Si quieres conocer mas sobre mi, puedes visitar mi bibliografia dando click en el siguiente enlace:</p>
        <a href="autobio.html" class="boton-pagina">Ver Bibliografía</a>
    </div>

</div>

<div class="tarjetas-div">
    <div class="tarjeta-contenido fondo-tarjeta3">
        <h2>Mi escuela</h2>
        <img src="img/Uady_logo.jpg" alt="Foto de la universidad">
    </div>
    <div class="tarjeta-imagen fondo-tarjeta4">
        <h2>Ubicación de la universidad</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2097.259699643439!2d-88.1445913406907!3d21.15918356556531!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f522b6c741fe2ff%3A0x1a4273ac58448ae1!2sUADY%20-%20Unidad%20Multidisciplinaria%20Tizim%C3%ADn!5e0!3m2!1ses!2smx!4v1788578181155!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" justify-content="center" align-items="center" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </div>

</div>

<div class="tarjetas-div" id="Paginas_Relacionadas">

    <div class="cuadro-texto">
        <img src="img/img_div/Moomin_div3.png" alt="Imagen autibio">
        <p>si quieres saber mas de mi visita mi autobiografia</p>
        <a href="autobio.html" class="boton-cuadro-texto">Ver Bibliografía</a>
    </div>

    <div class="cuadro-texto">
        <img src="img/img_div/galeria_logo.png" alt="Imagen galeria">
        <p>Quieres ver imagenes relacionadas con mi persona ingresa aqui:</p>
        <a href="galeria.html" class="boton-cuadro-texto">Ver Galería</a>
    </div>

    <div class="cuadro-texto">
        <img src="img/img_div/formulario_logo.png" alt="Imagen formulario">
        <p>Quires contactarme contestando el siguiente formulario:</p>
        <a href="contacto.html" class="boton-cuadro-texto">Formulario de contacto</a>
    </div>

    <div class="cuadro-texto">
        <img src="img/img_div/youtube_logo.png" alt="Imagen youtube">
        <p>Visita mi canal de youtube para encontrar videos mios</p>
        <a href="https://www.youtube.com/@kevinbs6961" class="boton-cuadro-texto">Mi canal de youtube</a>
    </div>

    <div class="cuadro-texto">
        <img src="img/img_div/youtube_logo.png" alt="Imagen youtube">
        <p>Visita mi canal de youtube para encontrar videos mios</p>
        <a href="actividades.html" class="boton-cuadro-texto">Actividades</a>
    </div>

</div>

</body>
</html>