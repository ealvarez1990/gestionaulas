<?php
require '../clases/AutoCarga.php';
header('Content-Type: application/json');
$sesion = new Session();
$sesion->destroy();
if (!$sesion->isLogged()) {
    echo '{"logout":true}';
} else {
    echo '{"logout": false}';
    $sesion->destroy();
}
