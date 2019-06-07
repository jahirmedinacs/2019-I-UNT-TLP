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
        <a href="./admin.php?option=0" class="collection-item">Salir</a>
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
            case 0:
            ?>
            <?php
            session_destroy();
            ?>
            <center>
                <h3>Adios</h3>
            </center>
            <script>
            var timer = setTimeout(function() {
                window.location='../index.php'
            }, 1000);
            </script>
            <?php
                break;
            case 1:
        ?>

<div class="row">
    <form class="col s12" action="" method="post">
        <div class="row">
            <div class="input-field col s5">
            <input placeholder="Codigo" name="codigo" id="codigo" type="text" class="validate">
            <label for="codigo">Codigo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
            </div>
            <div class="input-field col s4">
            <input placeholder="Usuario" name="userid" id="userid" type="password" class="validate">
            <label for="userid">Usuario</label>
            </div>
            <div class="input-field col s4">
            <input placeholder="Clave" name="password" id="password" type="password" class="validate">
            <label for="password">Clave</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Primer Nombre" name="nombre1" id="first_name" type="text" class="validate" requierd>
            <label for="first_name">Primer Nombre</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Primer Apellido" name="apellido1" id="last_name" type="text" class="validate" requierd>
            <label for="last_name">Primer Apellido</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
            <input placeholder="Segundo Nombre" name="nombre2" id="second_name" type="text" class="validate">
            <label for="second_name">Segundo Nombre</label>
            </div>
            <div class="input-field col s6">
            <input placeholder="Segundo Apellido" name="apellido2" id="second_last_name" type="text" class="validate">
            <label for="second_last_name">Segundo Apellido</label>
            </div>
        </div>
        <div class="row">
            <div class="col s3">
                <label>Fecha de Nacimiento</label>
                <input type="date" name="fecha" class="datepicker" value="2001-09-11">
            </div>
            <div class="col s2"></div>
            <div class="col s3">
                <label>Tipo de Cuenta</label>
                </br>
                <select name="tipo" class="browser-default">
                    <option value="" disabled selected>Selecciona un Tipo de Usuario</option>
                    <option value="1">Alumno</option>
                    <option value="2">Profesor</option>
                    <option value="3">Administrador</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col s6"></div>
            <div class="col s3">
                <a href="./admin.php" class="button">Cancelar</a>
            </div>
            <div class="col s3">
                <input type="submit" name="addusuario"/>
            </div>
        </div>
    </form>
</div>
<?php
if(isset($_POST['addusuario'])){
    $base_de_datos->beginTransaction();

    $querystr = "INSERT INTO usuario(nombre, codigo, primerapellido, segundoapellido, segundonombre, nacimiento, tipo, userid) VALUES
	(?, ?, ?, ?, ?, ?, ?, ?);";
    $query_vars = [$_POST["nombre1"], $_POST["codigo"], $_POST["apellido1"], $_POST["apellido2"], $_POST["nombre2"], $_POST["fecha"], $_POST["tipo"], $_POST["userid"]];
    $sentencia = $base_de_datos->prepare($querystr);
    $estado =  $sentencia->execute($query_vars);
    if($estado){
        $querystr="CREATE USER '".$_POST["userid"]."'@'localhost' IDENTIFIED BY '".$_POST["password"]."';";
        $sentencia = $base_de_datos->prepare($querystr);
        $is_done1 = $sentencia->execute($query_vars);
        
        $querystr="GRANT ALL PRIVILEGES ON * . * TO '".$_POST["userid"]."'@'localhost' IDENTIFIED BY '".$_POST["password"]."' WITH GRANT OPTION;";
        $sentencia = $base_de_datos->prepare($querystr);
        $is_done2 = $sentencia->execute($query_vars);

        $querystr="GRANT CREATE USER on *.* TO '".$_POST["userid"]."'@'localhost' IDENTIFIED BY '".$_POST["password"]."' WITH GRANT OPTION;";
        $sentencia = $base_de_datos->prepare($querystr);
        $is_done3 = $sentencia->execute($query_vars);
        
        echo "$is_done1   $is_done2   $is_done3";

        if($is_done1 && $is_done2 && $is_done3){
            $base_de_datos->commit();

            $base_de_datos->prepare("FLUSH PRIVILEGES;")->execute();
            
            echo "<center>
            </br>
            </br>
            <p style=\"color:green;\">Usuario nuevo agregado exitosamente</p>
            </center>";
        }
        else{
            
            $base_de_datos->rollBack();

            echo "<center>
            </br>
            </br>
            <p style=\"color:red;\">Error al generar privilegios</p>
            </center>";
        }
        
    }
    else{
        echo "<p style=\"color:red;\">Error al guardar usuario nuevo</p>";
    }
}

?>

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