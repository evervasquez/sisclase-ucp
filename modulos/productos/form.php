<html>
    <head>
        <title>Crear Producto</title>
    </head>
    <body>
        <h1>Crear Producto</h1>
        <form method="POST" action="guardar_producto.php">
            <p>Nombre:
                <label><input type="text" placeholder="Nombre" /></label>
            </p>

            <p>Stock:
                <label><input type="number" placeholder="Stock" /></label>
            </p>

            <p>Categoría:
                <label>
                    <select>
                        <option value="0">Seleccione...</option>
                    </select>
                </label>
            </p>

            <p>Sexo:
                <label>
                    <select>
                        <option value="0">Seleccione...</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </label>
            </p>

            <p>IGV:
                <label><input type="checkbox"/></label>
            </p>

            <p>Activo:
                <label><input type="checkbox"/></label>
            </p>
        </form>
    </body>
</html>

