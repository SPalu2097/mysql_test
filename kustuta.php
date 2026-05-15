<?php
session_start();

// Kontrollib, kas kasutaja on sisse loginud
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

include("config.php");

// Kontrollib, kas ID on olemas
if (isset($_GET['id'])) {

    $id = intval($_GET['id']);

    // Prepared statement
    $paring = $yhendus->prepare("
        DELETE FROM cars 
        WHERE id = ?
    ");

    $paring->bind_param("i", $id);

    // Käivitab päringu
    if ($paring->execute()) {

        header("Location: admin.php");
        exit();

    } else {
        echo "Kirje kustutamine ebaõnnestus!";
    }

} else {
    echo "ID puudub!";
}
?>