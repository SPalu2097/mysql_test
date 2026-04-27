<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
    include("config.php");//võtab info config failist
    if(!empty($_GET['muuda_id'])){
        $id = $_GET['muuda_id'];
        $mark = $_GET['mark'];
        $model = $_GET['model'];
        $engine = $_GET['engine'];
        $fuel = $_GET['fuel'];
        $price = $_GET['price'];
        $image = $_GET['image'];

        // $paring ="INSERT INTO cars ( mark, model, engine, fuel, price, image) VALUES ( '".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$image."')";
        $paring = "UPDATE cr_simon
         SET mark = '".$mark."',
         model = '".$model."',
         engine = '".$engine."',
         price = '".$price."',
         image = '".$image."' 
         WHERE cars.id = ".$id."";
        $valjund = mysqli_query($yhendus, $paring);//päringu saatmise käsk
        $tulemus = mysqli_affected_rows($yhendus);//kas toimus muudatusi

        if($tulemus == 1) {
            header("Location: admin.php");
        }
    }

        $paring = "SELECT * FROM cr_simon WHERE id=".$_GET['id']."";
        $valjund = mysqli_query($yhendus, $paring);
        $rida = mysqli_fetch_assoc($valjund);
        print_r($rida);
?>
<form action="muuda.php" method="get">
    <input type="hidden" name="muuda_id" value=<?php echo $rida['id']; ?>><br>
    Mark <input type="text" name="mark" value=<?php echo $rida['mark']; ?>><br>
    Model <input type="text" name="model" value=<?php echo $rida['model']; ?>><br>
    Engine <input type="text" name="engine" value=<?php echo $rida['engine']; ?>><br>
    Fuel <input type="text" name="fuel" value=<?php echo $rida['fuel']; ?>><br>
    Price <input type="number" name="price" value=<?php echo $rida['price']; ?>><br>
    Image <input type="txt" name="image" value=<?php echo $rida['image']; ?>><br>
    <input type="submit" value="Salvesta auto">
</form>
