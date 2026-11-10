<?php
    // Se comprueba si el navegador ha enviado el usuario y la contraseña.
    if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

        // Se solicita al navegador que muestre la ventana de identificación.
        header('WWW-Authenticate: Basic realm="Proyecto Tema 5"');

        // Se indica que el acceso no está autorizado.
        header('HTTP/1.1 401 Unauthorized');

        // Se muestra un mensaje y un enlace para volver a intentarlo.
        echo '<p>Es necesario identificarse para acceder.</p>';
        echo '<p><a href="' . $_SERVER['PHP_SELF'] . '">Volver a intentarlo</a></p>';

        // Se detiene la ejecución del programa.
        exit;
    }

    // Se incluye el archivo de configuración de la conexión a la base de datos.
    require_once '../config/configDB00.php';

    // Se recogen el código de usuario y la contraseña introducidos en la ventana.
    $codigoUsuario = $_SERVER['PHP_AUTH_USER'];
    $contrasenaUsuario = $_SERVER['PHP_AUTH_PW'];

    // Se inicializan las variables que almacenarán el resultado de la consulta
    // y el posible mensaje de error de conexión.
    $usuarioBD = false;
    $mensajeError = null;

    try {
        // Se establece la conexión con la base de datos mediante PDO.
        $conexionPDO = new PDO(HOST, USER, PASS);

        // Se prepara la consulta para comprobar si existe el usuario
        // y si la contraseña coincide con el hash almacenado en la tabla.
        $consultaUsuario = $conexionPDO->prepare(
            'SELECT * FROM T01_Usuario
            WHERE T01_CodUsuario = :codigoUsuario
            AND T01_Password = SHA2(CONCAT(:codigoUsuarioHash, :contrasenaUsuario), 256)'
        );

        // Se ejecuta la consulta sustituyendo los parámetros por los datos introducidos.
        // Se utiliza el código de usuario dos veces:
        // una para localizar el registro y otra para calcular el hash de la contraseña.
        $consultaUsuario->execute([
            ':codigoUsuario' => $codigoUsuario,
            ':codigoUsuarioHash' => $codigoUsuario,
            ':contrasenaUsuario' => $contrasenaUsuario
        ]);

        // Se obtiene el registro del usuario como un array asociativo.
        $usuarioBD = $consultaUsuario->fetch(PDO::FETCH_ASSOC);

        // Si se ha encontrado el usuario, se actualizan sus datos de conexión.
        if ($usuarioBD) {

            // Se incrementa el número de conexiones y se guarda la fecha y hora actual.
            $actualizarConexion = $conexionPDO->prepare(
                'UPDATE T01_Usuario
                SET T01_NumConexiones = T01_NumConexiones + 1,
                    T01_FechaHoraUltimaConexion = NOW()
                WHERE T01_CodUsuario = :codigoUsuario'
            );

            // Se ejecuta la actualización para el usuario identificado.
            $actualizarConexion->execute([
                ':codigoUsuario' => $codigoUsuario
            ]);

            // Se vuelve a consultar el usuario para obtener los datos actualizados.
            $consultaUsuario->execute([
                ':codigoUsuario' => $codigoUsuario,
                ':codigoUsuarioHash' => $codigoUsuario,
                ':contrasenaUsuario' => $contrasenaUsuario
            ]);

            // Se recupera de nuevo el registro con el número de conexiones actualizado.
            $usuarioBD = $consultaUsuario->fetch(PDO::FETCH_ASSOC);
        }

    } catch (PDOException $excepcionPDO) {

        // Se guarda el mensaje de error si se produce un problema con PDO.
        $mensajeError = $excepcionPDO->getMessage();

    } finally {

        // Se libera la conexión a la base de datos.
        unset($conexionPDO);
    }

    // Si no se ha encontrado el usuario y tampoco existe un error de conexión,
    // significa que el código o la contraseña introducidos son incorrectos.
    if (!$usuarioBD && $mensajeError === null) {

        // Se vuelve a solicitar la identificación al navegador.
        header('WWW-Authenticate: Basic realm="Proyecto Tema 5"');
        header('HTTP/1.1 401 Unauthorized');

        // Se muestra un mensaje y un enlace para volver a intentarlo.
        echo '<p>Usuario o contraseña incorrectos.</p>';
        echo '<p><a href="' . $_SERVER['PHP_SELF'] . '">Volver a intentarlo</a></p>';

        // Se detiene la ejecución del programa.
        exit;
    }
    ?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicio 2 - Control de acceso con PDO</title>
        <link rel="stylesheet" href="../webroot/css/estilos.css">
    </head>
    <body>
        <header>
            <h1>Control de acceso mediante header() y PDO</h1>
        </header>
        <main>
            <?php
            // Si se ha producido un error al conectar con la base de datos,
            // se muestra el código y el mensaje del error.
            if ($mensajeError !== null) {
                echo '<p>Error de conexión: ' . $mensajeError . '</p>';
            } else {
                // Si la identificación ha sido correcta, se muestran los datos del usuario.
                echo '<h2>Identificación correcta</h2>';
                echo '<p>Bienvenido/a: ' . $usuarioBD['T01_DescUsuario'] . '</p>';
                echo '<p>Código de usuario: ' . $usuarioBD['T01_CodUsuario'] . '</p>';
                echo '<p>Perfil: ' . $usuarioBD['T01_Perfil'] . '</p>';
                echo '<p>Número de conexiones: ' . $usuarioBD['T01_NumConexiones'] . '</p>';
                echo '<p>Última conexión: ' . $usuarioBD['T01_FechaHoraUltimaConexion'] . '</p>';
            }
            ?>
        </main>
        <footer>
            <p>2026-27 IES Los Sauces. © Todos los derechos reservados. Yolanda Rodríguez Moreno</p>
            <time datetime="2026-11-09">Última actualización: 09 de Noviembre de 2026</time>
        </footer>
    </body>
</html>