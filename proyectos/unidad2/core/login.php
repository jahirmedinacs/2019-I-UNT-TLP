<?php
session_start();

$_SESSION["userid"] = $_POST["userid"];
$_SESSION["password"] = $_POST["password"];

include_once "./db.php";
?>
<!DOCTYPE html>
  <html>
    <head>
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <?php
      
      $nivel_privilegio = oneelementquery($base_de_datos, "SELECT tipo FROM usuario WHERE userid = ?;", $_SESSION["userid"]);
      $nombre = oneelementquery($base_de_datos, "SELECT concat(nombre, ' ' , primerapellido) FROM usuario WHERE userid = ?;", $_SESSION["userid"]);

      switch($nivel_privilegio){
        case 1: 
        echo "
        </br>
        </br>
        <hr>
        <center>
          <h1>Bienvenido Alumno <i>$nombre</i></h1>
          </br>
          <a href=\"./alumno.php\"><i>redireccionando en 3 seg, click aqui para redirigar ahora</i></a>
          <script>
            var timer = setTimeout(function() {
                window.location='./alumno.php'
            }, 3000);
          </script>
        </center>
        </br>
        <hr>
        ";

        break;
        case 2:
        echo "
        </br>
        </br>
        <hr>
        <center>
          <h1>Bienvenido Profesor <i>$nombre</i></h1>
          </br>
          <a href=\"./profesor.php\"><i>redireccionando en 3 seg, click aqui para redirigar ahora</i></a>
          <script>
            var timer = setTimeout(function() {
                window.location='./profesor.php'
            }, 3000);
          </script>
        </center>
        </br>
        <hr>
        ";
        break;
        
        case 3:
        echo "
        </br>
        </br>
        <hr>
        <center>
          <h1>Bienvenido Administrador <i>$nombre</i></h1>
          </br>
          <a href=\"./admin.php\"><i>redireccionando en 3 seg, click aqui para redirigar ahora</i></a>
          <script>
            var timer = setTimeout(function() {
                window.location='./admin.php'
            }, 3000);
          </script>
        </center>
        </br>
        <hr>
        ";

        break;

        default :
        echo "
        </br>
        </br>
        <hr>
        <center>
          <h1>ERROR 403 - Acceso no Permitido</h1>
          <script>
            var timer = setTimeout(function() {
                window.location='../index.php'
            }, 3000);
          </script>
        </center>
        </br>
        <hr>
        ";
        break;
      }

      ?>

    
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>