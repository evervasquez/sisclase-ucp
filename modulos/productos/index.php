<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>MODULO PRODUCTOS</h1>
        <a href="form.php?action=Crear">Crear Producto</a>
        <?php
        include_once '../../database/conexion.php';
        
        $query = "SELECT productos.*, categoria_productos.nombre as categoria "
                . "FROM productos "
                . "INNER JOIN categoria_productos "
                . "ON productos.categoria_id=categoria_productos.id "
                . "ORDER BY productos.nombre DESC";
        
        $result = mysql_query($query)
                or die("hubo un error al hacer la consulta" . mysql_error());
        ?>

        <table border="1">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>STOCK</th>
                <th>CATEGORIA</th>
                <th>IGV</th>
                <th>SEXO</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            <?php
            while ($producto = mysql_fetch_array($result, MYSQL_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $producto["producto_id"] ?></td>
                    <td><?php echo $producto["nombre"] ?></td>
                    <td><?php echo $producto["stock"] ?></td>
                    <td><?php echo $producto['categoria'] ?></td>
                    <td><?php echo ($producto["is_igv"] ==0) ? "Inactivo": "Activo" ?></td>
                    <td><?php echo ($producto["sexo"]=='M') ? "Masculino": "Femenino" ?></td>
                    <td><?php echo ($producto["activo"]==0) ? "Inactivo" : "Activo" ?></td>
                    <td><a style="margin: 5px" href="form.php">Editar</a><a href="eliminar_producto.php">Eliminar</a></td>
                </tr>
            <?php } ?>
        </table>
    </body>
</html>
