<?php
session_start();

// Kontrollib sisselogimist
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

include("config.php");

// SALVESTAMINE
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = intval($_POST['muuda_id']);

    $mark = trim($_POST['mark']);
    $model = trim($_POST['model']);
    $engine = trim($_POST['engine']);
    $fuel = trim($_POST['fuel']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);

    $paring = $yhendus->prepare("
        UPDATE cars
        SET
            mark = ?,
            model = ?,
            engine = ?,
            fuel = ?,
            `price` = ?,
            image = ?
        WHERE id = ?
    ");

    if (!$paring) {
        die("SQL viga: " . $yhendus->error);
    }

    $paring->bind_param(
        "ssssssi",
        $mark,
        $model,
        $engine,
        $fuel,
        $price,
        $image,
        $id
    );

    if ($paring->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Andmete uuendamine ebaõnnestus!";
    }
}

// AUTO ANDMETE VÕTMINE
if (!isset($_GET['id'])) {
    die("ID puudub!");
}

$id = intval($_GET['id']);

$paring = $yhendus->prepare("
    SELECT * FROM cars
    WHERE id = ?
");

$paring->bind_param("i", $id);
$paring->execute();

$tulemus = $paring->get_result();

if ($tulemus->num_rows === 0) {
    die("Autot ei leitud!");
}

$rida = $tulemus->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muuda autot</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:Arial, sans-serif;
            background:#f4f6f9;
            display:flex;
            justify-content:center;
            align-items:center;
            min-height:100vh;
        }

        .container{
            background:white;
            width:420px;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 25px rgba(0,0,0,0.1);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        .form-group{
            margin-bottom:18px;
        }

        label{
            display:block;
            margin-bottom:6px;
            font-weight:bold;
            color:#555;
        }

        input{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:8px;
            font-size:15px;
            transition:0.3s;
        }

        input:focus{
            border-color:#007bff;
            outline:none;
            box-shadow:0 0 8px rgba(0,123,255,0.2);
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:#007bff;
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            background:#0056b3;
        }

        .back{
            display:block;
            text-align:center;
            margin-top:15px;
            color:#666;
            text-decoration:none;
        }

        .back:hover{
            color:#000;
        }

        .preview{
            text-align:center;
            margin-bottom:20px;
        }

        .preview img{
            width:100%;
            max-height:220px;
            object-fit:cover;
            border-radius:10px;
            border:1px solid #ddd;
        }

    </style>
</head>
<body>

<div class="container">

    <h2>Muuda autot</h2>

    <div class="preview">
        <img src="<?= htmlspecialchars($rida['image']); ?>" alt="Auto pilt">
    </div>

    <form action="muuda.php" method="POST">

        <input 
            type="hidden" 
            name="muuda_id" 
            value="<?= $rida['id']; ?>"
        >

        <div class="form-group">
            <label>Mark</label>
            <input 
                type="text" 
                name="mark"
                value="<?= htmlspecialchars($rida['mark']); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Model</label>
            <input 
                type="text" 
                name="model"
                value="<?= htmlspecialchars($rida['model']); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Engine</label>
            <input 
                type="text" 
                name="engine"
                value="<?= htmlspecialchars($rida['engine']); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Fuel</label>
            <input 
                type="text" 
                name="fuel"
                value="<?= htmlspecialchars($rida['fuel']); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Price (€)</label>
            <input 
                type="number" 
                name="price"
                value="<?= htmlspecialchars($rida['price']); ?>"
                required
            >
        </div>

        <div class="form-group">
            <label>Image URL</label>
            <input 
                type="text" 
                name="image"
                value="<?= htmlspecialchars($rida['image']); ?>"
                required
            >
        </div>

        <button class="btn" type="submit">
            Salvesta muudatused
        </button>

    </form>

    <a class="back" href="admin.php">
        ← Tagasi admin paneeli
    </a>

</div>

</body>
</html>