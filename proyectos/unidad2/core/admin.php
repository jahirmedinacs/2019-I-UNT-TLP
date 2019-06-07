<?php
include_once "./db.php";
?>
<!DOCTYPE html>
<script>
    $('.datepicker').pickadate({
    selectMonths: true, 
    selectYears: 15,
    format: 'dd/mm/yyyy'
  });
  
  $(function(){
    console.log(new Date().toISOString().substring(0,10))
  })
</script>
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
        $nombre = oneelementquery($base_de_datos, "SELECT concat(nombre, ' ' , primerapellido) FROM usuario WHERE userid = ?;", $_SESSION["userid"]);
        ?>
        <div>
            <h6><b><a href="./admin.php">Admin</a> : </b><i><?php echo $nombre; ?></i></h6>
        </div>
        
        <div class="collection">
        <a href="./admin.php?option=1" class="collection-item">Crear Usuario</a>
        <a href="./admin.php?option=2" class="collection-item">Crear Curso</a>
        <a href="./admin.php?option=3" class="collection-item">Modificar Usuario</a>
        <a href="./admin.php?option=4" class="collection-item">Modificar Curso</a>
        <a href="./admin.php?option=5" class="collection-item">Realizar Matricula</a>
        </div>
        
        <center>
            </br>
            <hr>
            <hr>
        </center>
        </br>
        </br>
        <?php
        if(!isset($_GET["option"])) exit();
        $option = $_GET["option"];
        
        switch ($option) {
            case 1:
        ?>
<div class="row">
    <form class="col s12">
        <div class="row">
            <div class="input-field col s5">
            <input placeholder="Codigo" id="codigo" type="text" class="validate">
            <label for="codigo">Codigo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
            </div>
            <div class="input-field col s4">
            <input placeholder="Usuario" id="userid" type="password" class="validate">
            <label for="userid">Usuario</label>
            </div>
            <div class="input-field col s4">
            <input placeholder="Clave" id="password" type="password" class="validate">
            <label for="password">Clave</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Primer Nombre" id="first_name" type="text" class="validate" requierd>
            <label for="first_name">Primer Nombre</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Primer Apellido" id="last_name" type="text" class="validate" requierd>
            <label for="last_name">Primer Apellido</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Segundo Nombre" id="second_name" type="text" class="validate">
            <label for="second_name">Segundo Nombre</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Segundo Apellido"id="second_last_name" type="text" class="validate">
            <label for="second_last_name">Segundo Apellido</label>
            </div>
        </div>
        <div class="row">
        <div class="col s3">
            <label>Fecha de Nacimiento</label>
            <input type="date" name="fecha" class="datepicker" value="2001-09-11">
        </div>
        <div class="col s2">
        </div>
        <div class="col s3">
            <label>Tipo de Cuenta</label>
            </br>
            <select class="browser-default">
                <option value="" disabled selected>Selecciona un Tipo de Usuario</option>
                <option value="1">Alumno</option>
                <option value="2">Profesor</option>
                <option value="3">Administrador</option>
            </select>
        </div>
        </div>
    </form>
</div>
                <?php
                break;
            case 2:
                ?>
                2
                <?php
                break;
            case 3:
                ?>
                3
                <?php
                break;
            case 4:
                ?>
                4
                <?php
                break;
            case 5:
                ?>
                5
                <?php
                break;
            default:
                echo "
                </br>
                <hr>
                <h3>Opcion Invalida></h3>
                </br>
                </br>
                <hr>
                ";
        } 

        /*
        include_once "base_de_datos.php";
        $sentencia = $base_de_datos->prepare("DELETE FROM productos WHERE option = ?;");
        $resultado = $sentencia->execute([$option]);
        if($resultado === TRUE){
            header("Location: ./listar.php");
            exit;
        
        else echo "Algo salió mal";
        */
        ?>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
  </html>