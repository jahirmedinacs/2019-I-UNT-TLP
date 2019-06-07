<?php

session_start();

$password=$_SESSION["password"];
$usuario =$_SESSION["userid"];
$nombre_base_de_datos = "registroNotas";

try{
    $base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $password);
    $base_de_datos->query("set names utf8;");
    $base_de_datos->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base_de_datos->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
    echo "<h1> ERROR EN LA CONEXION - 403</h1>
    </br>
    </br>
    <hr>
    <center>
    <i>
    ";
    echo "Ocurrió algo con la base de datos: " . $e->getMessage();
    echo "
    </i>
    </center>
    <hr>
    </br>
    <script>
        var timer = setTimeout(function() {
                window.location='../index.php'
        }, 3000);
    </script>
    <h4><a href=\"../index.php\">Regresar Ahora (Redirencionando en 3seg)</a></h4>
    ";
}

function oneelementquery($dbobj, $strquery, $oneparam){
    $sentencia = $dbobj->prepare($strquery);
    $sentencia->execute([$oneparam]);
    $temp = $sentencia->fetchALL()[0];
    $output = reset($temp);
    return $output;
}

?>
