<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

include("config.php");

// Kui vorm saadetakse
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mark = trim($_POST['mark']);
    $model = trim($_POST['model']);
    $engine = trim($_POST['engine']);
    $fuel = trim($_POST['fuel']);
    $price = trim($_POST['price']);
    $image = trim($_POST['image']);

    // Prepared statement
    $paring = $yhendus->prepare("
        INSERT INTO cars 
        (mark, model, engine, fuel, `price`, image)
        VALUES (?, ?, ?, ?, ?, ?)
    ");

    if (!$paring) {
        die("SQL viga: " . $yhendus->error);
    }

    $paring->bind_param(
        "ssssss",
        $mark,
        $model,
        $engine,
        $fuel,
        $price,
        $image
    );

    if ($paring->execute()) {

        header("Location: admin.php");
        exit();

    } else {
        echo "Viga andmete lisamisel!";
    }
}
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lisa auto</title>

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
            width:420px;
            background:white;
            padding:35px;
            border-radius:15px;
            box-shadow:0 10px 30px rgba(0,0,0,0.1);
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

        .preview{
            margin-bottom:20px;
            text-align:center;
        }

        .preview img{
            width:100%;
            max-height:220px;
            object-fit:cover;
            border-radius:10px;
            border:1px solid #ddd;
        }

        .btn{
            width:100%;
            padding:12px;
            border:none;
            border-radius:8px;
            background:linear-gradient(135deg, #007bff, #0056b3);
            color:white;
            font-size:16px;
            cursor:pointer;
            transition:0.3s;
        }

        .btn:hover{
            transform:translateY(-2px);
            box-shadow:0 5px 15px rgba(0,123,255,0.3);
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

    </style>
</head>
<body>

<div class="container">

    <h2>Lisa uus auto</h2>

    <div class="preview">
        <img 
            src="https://via.placeholder.com/400x220?text=Auto+pilt" 
            alt="Preview"
            id="previewImage"
        >
    </div>

    <form action="lisa.php" method="POST">

        <div class="form-group">
            <label>Mark</label>
            <input 
                type="text" 
                name="mark" 
                value="Ford" 
                required
            >
        </div>

        <div class="form-group">
            <label>Model</label>
            <input 
                type="text" 
                name="model" 
                value="Mustang" 
                required
            >
        </div>

        <div class="form-group">
            <label>Engine</label>
            <input 
                type="text" 
                name="engine" 
                value="V8" 
                required
            >
        </div>

        <div class="form-group">
            <label>Fuel</label>
            <input 
                type="text" 
                name="fuel" 
                value="Bensiin" 
                required
            >
        </div>

        <div class="form-group">
            <label>Price (€)</label>
            <input 
                type="number" 
                name="price" 
                value="10000" 
                required
            >
        </div>

        <div class="form-group">
            <label>Image URL</label>
            <input 
                type="text" 
                name="image" 
                id="imageInput"
                value="ford.jpg"
                required
            >
        </div>

        <button class="btn" type="submit">
            Lisa auto
        </button>

    </form>

    <a class="back" href="admin.php">
        ← Tagasi admin paneeli
    </a>

</div>

<script>

    const imageInput = document.getElementById('imageInput');
    const previewImage = document.getElementById('previewImage');

    imageInput.addEventListener('input', function() {

        if(this.value.trim() !== ''){
            previewImage.src = this.value;
        }

    });

</script>

</body>
</html>