<?php
session_start();
include 'data.php';

$jumlah_alternatif = count($alternatif);
$jumlah_kriteria = count($nama_kriteria);

// Hitung rata-rata
$avg = [];
for ($j = 0; $j < $jumlah_kriteria; $j++) {
    $total = 0;
    foreach ($alternatif as $nilai) {
        $total += $nilai[$j];
    }
    $avg[$j] = $total / $jumlah_alternatif;
}

// Hitung PDA dan NDA dengan mempertimbangkan jenis kriteria
$pda = [];
$nda = [];

foreach ($alternatif as $alt => $nilai) {
    for ($j = 0; $j < $jumlah_kriteria; $j++) {
        if ($jenis_kriteria[$j] === "BENEFIT") {
            $pda[$alt][$j] = $nilai[$j] >= $avg[$j]
                ? ($nilai[$j] - $avg[$j]) / $avg[$j]
                : 0;

            $nda[$alt][$j] = $nilai[$j] < $avg[$j]
                ? ($avg[$j] - $nilai[$j]) / $avg[$j]
                : 0;
        } else { // COST
            $pda[$alt][$j] = $nilai[$j] <= $avg[$j]
                ? ($avg[$j] - $nilai[$j]) / $avg[$j]
                : 0;

            $nda[$alt][$j] = $nilai[$j] > $avg[$j]
                ? ($nilai[$j] - $avg[$j]) / $avg[$j]
                : 0;
        }
    }
}

// Hitung SP dan SN
$sp = [];
$sn = [];

foreach ($alternatif as $alt => $nilai) {
    $sp[$alt] = 0;
    $sn[$alt] = 0;
    for ($j = 0; $j < $jumlah_kriteria; $j++) {
        $sp[$alt] += $pda[$alt][$j] * $bobot[$j];
        $sn[$alt] += $nda[$alt][$j] * $bobot[$j];
    }
}

// Simpan ke sesi
$_SESSION['sp'] = $sp;
$_SESSION['sn'] = $sn;
$_SESSION['alternatif'] = array_keys($alternatif);

$currentStep = 5;
$_labelStep = "4";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Langkah 4</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <h2>Langkah 4: Jumlah Terbobot (SP dan SN)</h2>

    <table border="1">
        <tr>
            <th>Alternatif</th>
            <th>SP</th>
            <th>SN</th>
        </tr>
        <?php foreach ($sp as $alt => $sp_val): ?>
            <tr>
                <td><?= $alt ?></td>
                <td><?= round($sp_val, 10) ?></td>
                <td><?= round($sn[$alt], 10) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php render_navigation($currentStep); ?>
</body>

</html>