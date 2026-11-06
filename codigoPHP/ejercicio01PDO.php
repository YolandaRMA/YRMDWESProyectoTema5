<html>
    <head>
        <meta charset="UTF-8">
        <title>01</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
    </head>
    <body>

<!--        autenticación HTTP básica:
        PHP comprueba si el navegador ha enviado un usuario y una contraseña.
        Si no los ha enviado, header() solicita la identificación al navegador.
        El usuario introduce sus credenciales en la ventana que aparece.
        PHP comprueba si son correctas.
        Si lo son, permite acceder a la página; si no, devuelve un error 401.
        **header() y  variables $_SERVER['PHP_AUTH_USER'] y $_SERVER['PHP_AUTH_PW']
        la comprobación debe hacerse antes de imprimir HTML, porque header() tiene que ejecutarse 
        antes de enviar contenido al navegador.
-->
            <?php
            
            //se crean constantes para usuario y contraseña
            define("USUARIO", "admin");
            define("PASSWORD", "paso");
            if ($_SERVER['PHP_AUTH_USER']!= "USUARIO"|| $_SERVER['PHP_AUTH_PW']!="PASSWORD") {
            // Se rechaza el acceso cuando las credenciales no son correctas.
                header('WWW-Authenticate: Basic realm="Contenido restringido!!"');
                header('HTTP/1.1 401 Unauthorized');
                echo 'Usuario o contraseña incorrectos.';
                exit;

            }
            ?>
            <header>
            <h1>Control de acceso</h1>
            </header>

        <main>

            <h2>Acceso permitido</h2>

            <p>Bienvenido.</p>

            <p>Se ha identificado correctamente al usuario:
                <strong><?php echo "USUARIO"; ?></strong>
            </p>

        </main>
            
        </main>
        <footer>
            <p><a href="../indexProyectoTema5.php">Home</a></p>
            <div class="footer-text">
                <p>2026-27 IES Los Sauces. &copy; Todos los derechos reservados.<a href="../index.html">Yolanda Rodríguez Moreno</a></p>
                <time datetime="2026-09-30">Última actualización: 05 de Octubre de 2026</time>
            </div>
        </footer>
    </body>
</body>
</html>
