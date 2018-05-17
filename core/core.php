<?php
 /*
  * NUCLEO DE LA APLICACION
  */
  session_start();
  date_default_timezone_set('America/Los_Angeles');

  #CONSTANTES DE CONEXION
  define('DB_DRIVER', 'mysql');
  define('DB_HOST', '127.0.0.1');
  define('DB_USER', 'root');
  define('DB_PASS', '');
  define('DB_NAME', 'realestate');

  #CONSTANTES DE LA APP
  define('HTML_DIR', 'html/');
  define('APP_URL', 'http://127.0.0.1/RealEstateBackend/');
  define('APP_TITLE', 'Real Estate');
  define('APP_COPYRIGHT', 'Copyright © REAL ESTATE '. date('Y',time()));
  define('IMAGEN_USER_DIR','views/app/images/usuarios/');

  #ESTRUCTURA
  require('vendor/autoload.php');
  require('core/models/classConection.php');
  require('core/bin/functions/Encrypt.php');
  require('core/bin/functions/Users.php');
  require('core/bin/functions/Propiedades.php');

  $users = Users();
  $roles = Roles();

?>