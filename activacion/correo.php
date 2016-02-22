<?php

require'../clases/AutoCarga.php';
session_start();
$bd= new BaseDatos();
$gestor= new ManageUser($bd);
$email=Request::get("email");
$usuario= $gestor->get($email);
$alias_usuario=$usuario->getAlias();
$cadenaSha1=sha1($email.$usuario->getClave().Configuracion::SEED);
$clavedeactivacion='https://ajaxcalendario-ealvarez1990.c9users.io/activacion/activacion.php?clave='.$cadenaSha1.'&email='.$email;
$origen = "info@manageuser.com";
$alias = "MANAGEUSER_APP";
$destino = $email;
$asunto = "Activacion de usuario";
$mensaje = "Su clave de activacion es: $clavedeactivacion";

require_once '../clases/Google/autoload.php';
require_once '../clases/class.phpmailer.php';  //las últimas versiones también vienen con autoload
$cliente = new Google_Client();
$cliente->setApplicationName('Activacion PHP');
$cliente->setClientId('795674432122-5j07qensgnr5fgijgb5ivaded1f2sf48.apps.googleusercontent.com');
$cliente->setClientSecret('8EoGzDfglc3ZveTCUDKGFsU_');
$cliente->setRedirectUri('http://...');
$cliente->setScopes('https://www.googleapis.com/auth/gmail.compose');
$cliente->setAccessToken(file_get_contents('token.conf'));

if ($cliente->getAccessToken()) {
    $service = new Google_Service_Gmail($cliente);
    try {
        $mail = new PHPMailer();
        $mail->CharSet = "UTF-8";
        $mail->From = $origen;
        $mail->FromName = $alias;
        $mail->AddAddress($destino);
        $mail->AddReplyTo($origen, $alias);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->preSend();
        $mime = $mail->getSentMIMEMessage();
        $mime = rtrim(strtr(base64_encode($mime), '+/', '-_'), '=');
        $mensaje = new Google_Service_Gmail_Message();
        $mensaje->setRaw($mime);
        $service->users_messages->send('me', $mensaje);
    } catch (Exception $e) {
        print($e->getMessage());
    }
}

//header('Location:../index.php');
 echo '{"altaU":true}';
