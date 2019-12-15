<?php
    include 'conection.php';
    $sentence = "SELECT * FROM t_estado";
    $sentenceUseWhereB = false;
    if (isset($_POST['ciudad'])) {
        if($_POST['ciudad'] != "0"){
            $sentenceUseWhereB  = true;
            $sentence .= " WHERE ciudad = '". $_POST['ciudad'] ."'"; 
        }
    }
    if (isset($_POST['tipo'])) {
        if($_POST['tipo'] != "0"){
            $sentence .= ($sentenceUseWhereB) ? " AND " : " WHERE ";
            $sentenceUseWhereB  = true;
            $sentence .= "tipo = '". $_POST['tipo'] ."'";      
        }
    }
    if (isset($_POST['precio'])) {
        $precio = $_POST['precio'];
        $result = explode ( ';' ,  $precio);
        $minPrice = $result[0];
        $maxPrice = $result[1];
        $sentence .= ($sentenceUseWhereB) ? " AND " : " WHERE ";
        $sentence .= "(precio>=".$minPrice." AND  precio<=".$maxPrice.")";
    }
    $mysqli->real_query($sentence);
    $query  = $mysqli->store_result();
?>
<div class="container">
    <table class="centered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dirección</th>
                <th>Ciudad</th>
                <th>Teléfono</th>
                <th>CP</th>
                <th>Tipo</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = $query->fetch_assoc()) {?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['direccion'];?></td>
                    <td><?php echo $row['ciudad'];?></td>
                    <td><?php echo $row['telefono'];?></td>
                    <td><?php echo $row['codigo_postal'];?></td>
                    <td><?php echo $row['tipo'];?></td>
                    <td><?php echo $row['precio'];?></td>
                </tr>
            <?php } ?>
        </tbody>
       
    </table>
</div>
