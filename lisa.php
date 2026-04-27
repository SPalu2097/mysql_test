<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

include("config.php");//võtab info config failist
    if(!empty($_GET)){
        $mark = $_GET['mark'];
        $model = $_GET['model'];
        $engine = $_GET['engine'];
        $fuel = $_GET['fuel'];
        $price = $_GET['price'];
        $image = $_GET['image'];

        $paring ="INSERT INTO cr_simon ( mark, model, engine, fuel, price, image) VALUES ( '".$mark."', '".$model."', '".$engine."', '".$fuel."', '".$price."', '".$image."')";

        $valjund = mysqli_query($yhendus, $paring);//päringu saatmise käsk
        $tulemus = mysqli_affected_rows($yhendus);

        if($tulemus == 1) {
            header("Location: admin.php");
        }
    }
?>
<form action="lisa.php" method="get">
    Mark <input type="text" name="mark" value="ford"><br>
    Model <input type="text" name="model" value="mustang"><br>
    Engine <input type="text" name="engine" value="v8"><br>
    Fuel <input type="text" name="fuel" value="bensiin"><br>
    Price <input type="number" name="price" value="10000"><br>
    Image <input type="txt" name="image" value="ford.jpg"><br>
    <input type="submit" value="Lisa auto">
</form>
