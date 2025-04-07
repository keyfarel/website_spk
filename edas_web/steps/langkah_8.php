<?php
session_start();
include 'data.php';

$nsp = $_SESSION['nsp'];
$nsn = $_SESSION['nsn'];
$alternatif = $_SESSION['alternatif'];

// Hitung skor akhir
$score = [];
foreach ($alternatif as $alt) {
    $score[$alt] = 0.5 * ($nsp[$alt] + $nsn[$alt]);
}

// Urutkan skor dari besar ke kecil
arsort($score);
$currentStep = 8;
$_labelStep = "7";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Langkah 7</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <h2>Langkah 7: Perankingan Alternatif</h2>
    <table border="1">
        <tr>
            <th>Ranking</th>
            <th>Alternatif</th>
            <th>Skor Akhir (AS)</th>
        </tr>
        <?php
        $rank = 1;
        foreach ($score as $alt => $val): ?>
            <tr>
                <td><?= $rank++ ?></td>
                <td><?= $alt ?></td>
                <td><?= round($val, 10) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php render_navigation($currentStep); ?>
</body>

</html>