<?php

session_start();

 

$error = '';

 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kasutaja = $_POST['kasutaja'] ?? '';

    $parool   = $_POST['parool'] ?? '';

 

    // Parool hardcoded kooliprojekti jaoks — või tõmba andmebaasist

    if ($kasutaja === 'admin' && $parool === 'Passw0rd') {

        $_SESSION['loggedin'] = true;

        $_SESSION['kasutaja'] = $kasutaja;

        header('Location: admin.php');

        exit();

    } else {

        $error = 'Vale kasutajanimi või parool!';

    }

}

?>

<!DOCTYPE html>

<html lang="et">

<head><meta charset="UTF-8"><title>Login</title></head>

<body>

  <h2>Logi sisse</h2>

  <?php if ($error): ?>

    <p style="color:red"><?= htmlspecialchars($error) ?></p>

  <?php endif; ?>

  <form method="POST">

    <label>Kasutajanimi: <input type="text" name="kasutaja"></label><br>

    <label>Parool: <input type="password" name="parool"></label><br>

    <button type="submit">Logi sisse</button>

  </form>

</body>

</html>
