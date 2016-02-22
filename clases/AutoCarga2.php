<?php

class AutoCarga2 {
    static public function cargar($clase) {
        $archivo = "clases/" . str_replace('\\', '/', $clase) . ".php";
        
        if(file_exists($archivo)){
            require $archivo;
        }else{
             $archivo = "clases/" . str_replace('\\', '/', $clase) . ".php";
        }
    }
}
spl_autoload_register('AutoCarga2::cargar');
