<?php
class VistaCancion
{
    public static function mostrarCancion($token)
    {
        require_once('vendor/autoload.php');

        $guzzle = new GuzzleHttp\Client(['base_uri' => 'ipAmazon:3000']);
        $response = $guzzle->get('api/list', [
            'headers' => ['Authorization' => $token]
        ])->getBody();
        $data = json_decode($response);
        echo '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        ';

        echo '<nav class="navbar navbar-dark bg-dark mb-5">
        <a class="navbar-brand text-light" href="#">Canciones</a>
        <a class="nav-link text-light btn btn-success mx-5" href="enrutador.php?accion=mostrarTop">Mostrar top <span class="sr-only"></span></a>

      </nav>';
        //echo '<a href="enrutador.php?accion=mostrarTop" class="btn btn-warning">MOSTRAR TOP</a>';
        echo '<table class="table table-dark table-striped-columns">
            <tr>
                <td>TITULO</td>
                <td>GRUPO</td>
                <td>DURACION</td>
                <td>AÑO</td>
                <td>GENERO</td>
                <td>PUNTUACION</td>
                <td></td>
                <td></td>
            </tr>';
        foreach ($data as $key) {


            echo '<tr>
            <td>' . $key->titulo . '</td>
            <td>' . $key->grupo . '</td>
            <td>' . $key->duracion . '</td>
            <td>' . $key->anio . '</td>
            <td>' . $key->genero . '</td>
            <td>' . $key->puntuacion . '</td>
            <td>
            <form action="enrutador.php?accion=actuPuntu&id='.$key->_id.'" method="post">
            <input type="range" name="rango" min=1 max=5>
            </td>
            <td>
            <button class="btn btn-danger">Valorar</button>
            </td>
            </form>
            
            </tr>';
        }
        echo '</table>';
    }


    public static function mostrarTop($token)
    {
        require_once('vendor/autoload.php');

        $guzzle = new GuzzleHttp\Client(['base_uri' => 'ipAmazon:3000']);
        $response = $guzzle->get('api/top', [
            'headers' => ['Authorization' => $token]
        ])->getBody();
        $data = json_decode($response);
        echo '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        ';
        echo '<nav class="navbar navbar-dark bg-dark mb-5">
        <a class="navbar-brand text-light" href="#">Canciones</a>
        <a class="nav-link text-light btn btn-success mx-5" href="enrutador.php?accion=mostrarCancion">Mostrar canciones <span class="sr-only"></span></a>

      </nav>';
        echo '<table class="table table-dark table-striped-columns">
            <tr>
                <td>TITULO</td>
                <td>GRUPO</td>
                <td>DURACION</td>
                <td>AÑO</td>
                <td>GENERO</td>
                <td>PUNTUACION</td>
                
            </tr>';
        foreach ($data as $key) {


            echo '<tr>
            <td>' . $key->titulo . '</td>
            <td>' . $key->grupo . '</td>
            <td>' . $key->duracion . '</td>
            <td>' . $key->anio . '</td>
            <td>' . $key->genero . '</td>
            <td>' . $key->puntuacion . '</td>
            </tr>';
        }
        echo '</table>';
    }

    public static function actuPuntu($token,$id,$puntuacion){

        require_once('vendor/autoload.php');

       $client = new \GuzzleHttp\Client();
       $response = $client->request('PUT', 'http://ipAmazon:3000/api/puntuacion/'.$id, [
        'body' => '{"puntuacion":"'.$puntuacion.'"}',
           'headers' => [
               'accept' => 'application/json',
               'content-type' => 'application/json',
               'authorization' => $token
           ],
       ]);

       $respuesta = $response->getBody();
       $var = json_decode($respuesta, true);
       echo "<script>window.location='enrutador.php?accion=mostrarCancion';</script>";


    }
}
