<?php
require "conexion.php";
if(isset($_GET["modelo"])){/*Este if se ejecuta si el usuario elimina un coche de su base de datos*/
    $sql= "DELETE FROM coche WHERE modelo = :modelo";
    try{
        $statementDelete = $conexion->prepare($sql);
        $statementDelete->bindValue(':modelo', $_GET['modelo'], PDO::PARAM_STR);/*PDO::PARAM_STR representa el tipo de dato, CHAR, VARCHAR de SQL */
        $statementDelete->execute();
        
    }catch(PDOException $error){
        echo $error->getMessage();
    }
}
$sql="SELECT * FROM coche";
try{
    $statement = $conexion->prepare($sql);
    $statement->execute();
    $resultado=$statement->fetchAll();
}catch(PDOException $error){
    echo $error->getMessage();
}
?>

<?php require "header.php"; ?>
    <h2>Eliminar coche</h2><!--Aqui mostramos la tabla para que el usuario vea que vehículo quiere eliminar-->
<?php if (isset($statementDelete)) echo "Modelo de coche eliminado"; ?><!--Si se elimina correctamente mostrará este mensaje-->
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Asientos</th>
                <th>Color</th>
                <th>Cilindradas</th>
                <th>Peso</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($resultado as $fila) : ?>
                <tr>
                    <td><?php echo $fila["modelo"]; ?> </td>
                    <td><?php echo $fila["precio"]; ?> </td>
                    <td><?php echo $fila["asientos"]; ?> </td>
                    <td><?php echo $fila["color"]; ?> </td>
                    <td><?php echo $fila["cilindrada"]; ?> </td>
                    <td><?php echo $fila["peso"]; ?> </td>
                    <td><a href="eliminarcoche.php?modelo=<?php echo $fila["modelo"]; ?>" class="menu">Eliminar</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="menuprincipal.php" class="menu">Volver</a>



