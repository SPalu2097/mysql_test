<?php
include("config.php");

// kontroll ID
if (!isset($_GET['id']) || empty($_GET['id'])) {
    die("Auto ID puudub!");
}

$id = (int) $_GET['id'];

// SQL päring
$paring = $yhendus->prepare("SELECT * FROM cars WHERE id = ?");

if (!$paring) {
    die("SQL viga: " . $yhendus->error);
}

$paring->bind_param("i", $id);
$paring->execute();

$tulemus = $paring->get_result();

if (!$tulemus || $tulemus->num_rows === 0) {
    die("Autot ei leitud!");
}

$car = $tulemus->fetch_assoc();
?>

<!doctype html>
<html lang="et">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($car['mark']) ?> rent</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row bg-white p-4 shadow rounded">

        <!-- PILT -->
        <div class="col-md-6">
            <img 
                src="<?= htmlspecialchars($car['image']) ?>" 
                class="img-fluid rounded shadow"
                alt="auto"
            >
        </div>

        <!-- INFO -->
        <div class="col-md-6">

            <h1 class="mb-3">
                <?= htmlspecialchars($car['mark'] . " " . $car['model']) ?>
            </h1>

            <p><b>Mootor:</b> <?= htmlspecialchars($car['engine']) ?></p>
            <p><b>Kütus:</b> <?= htmlspecialchars($car['fuel']) ?></p>

            <h3 class="text-success mb-4">
                <?= htmlspecialchars($car['price']) ?> € / päev
            </h3>

            <form method="POST" action="rent.php">
                <input type="hidden" name="car_id" value="<?= (int)$car['id'] ?>">

                <button type="submit" class="btn btn-dark w-100">
                    🚗 Rendi see auto
                </button>
            </form>

            <a href="index.php" class="btn btn-outline-secondary w-100 mt-2">
                ← Tagasi
            </a>

        </div>

    </div>

</div>

</body>
</html>