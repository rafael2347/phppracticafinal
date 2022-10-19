<?php require "conexion.php";/*conexion.php es el encargado de conectarse a la base de datos*/

    if(isset($_POST['submit'])){/*Comprueba que si existe ejecuta el código */
        $nuevo_coche = array(/*En este array está compuesto por las mismas filas que nos hemos creado en nuestra base de datos */
            "modelo" => $_POST ['modelo'],
            "precio" => $_POST ['precio'],
            "asientos"=> $_POST ['asientos'],
            "color"   => $_POST ['color'],
            "cilindrada"=> $_POST ['cilindrada'],
            "peso"    => $_POST ['peso']
            
        );
        $sql= "INSERT INTO coche (modelo, precio, asientos, color, cilindrada, peso)
                    values(:modelo, :precio, :asientos, :color, :cilindrada, :peso)";/*Sentencia que vamos a insertar en nuestra base de datos*/
        try{
            $statement = $conexion->prepare($sql);
            $statement->execute($nuevo_coche);/*Guardo el resultado y la realizo */
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }
?>
<?php require "header.php"; ?><!--Añado el header que se encarga de poner el título y dar estilo a la página-->
<?php if(isset($_POST['submit'])&& $statement) : ?><!--Compruebo que se ha enviado la información a nuestra base de datos-->
    <blockquote><?php echo $_POST['modelo']; ?> Se ha añadido correctamente. </blockquote>
<?php endif; ?>
<h2>Añade un coche clásico</h2>
<form method="post"> <!--Formulario para añadir un nuevo vehículo-->
    <label for="modelo">Modelo</label>
    <input type="text" name="modelo" id="modelo"><br>
    <label for="precio">Precio</label>
    <input type="text" name="precio" id="precio"><br>
    <label for="asientos">Número de asientos</label>
    <input type="text" name="asientos" id="asientos"> <br>
    <label for="color">Color</label>
    <input type="text" name="color" id="color"> <br>
    <label for="cilindrada">Cilindrada</label>
    <input type="text" name="cilindrada" id="cilindrada"> <br>
    <label for="color">Peso</label>
    <input type="text" name="peso" id="peso"> <br>
    <input type="submit" name="submit" value="Añadir" class="modificarrr"> <br>
</form><br>
<a href="menuprincipal.php" class="menu">Volver</a>
