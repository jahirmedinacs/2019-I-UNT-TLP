<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Notas</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
    <center>
        </br>
        <h1>Sistema de Registro y Reporte de Notas</h1>
        </br>
    </center>
    <form class="box" action="./core/login.php" method="post">
        <h1>Iniciar Sesion</h1>
        <input type="text" default=""  name="userid" placeholder="Usuario" required>
        <input type="password" default=""  name="password" placeholder="Clave" required>
        <input type="submit" name="submit" target="./core/login.php"  value="Iniciar Sesion">
    </form>
</body>
</html>
