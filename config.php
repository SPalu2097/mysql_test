<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Andmebaasi seaded
$db_server = 'localhost';
$db_andmebaas = 'cr_simon';
$db_kasutaja = 'root';
$db_salasona = '';

// Ühendus
$yhendus = mysqli_connect(
    $db_server,
    $db_kasutaja,
    $db_salasona,
    $db_andmebaas
);

// Kontroll
if (!$yhendus) {
    die('Andmebaasi ühendus ebaõnnestus: ' . mysqli_connect_error());
}

mysqli_set_charset($yhendus, "utf8");
?>