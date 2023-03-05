<?php

class ControladorCancion{


public static function render($token){
    VistaCancion::mostrarCancion($token);
}

public static function top($token){
    VistaCancion::mostrarTop($token);
}

public static function actuPuntu($token,$id,$puntuacion){
    VistaCancion::actuPuntu($token,$id,$puntuacion);
}


}


?>