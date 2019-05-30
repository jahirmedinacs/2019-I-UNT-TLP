<?php include_once "encabezado.php" ?>
<?php
include_once "base_de_datos.php";
$sentencia = $base_de_datos->query("SELECT * FROM productos;");
$productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
    <div class="col-xs-12">
        <h1>Productos</h1>
        <div>
            <a class="btn btn-success" href="./formulario.php">Nuevo <i class="fa fa-plus"></i></a>
        </div>
        <br>
        <table> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Código</th>
                    <th>Descripción</th>
                    <th>Precio de compra</th>
                    <th>Precio de venta</th>
                    <th>Existencia</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($productos as $producto){ ?>
                <tr>
                    <td><?php echo $producto->id ?></td>
                    <td><?php echo $producto->codigo ?></td>
                    <td><?php echo $producto->descripcion ?></td>
                    <td><?php echo $producto->precioCompra ?></td>
                    <td><?php echo $producto->precioVenta ?></td>
                    <td><?php echo $producto->existencia ?></td>
                    <td><a href="<?php echo "editar.php?id=" . $producto->id?>">Editar</a></td>
                    <td><a href="<?php echo "eliminar.php?id=" . $producto->id?>">Eliminar</a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php include_once "pie.php" ?>
