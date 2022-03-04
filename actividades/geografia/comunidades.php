<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title> Eleccion de la Comunidad Autonoma </title>
</head>
<body>

    <?php 
        include 'conexion_BD.php';    //Incluimos datos de la conexion

        $conexion=mysqli_connect($servidor, $usuario, $clave, $base_datos) or die ("Muerte en proceso"); //Conecta a la BD o muere en el intento

        $consulta="select nombre from comunidades order by nombre;"; //Consulta para los datos del select
        
        $resultado=mysqli_query($conexion, $consulta); //Realziar la consulta y conexion a la BD
        
        $num_filas=mysqli_num_rows ($resultado); //Guardar el resultado de la consulta en una variable

            if ($num_filas > 0 )  { //Valoramos si el resultado de la consulta es mayor a 0 si es mayor a 0 haremos el formulario
            
    ?>

            <form action="provincias.php"> <!--Creamos el formulario con un action que vaya a provincias-->

                <label for="comunidades">Elija la comunidad</label>
                    <select name="comunidades" id="comunidades">  <!--Creamos el select de eleccion-->

                        <?php //Usaremos otra vez codigo php
                           while ($fila=mysqli_fetch_assoc($resultado)) //Creamos un bucle donde se cogera el nombre de cada valor de la consulta
                                echo "<option value='{$fila["nombre"]}'>{$fila ["nombre"]}</option>";
                        ?>
                    </select>
                    <button>Buscar provincias</button>
            <form>

                <?php  //Volvemos a abrir php para seguir con el if
                    } 
                        else 
                            echo ("Muerte subita");
                ?>
</body>
</html>