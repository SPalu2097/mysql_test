<?php
    include("config.php");
        $paring = "DELETE FROM cr_simon WHERE id = ".$_GET['id']."";
        $valjund = mysqli_query($yhendus, $paring);
        //print_r($paring)
        if($valjund){
            header("Location:admin.php");
        }
?>