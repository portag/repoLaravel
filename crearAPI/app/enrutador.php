<?php
    session_start();

    //AUTOLOAD
    function autocarga($clase){ 
        $ruta = "./controlador/$clase.php"; 
        if (file_exists($ruta)){ 
          include_once $ruta; 
        }

        $ruta = "./vista/usuario/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

        $ruta = "./vista/cancion/$clase.php"; 
        if (file_exists($ruta)){ 
            include_once $ruta; 
        }

    } 
    
    spl_autoload_register("autocarga");


    //Función para filtrar los campos del formulario
    function filtrado($datos){
        $datos = trim($datos); // Elimina espacios antes y después de los datos
        $datos = stripslashes($datos); // Elimina backslashes \
        $datos = htmlspecialchars($datos); // Traduce caracteres especiales en entidades HTML
        return $datos;
    }

    if ($_REQUEST) {
        if (isset($_REQUEST['accion'])) {
            //Mostrar series

            if ($_REQUEST['accion'] == "inicio") {
                ControladorLogin::mostrarFormularioLogin();
            }
    
            //Inicio - error de login
            if ($_REQUEST['accion'] == "error") {
                ControladorLogin::mostrarFormularioLoginError();
            }
            //CheckLogin
            if ($_REQUEST['accion'] == "checkLogin") {
                $email = filtrado($_REQUEST['email']);
                $password = filtrado($_REQUEST['password']);
                ControladorLogin::chequearLogin($email, $password);
            }
 
            //FUNCION GENERAR ARTICULO y MOSTRARLO
            if ($_REQUEST['accion'] == "mostrarCancion") {
                $token=implode($_SESSION["token"]);
                ControladorCancion::render($token);
            }

            if($_REQUEST["accion"] == "mostrarTop"){
                $token=implode($_SESSION["token"]);
                ControladorCancion::top($token);
            }

            if($_REQUEST["accion"] == "actuPuntu"){
                $token=implode($_SESSION["token"]);
                $puntuacion=$_REQUEST["rango"];
                $id=$_REQUEST["id"];
                //var_dump($puntuacion);
                //var_dump($id);
                ControladorCancion::actuPuntu($token,$id,$puntuacion);
            }
            
           
                

        }
    }





?>