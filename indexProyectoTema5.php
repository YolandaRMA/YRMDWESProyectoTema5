<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ejercicios Tema 4</title>
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <style>
            table:first-of-type {
                width: 50%;
                margin: 0 auto;
            }

            table:first-of-type th,
            table:first-of-type td {
                padding: 9px 16px;
            }
        </style>
    </head>

    <body>

        <header>
            <h1>TÉCNICAS DE ACCESO A DATOS EN PHP</h1>
        </header>

        <main>
            <table>
                <thead>
                    <tr>
                        <th>Scripts</th>
                        <th>Ver código</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Creación</td>
                        <td><a href="./mostrarcodigo/muestraScriptCrea.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>Carga inicial</td>
                        <td><a href="./mostrarcodigo/muestraScriptCarga.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>Eliminación</td>
                        <td><a href="./mostrarcodigo/muestraScriptDelete.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>Config home</td>
                        <td><a href="./mostrarcodigo/muestraConfigHome.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>config</td>
                        <td><a href="./mostrarcodigo/muestraConfig.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>Modelo fisico de datos</td>
                        <td><a href="./doc/modeloFisico.PNG" target="_blank">imagenn</a></td>
                    </tr>
                </tbody>
            </table>
            <br>
            <br>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>N.º</th>
                        <th>Ejercicio</th>
                        <th>Ejecutar PDO</th>
                        <th>Código PDO</th>                       
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>0</td>
                        <td>0. Mostrar el contenido de las variables superglobales y phpinfo().</td>
                        <td><a href="./codigoPHP/detalle.php">Ejecutar</a></td>
                        <td><a href="./mostrarcodigo/muestraDetalle.php">Código</a></td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td> Desarrollo de un control de acceso con identificación del usuario basado en la función header().</td>
                        <td><a href="./codigoPHP/ejercicio01PDO.php">Ejecutar</a></td>
                        <td><a href="./mostrarcodigo/muestraEjercicio01PDO.php">Código</a></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Control de acceso con identificación del usuario función header() y
                        tabla “Usuario” de la base de datos. </td>
                        <td><a href="./codigoPHP/ejercicio02PDO.php">Ejecutar</a></td>
                        <td><a href="./mostrarcodigo/muestraEjercicio02PDO.php">Código</a></td>
                    </tr>
                    
                </tbody>
            </table>
        </main>
        <footer>
            <p><a href="../YRMDWESProyectoDWES/indexProyectoDWES.php">Home</a></p>
            <div class="footer-text">
                <p>2026-27 IES Los Sauces. &copy; Todos los derechos reservados.<a href="../index.html">Yolanda Rodríguez Moreno</a></p>
                <time datetime="2026-09-30">Última actualización: 05 de Octubre de 2026</time>
            </div>
        </footer>
    </body>
</html>