<?php
session_start();

// Kontrollib, kas kasutaja on sisse loginud
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

include("config.php");

// SQL päring
$paring = "SELECT * FROM cars ORDER BY id DESC LIMIT 8";
$valjund = mysqli_query($yhendus, $paring);
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin paneel</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 10px;
            text-align: center;
        }

        img {
            width: 120px;
            height: auto;
        }

        .btn {
            display: inline-block;
            padding: 8px 12px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-danger {
            background: red;
        }

        .btn-edit {
            background: green;
        }

        .topbar{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:20px;
        }

        .user{
            font-size:18px;
            font-weight:bold;
            color:#333;
        }

        .logout-btn{
            background:#dc3545;
            color:white;
            padding:8px 14px;
            border-radius:6px;
            text-decoration:none;
            font-weight:bold;
            transition:0.2s;
        }

        .logout-btn:hover{
            background:#b52a37;
            transform: translateY(-1px);
        }
    </style>
</head>
<body>

    <div class="topbar">
        <div class="user">
            Tere, <?= htmlspecialchars($_SESSION['kasutaja']) ?>
        </div>

        <a class="logout-btn" href="logout.php">
        Logi välja
        </a>
    </div>

    <h1>Admin paneel</h1>

    <p>
        Tere, <?= htmlspecialchars($_SESSION['kasutaja']) ?>!
    </p>

    <a class="btn" href="lisa.php">+ Lisa auto</a>

    <br><br>

    <table>
        <tr>
            <th>Mark</th>
            <th>Mudel</th>
            <th>Mootor</th>
            <th>Kütus</th>
            <th>Hind</th>
            <th>Pilt</th>
            <th>Kustuta</th>
            <th>Muuda</th>
        </tr>

        <?php
        if ($valjund && mysqli_num_rows($valjund) > 0) {

            while ($rida = mysqli_fetch_assoc($valjund)) {

                echo "<tr>
                    <td>" . htmlspecialchars($rida['mark']) . "</td>
                    <td>" . htmlspecialchars($rida['model']) . "</td>
                    <td>" . htmlspecialchars($rida['engine']) . "</td>
                    <td>" . htmlspecialchars($rida['fuel']) . "</td>
                    <td>" . htmlspecialchars($rida['price']) . " €</td>

                    <td>
                        <img src='" . htmlspecialchars($rida['image']) . "' alt='Auto pilt'>
                    </td>

                    <td>
                        <a class='btn btn-danger' href='kustuta.php?id=" . $rida['id'] . "'>
                            Kustuta
                        </a>
                    </td>

                    <td>
                        <a class='btn btn-edit' href='muuda.php?id=" . $rida['id'] . "'>
                            Muuda
                        </a>
                    </td>
                </tr>";
            }

        } else {
            echo "<tr><td colspan='8'>Andmeid ei leitud.</td></tr>";
        }
        ?>
    </table>

</body>
</html>