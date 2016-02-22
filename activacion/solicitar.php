<?php

session_start();

require_once '../clases/Google/autoload.php';

$cliente = new Google_Client();
$cliente->setApplicationName('LecturaDeCorreos');
$cliente->setClientId('795674432122-5j07qensgnr5fgijgb5ivaded1f2sf48.apps.googleusercontent.com');
$cliente->setClientSecret('8EoGzDfglc3ZveTCUDKGFsU_');
$cliente->setRedirectUri('https://ajaxcalendario-ealvarez1990.c9users.io//activacion/guardar.php');
$cliente->setScopes('https://mail.google.com/');
$cliente->setAccessType('offline');

if (!$cliente->getAccessToken()) {
   $auth = $cliente->createAuthUrl(); //solicitud
   header("Location: $auth");
}