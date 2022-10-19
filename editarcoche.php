<?php
require "conexion.php";/*Nos conectamos a nuestra base de datos que está en el fichero conexion.php*/
$sql="SELECT * FROM coche";/*Consulta que nos devolverá todos los vehículos de nuestra base detos*/
try{
    $statement = $conexion->prepare($sql);/*Preparamos la sentencia para poder verla en nuestra tabla */
    $statement->execute();
    $resultado=$statement->fetchAll();
}catch(PDOException $error){
    echo $error->getMessage();
}
?>
<!--Este html pondrá todos los vehículos en una tabla y podremos editar cada uno por separado-->
<?php require "header.php"; ?>
    <h2>Editar coche</h2>
    <table>
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Asientos</th>
                <th>Color</th>
                <th>Cilindradas</th>
                <th>Peso</th>
                <th>Editar</th>
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
                    <td><a href="datoscocheeditar.php?modelo=<?php echo $fila["modelo"]; ?>" class="menu">Editar</a></td><!--Este fichero se encargará de editar el vehiculo que queramos-->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<a href="menuprincipal.php" class="menu">Volver</a>



