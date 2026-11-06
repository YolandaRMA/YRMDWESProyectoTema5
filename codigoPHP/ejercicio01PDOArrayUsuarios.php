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
            //se crea array con los usuarios y contraseñas permitidos.
            $aUsuariosPermitidos = [
            'admin' => [
                'password' => 'paso123',
                'descripcion' => 'Usuario administrador'
            ],
            'yolanda' => [
                'password' => 'paso321',
                'descripcion' => 'Yolanda Rodríguez'
                ]
            ];
            // Se comprueba si el navegador ha enviado las credenciales.
            if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

                // Se solicita al navegador la identificación del usuario.
                header('WWW-Authenticate: Basic realm="Proyecto Tema 5"');
                header('HTTP/1.1 401 Unauthorized');

                echo 'Es necesario identificarse para acceder a esta página.';
                exit;
            }
            // Se recogen el código de usuario y la contraseña introducidos.
            $codigoUsuario = $_SERVER['PHP_AUTH_USER'];
            $passwordUsuario = $_SERVER['PHP_AUTH_PW'];

            // Se comprueba si el usuario existe y si su contraseña es correcta.
            if (
                isset($aUsuariosPermitidos[$codigoUsuario]) &&
                $aUsuariosPermitidos[$codigoUsuario]['password'] == $passwordUsuario
            ) {
                // Se obtiene la descripción del usuario identificado.
                $descripcionUsuario = $aUsuariosPermitidos[$codigoUsuario]['descripcion'];

            } else {

                // Se rechaza el acceso cuando las credenciales no son correctas.
                header('WWW-Authenticate: Basic realm="Proyecto Tema 5"');
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

            <p>Bienvenido, <?php echo $descripcionUsuario; ?>.</p>

            <p>Se ha identificado correctamente al usuario:
                <strong><?php echo $codigoUsuario; ?></strong>
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
