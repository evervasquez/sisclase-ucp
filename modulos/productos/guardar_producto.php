<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$nombre = $_POST["nombre"];
$stock = $_POST["stock"];
$categoria_id = $_POST["categoria_id"];
$sexo = $_POST["sexo"];
$activo = 1;
$is_igv = 1;
$mensaje = "La categoria se ingreso correctamente";
$id = $_POST["id"];

if (!isset($_POST["activo"])) {
    $activo = 0;
}

if (!isset($_POST["is_igv"])) {
    $is_igv = 0;
}

require_once '../../database/conexion.php';

$query = "INSERT INTO productos "
        . "(nombre, stock, categoria_id, is_igv, activo, sexo) "
        . "VALUES('" . $nombre . "', " . $stock . ", " . $categoria_id . ", " . $is_igv . ", " . $activo . ", '" . $sexo . "')";

if (!empty($id)) {
    $query = "UPDATE productos SET "
            . "nombre='" . $nombre . "', "
            . "stock=" . $stock . ", "
            . "categoria_id=" . $categoria_id . ", "
            . "is_igv=" . $is_igv . ", "
            . "activo=" . $activo . ", "
            . "sexo='" . $sexo . 
            "' WHERE producto_id=" . $id;
    $mensaje = "La categoria se edito correctamente";
}


$result = mysql_query($query) or die("hubo un error al hacer la consulta" . mysql_error());
?>

<script type="text/javascript">
    var mensaje = '<?php echo $mensaje ?>';
    alert(mensaje);
    location.href = "index.php";
</script>