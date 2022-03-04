<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Elección de la Localidad</title>
</head>
<body>
    <?php
        include 'conexion_BD.php';
        $conexion = mysqli_connect($servidor, $usuario, $clave, $base_datos)
                    or die("No se ha podido establecer la conexión");
        $_GET['provincias'];
        $consulta = "select l.nombre from provincias p, localidades l where p.n_provincia = l.n_provincia and p.nombre = '{$_GET['provincias']}' order by nombre;";
        $resultado = mysqli_query($conexion, $consulta);
        $num_filas = mysqli_num_rows($resultado);

        if ($num_filas > 0){
    ?>  
    <form action="localidades.php">
        <label for="localidad">Elija la localidad deseada</label>
        <select name="localidad">
            <?php
                while ($fila= mysqli_fetch_assoc ($resultado))
                    echo "<option value = '{$fila["nombre"]}'> {$fila["nombre"]} </option>";
            ?>
        </select>
        <button onclick="Habitantes()">Buscar localidades</button>
        
            <script>
                
                    function Habitantes {

                        <?php
                            $consulta_habitantes="select poblacion, nombre from localidades where nombre = '{$_GET['localidades']};'"
                                if (isset ($_GET['localidades']))
                                    print $_GET ['consulta_habitantes'];  //Intento de sacar habitantes
                        ?>
                    }

             </script>

    </form>
    <?php
    } else {
        echo "No hay datos en las tablas";
    }
    ?>
</body>
</html>