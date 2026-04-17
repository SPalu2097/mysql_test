<?php

$db_server = 'localhost';
$db_andmebaas = 'cr_simon';
$db_kasutaja = 'simon';
$db_salasona = 'simon';

$yhendus = mysqli_connect($db_server, $db_kasutaja, $db_salasona, $db_andmebaas);

if (!$yhendus) {
    die('Ei saa ühendust andmebaasiga');
}

?>