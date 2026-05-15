<?php
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $kasutaja = trim($_POST['kasutaja'] ?? '');
    $parool = $_POST['parool'] ?? '';

    // Hardcoded kasutaja kooliprojekti jaoks
    if ($kasutaja === 'admin' && $parool === 'Passw0rd') {

        session_regenerate_id(true);

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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Logi sisse</h2>

    <?php if (!empty($error)): ?>
        <p style="color:red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <form method="POST">
        <label>
            Kasutajanimi:
            <input type="text" name="kasutaja" required>
        </label>
        <br><br>

        <label>
            Parool:
            <input type="password" name="parool" required>
        </label>
        <br><br>

        <button type="submit">Logi sisse</button>
    </form>

</body>
</html>