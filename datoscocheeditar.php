<?php 
    require "conexion.php";
    if(isset($_GET['modelo'])){/*Comprobamos si existe el parametro modelo, si no existe no ejecutael codigo*/
        $sql="SELECT * FROM coche WHERE modelo = :modelo";/*Comprueba si el modelo es el que le hemos pasado por parametro*/
        
        try{/*Dentro de este try catch eraliza la sentencia*/
            $statement = $conexion->prepare($sql);
            $statement->bindValue(':modelo', $_GET['modelo'], PDO::PARAM_STR);/*PDO::PARAM_STR representa el tipo de dato, CHAR, VARCHAR de SQL */
            $statement->execute();/*El bindValue sirve para determinar qué valor tiene la variable en ese momento e incluso si cambia en varias ejecuciones*/

            $coche =$statement->fetch( PDO::FETCH_ASSOC);/*devuelve un único valor por nombre de columna.*/
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }else{
        echo "Se necesita un modelo";
        exit;
    }
    if(isset($_POST['submit'])){
        $coche=[
            "modelo"=> $_POST ['modelo'],
            "precio"=>$_POST ['precio'],
            "asientos"=>$_POST ['asientos'],
            "color"=>$_POST ['color'],
            "cilindrada"=>$_POST['cilindrada'],
            "peso"=> $_POST ['peso']
        ];
        // Se actualizan todas las columnas de la fila
        $sql = "UPDATE coche SET modelo = :modelo, precio = :precio, asientos= :asientos, color = :color, cilindrada = :cilindrada, peso = :peso WHERE modelo = :modelo";
        try{
            $statement= $conexion->prepare($sql);
            $statement->bindValue(':modelo', $_POST['modelo'], PDO::PARAM_STR);/*PDO::PARAM_STR representa el tipo de dato, CHAR, VARCHAR de SQL */
            $statement->execute($coche);
        }catch(PDOException $error){
            echo $error->getMessage();
        }
    }
?>
<?php require "header.php";?>
<?php if(isset($_POST['submit'])&& $statement) : ?>
    <blockquote><?php echo $_POST['modelo']; ?> Modificado Correctamente </blochquote>
<?php endif; ?>


<h2>Editar un vehículo</h2>
<!-- Aquí mostramos el vehículo que queremos editar -->
<form method="post">
    <?php foreach ($coche as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key;?>"
            value="<?php echo $value;?>" <?php echo($key === 'modelo' ? '' : null); ?>>
            <?php endforeach; ?>
            <input type="submit" name="submit" value="Modificar" class="modificarrr">
</form>
<a href="editarcoche.php" class="menu">Volver</a>