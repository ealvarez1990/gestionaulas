<?php

class Controlador {

    private $id = NULL;

    static function handle() {
        $bd = new BaseDatos();
        $gestor = new ManageUser($bd);
        $sesion = new Session();
        $action = Request::req("action");
        $do = Request::req("do");
        $metodo = $action . ucfirst($do);

        if (!$sesion->isLogged()) {
            header("Location:../frontend/index.php");
            exit();
        } else {
            if ($sesion->getUser()->getPersonal() != 1 || $sesion->getUser()->getActivo() != 1) {
                //header("Location:../frontend/index.php");
                echo 'NO SESSION';
            } else {
                if (method_exists(get_class(), $metodo)) {
                    echo 'método existe: ';
                    self::$metodo($gestor);
                } else {
                    self::readView($gestor);
                }
            }
        }
        $bd->close();
    }

    private static function readView(ManageArtist $gestor) {
        $plantilla = new Template();
        $bd = new BaseDatos();
        $sesion = new Session();
        $usuario = $sesion->getUser();
        $gestorgalerias = new ManageGallery($bd);
        $vista = $plantilla->getContents("../_plantilla1/_index.html");


        $datos = array(
            "nav" => $nav,
            "work" => $trabajo,
            "edit" => $edit,
            "titulo" => $info,
            "nombre" => $alias,
            "descripcion" => $artista->getDescripcion(),
            "login" => "",
            "formulario" => "",
            "artistas" => "",
            "mensajes" => "$men",
            "profile" => $profile,
            "upload" => $upload,
            "gallery" => $elementos,
            "contact" => $contact,
        );
        echo $plantilla->insertTemplate($vista, $datos);
    }
}

