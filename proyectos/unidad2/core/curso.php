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
    <title>Curso</title>


</head>
<style type="text/css">
    table, th,td{
        border: 1px solid black;
        border-collapse: collapse;
    }
    th,td{
        padding: 5px;
    }
    th,td{
        text-align: center;
    }
</style>
<body>


    <h1>Lista de Cursos Matriculados</h1>
    <table style="width: 100%">
        <tr>
            <th>Codigo</th>
            <th>Curso</th>
            <th>Profesor</th>
            <th>Creditos</th>
        </tr>

    <?php
        $query = "SELECT DISTINCT curso.id , curso.nombre as 'nombrec', usuario.nombre , curso.creditos FROM registroGeneral INNER JOIN curso ON curso.id=registroGeneral.curso_id INNER JOIN usuario ON usuario.id=registroGeneral.usuario_id ";

        $consulta = $base_de_datos->prepare($query);
        $consulta -> execute();

        while($fil=$consulta->fetch(PDO::FETCH_ASSOC))
        {
            echo '
            <form action="nota.php" method="GET">
                <tr>
                        <td>'.$fil['id'].'</td>
                        <td>'.$fil['nombrec'].'</td>
                        <td>'.$fil['nombre'].'</td>
                        <td>'.$fil['creditos'].'</td>
                        <td><input type="submit" name="enviar" value="enviar"></td>
                </tr>
            </form>
            ';
        }
    ?>
    </table>
</body>
</html>
