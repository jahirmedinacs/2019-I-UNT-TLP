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
      <div class="container">
        <div class="row">
          <div class="col s12">
            <h1>Panel de Control</h1>
          </div>
          <div class="col s3 m2 card-panel teal z-depth-1">
            <center>
            <h5>
            <?php echo $_SESSION["userid"];?>
            </h5>
            </center>
          </div>
          <div class="col s3 m2 card-panel teal z-depth-1">
            <center>
            <h5>Conectado</h5>
            </center>
          </div>
        </div>
          
        
        <div class="row">
          <div class="col s8 offset=s2 m2 card-panel teal z-depth-2">
            <center>
            <h6>
            <a href="">M1odificar Usuarios</a>
            </h6>
            </center>
          </div>
        </div>
        <div class="row">
          <div class="col s8 offset=s2 m2 card-panel teal lighten-1 z-depth-2">
            <center>
            <h6>
            <a href="cursos.php"><span class="blue-text text-darken-2">Modificar Cursos</span></a>
            </h6>
            </center>
          </div>
          </div>
          <div class="row">
          <div class="col s8 offset=s2 m2 card-panel teal lighten-2 z-depth-2">
            <center>
            <h6>
            <a href="">Modificar Matricula</a>
            </h6>
            </center>
          </div>
        </div>
      
      </div>
      <!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>