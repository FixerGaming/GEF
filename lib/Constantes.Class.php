<?php

setlocale(LC_TIME, 'es_AR.utf8');

/**
 *
 * Clase para mantener las directivas de sistema.
 * Deben coincidir con las configuraciones del proyecto.
 *
 * @author Eder dos Santos <esantos@uarg.unpa.edu.ar>
 *
 */
/**
 *  /var/www/html/uargflow//
 */
class Constantes {


    const NOMBRE_SISTEMA = "UARGFlow BS";

    const WEBROOT = "C:/xampp/htdocs/uargflow";
    const APPDIR = "uargflow";

    const SERVER = "http://localhost";
    const APPURL = "http://localhost/uargflow";
    const HOMEURL = "http://localhost/uargflow/app/index.php";
    const HOMEAUTH = "http://localhost/uargflow/app/usuarios.php";

    const BD_SCHEMA = "bdusuarios";
    const BD_USERS = "bdusuarios";

}
