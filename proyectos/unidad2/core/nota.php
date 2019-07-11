<?php
session_start();
include_once "../db.php";

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
    <title>Nota</title>

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
    <h1>Curso de Matematicas</h1>
    <table style="width: 100%">
        <tr>
            <th rowspan="2">Codigo</th>
            <th rowspan="2">Nombre</th>
            <th colspan="6">Notas del Curso</th>
        </tr>
        <tr>
            <td>Primera Revision</td>
            <td>Segunda Revision</td>
            <td>Examen Parcial</td>
            <td>Nota Final</td>
            <td>Nota Promocional</td>
        </tr>

        <?php
            $query = "SELECT usuario.codigo , usuario.nombre ,
                     nota.primerarevision , nota.segundaversion , nota.parcial , nota.final
                     , nota.promocional  FROM registroGeneral INNER JOIN usuario ON usuario.id=registroGeneral.usuario_id INNER JOIN nota ON nota.id=registroGeneral.nota_id INNER JOIN curso on curso.id=registroGeneral.curso_id WHERE curso.id='3'";


                    $consulta = $base_de_datos->prepare($query);
					$consulta->execute();

                    while($fila=$consulta->fetch(PDO::FETCH_ASSOC))
                    {
                        echo'
                        <tr>
							<td>'.$fila['codigo'].'</td>
                            <td>'.$fila['nombre'].'</td>
                            <td>'.$fila['primerarevision'].'</td>
                            <td>'.$fila['segundaversion'].'</td>
                            <td>'.$fila['parcial'].'</td>
                            <td>'.$fila['final'].'</td>
                            <td>'.$fila['promocional'].'</td>
                        </tr>

                        ';
                    }
        ?>

	</table>
</body>
</html>
