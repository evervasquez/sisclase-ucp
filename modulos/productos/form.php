<html>
    <head>
        <title><?php echo $_GET['action'] ?> Producto</title>
    </head>
    <body>
        <?php
        require_once '../../database/conexion.php';
        
        //selects sexo
        $selected_m = "";
        $selected_f = "";
        $selected_o = "";

        $query_categorias = "SELECT * FROM categoria_productos";

        $result2 = mysql_query($query_categorias);
        
        if (isset($_GET['id'])) {
            //requerimos la conexion
            //recuperamos id
            $producto_id = $_GET['id'];
            //creamos la consulta
            $query_producto = "SELECT * FROM productos WHERE producto_id=" . $producto_id;
            
            //hacemos la consulta a la base de datos
            $result = mysql_query($query_producto);
             
            //recuperamos los resultados de la base de datos
            $producto = mysql_fetch_array($result, MYSQLI_ASSOC);
            
            $checked_activo = "checked";
            $checked_is_igv = "checked";
            
            if (!$producto['activo']) {
                $checked_activo = "";
            }
            
            if (!$producto['is_igv']) {
                $checked_is_igv = "";
            }
            
            //logica de escoger el sexo
            if($producto['sexo']=='M'){
                $selected_m = 'selected';
            }else if($producto['sexo']== 'F'){
                $selected_f = 'selected';
            }else if($producto['sexo' == 'O']){
                $selected_o = 'selected';
            }
            
        } else {
            //estados por defectos de los checkeds
            $checked_activo = "checked";
            $checked_is_igv = "";
        }
        ?>
        <h1><?php echo $_GET['action'] ?> Producto</h1>
        <form method="POST" action="guardar_producto.php">
            <input type="hidden" name="id" value="<?php
            if (isset($_GET['id'])) {
                echo $producto_id;
            }
            ?>"/>
            <p>Nombre:
                <label><input type="text" name="nombre"placeholder="Nombre" value="<?php
                    if (isset($_GET['id'])) {
                        echo $producto['nombre'];
                    }
                    ?>" required />
                </label>
            </p>

            <p>Stock:
                <label><input type="number" placeholder="Stock" name="stock" required value="<?php
                    if (isset($_GET['id'])) {
                        echo $producto['stock'];
                    }
                    ?>" /></label>
            </p>

            <p>Categoría:
                <label>
                    <select name="categoria_id">
                        <option value="0">Seleccione...</option>
                        <?php while ($categoria = mysql_fetch_array($result2, MYSQL_ASSOC)) { 
                            $selected_categoria = "";
                            if($producto['categoria_id'] == $categoria["id"]){
                                $selected_categoria = "selected";
                            }
                            ?>
                        <option <?php echo $selected_categoria ?> value="<?php echo $categoria["id"] ?>" ><?php echo $categoria["nombre"] ?></option>                        
                        <?php } ?>
                    </select>
                </label>
            </p>

            <p>Sexo:
                <label>
                    <select name="sexo">
                        <option value="0" >Seleccione...</option>
                        <option value="M" <?php echo $selected_m ?> >Masculino</option>
                        <option value="F" <?php echo $selected_f ?> >Femenino</option>
                        <option value="O" <?php echo $selected_o ?> >Otros</option>
                    </select>
                </label>
            </p>

            <p>IGV:
                <label><input type="checkbox" <?php echo $checked_is_igv; ?> name="is_igv"/></label>
            </p>

            <p>Activo:
                <label><input type="checkbox" <?php echo $checked_activo; ?> name="activo"/></label>
            </p>
            <p>
                <input type="submit" value="<?php echo $_GET['action'] ?>" >
                <input type="button" value="Retornar" onclick="retornar()"> 
            </p>
        </form>
        <script>
            function retornar(){
                location.href = "http://localhost/sisclase/modulos/productos/index.php";
            }
        </script>
    </body>
</html>

