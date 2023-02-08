<?php

    class ControladorLogin {

        public static function mostrarFormularioLogin() {
            VistaLogin::mostrarFormularioLogin("");
        }

        public static function mostrarFormularioLoginError() {
            VistaLogin::mostrarFormularioLogin("Error de login, prueba otra vez");
        }


        public static function chequearLogin($email, $password) {

            require_once('vendor/autoload.php');
            $client = new \GuzzleHttp\Client();
            $_SESSION["token"]="";
            $response = $client->request('POST', 'http://ipAmazon:3000/api/login', [
                'body' => '{"email":"'.$email.'","password":"'.$password.'"}',
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ],
            ]);
     
            $respuesta = $response->getBody();
            $var = json_decode($respuesta,true);

            //Error login
            if ($var == "Email o password incorrectos") {
                echo "<script>window.location='enrutador.php?accion=error';</script>";
            }else {
                $_SESSION["token"] = $var;
                echo "<script>window.location='enrutador.php?accion=mostrarCancion';</script>";
            }


        }


    }

?>