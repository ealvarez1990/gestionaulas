<?php

session_start();

require_once '../clases/Google/autoload.php';
$cliente = new Google_Client();
$cliente->setApplicationName('LecturaDeCorreos');
$cliente->setClientId('795674432122-5j07qensgnr5fgijgb5ivaded1f2sf48.apps.googleusercontent.com');
$cliente->setClientSecret('8EoGzDfglc3ZveTCUDKGFsU_');
$cliente->setRedirectUri('https://gestionusuario-ealvarez1990.c9users.io/activacion/guardar.php');
$cliente->setScopes('https://mail.google.com/');
$cliente->setAccessType('offline');

if (isset($_GET['code'])) {
   $cliente->authenticate($_GET['code']);
   $_SESSION['token'] = $cliente->getAccessToken();
   $archivo = "token.conf";
   $fh = fopen($archivo, 'w') or die("error");
   fwrite($fh, $cliente->getAccessToken()); //almacenamiento del token
   fclose($fh);
}