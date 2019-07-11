<?php
session_start();
include_once "./db.php";

$sentencia = $base_de_datos->prepare("select * from curso;");
$sentencia->execute();
$curso = $sentencia->fetch(PDO::FETCH_OBJ);
if($curso === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alumno</title>


    <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">


</head>
<body>


    <nav class="red">
        <div class="nav-wrapper container">
            <a href="#" class="brand-logo right">Estudiante</a>
            <a href="#" data-target="menu-responsive" class="sidenav-trigger">
                <i class="material-icons">menu</i>
            </a>
            <ul class="left hide-on-med-and-down">
                <li><a href="curso.php">Cursos</a></li>
            </ul>
            <ul class="sidenav" id="menu-responsive">
                <li><a href="curso.php">Curso</a></li>
            </ul>
        </div>
    </nav>

    <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


    <script>
       document.addEventListener('DOMContentLoaded', function() {
                 M.AutoInit();
            }
        );
    </script>


</body>
</html>
