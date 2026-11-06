<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>carga</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
    </head>
    <body>
        <header>
            <h1>Carga inicial de datos</h1>
        </header>
        <main>
            <?php
            $archivo = '../scriptDB/CargaInicialDBYRMDWESProyectoTema5.sql';

            if ($archivo && file_exists($archivo)) {

                highlight_file($archivo);
            } else {
                echo "<h3>El archivo no existe.</h3>";
            }
            ?>
        </main>
        <footer>
            <p><a href="../indexProyectoTema5.php">Home</a></p>
            <div class="footer-text">
                <p>2026-27 IES Los Sauces. &copy; Todos los derechos reservados.<a href="../index.html">Yolanda Rodríguez Moreno</a></p>
                <time datetime="2026-09-30">Última actualización: 05 de Octubre de 2026</time>
            </div>
        </footer>
    </body>
</html>