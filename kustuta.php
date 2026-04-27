<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
    include("config.php");
        $paring = "DELETE FROM cr_simon WHERE id = ".$_GET['id']."";
        $valjund = mysqli_query($yhendus, $paring);
        //print_r($paring)
        if($valjund){
            header("Location:admin.php");
        }
?>
