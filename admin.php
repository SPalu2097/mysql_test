<h1>admin</h1>
<a href="lisa.php">+ Lisa auto</a>
<table border="1">
    <tr>
        <td>Mark</td>
        <td>Model</td>
        <td>Engine</td>
        <td>Fuel</td>
        <td>Price</td>
        <td>Image</td>
        <td>Kustuta</td>
        <td>Muuda</td>
    </tr>


<?php 
    include("config.php");

    $paring = "SELECT * FROM cr_simon ORDER BY id DESC LIMIT 8";
    $valjund = mysqli_query($yhendus, $paring);

    while($rida = mysqli_fetch_assoc($valjund)){
        // var_dump($rida);
        echo "<tr>
            <td>".$rida['mark']."</td>
            <td>".$rida['model']."</td>
            <td>".$rida['engine']."</td>
            <td>".$rida['fuel']."</td>
            <td>".$rida['price']."</td>
            <td>".$rida['image']."</td>
            <td><a href='kustuta.php?id=".$rida['id']."'>Kustuta</a></td>
            <td><a href='muuda.php?id=".$rida['id']."'>Muuda</a></td>
        </tr>";
    }
?>

</table>