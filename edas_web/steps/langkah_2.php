<?php
include 'data.php';

$avg = [];
for ($i = 0; $i < count($nama_kriteria); $i++) {
    $total = 0;
    foreach ($alternatif as $a) $total += $a[$i];
    $avg[$i] = $total / count($alternatif);
}

$currentStep = 2;
?>
<!DOCTYPE html>
<html>

<head>
    <title>Langkah 2</title>
    <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <h2>Langkah 2: Solusi Rata-rata</h2>
    <table border="1">
        <tr>
            <th>Kriteria</th><?php foreach ($nama_kriteria as $k) echo "<th>$k</th>"; ?>
        </tr>
        <tr>
            <td>Rata-rata</td><?php foreach ($avg as $v) echo "<td>" . round($v, 4) . "</td>"; ?>
        </tr>
    </table>
    <?php render_navigation($currentStep); ?>
</body>

</html>