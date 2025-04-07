<?php
include_once 'data.php';


$avg = [];
for ($i = 0; $i < count($nama_kriteria); $i++) {
    $total = 0;
    foreach ($alternatif as $a) $total += $a[$i];
    $avg[$i] = $total / count($alternatif);
}

// Hitung PDA
$pda = [];
foreach ($alternatif as $alt => $nilai) {
    for ($i = 0; $i < count($nilai); $i++) {
        $pda[$alt][$i] = $nilai[$i] >= $avg[$i]
            ? ($nilai[$i] - $avg[$i]) / $avg[$i]
            : 0;
    }
}

$currentStep = 3;
$_labelStep = "3.1";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Langkah 3.1</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <h2>Langkah 3.1: Perhitungan PDA</h2>
    <table border="1">
        <tr>
            <th>Alternatif</th><?php foreach ($nama_kriteria as $k) echo "<th>$k</th>"; ?>
        </tr>
        <?php foreach ($pda as $alt => $nilai): ?>
            <tr>
                <td><?= $alt ?></td>
                <?php foreach ($nilai as $v): ?>
                    <td><?= round($v, 4) ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
    <?php render_navigation($currentStep); ?>
</body>

</html>