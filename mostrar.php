<?php
   $inc=include ("con_db.php");
   if($inc){
       $consulta="SELECT * FROM coche";
       $resultado= mysqli_query($conex,$consulta);
       if($resultado){
           while($row = $resultado->fetch_array()){
                $modelo = $row['modelo'];
                $precio = $row['precio'];
                $asientos = $row['asientos'];
                $color = $row['color'];
                $cilindrada = $row['cilindrada'];
                $peso = $row['peso'];
?>
                <div>
                    <h2><?php echo $modelo; ?></h2>
                    <div>
                        <p>
                            <b>Precio: </b> <?php echo $precio ?> <br>
                            <b>Asientos: </b> <?php echo $asientos ?>  <br>
                            <b>Color: </b> <?php echo $color ?> <br>
                            <b>Cilindradas: </b>  <?php echo $cilindrada ?> <br>
                            <b>Peso: </b> <?php echo $peso ?> <br>
                        </p>
                    </div>
                </div>
                <?php
            }
        }
    }
    


?>
<a href="menuprincipal.php" class="menu">Volver</a>