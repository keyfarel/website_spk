<?php
session_start();
include 'data.php';

// Ambil data SP dan SN dari sesi
$sp = $_SESSION['sp'];
$sn = $_SESSION['sn'];
$alternatif = $_SESSION['alternatif'];

// Hitung nilai maksimum SP dan SN
$max_sp = max($sp);
$max_sn = max($sn);

// Normalisasi SP dan SN
$nsp = [];
$nsn = [];

foreach ($alternatif as $alt) {
    $nsp[$alt] = $max_sp == 0 ? 0 : $sp[$alt] / $max_sp;
    $nsn[$alt] = $max_sn == 0 ? 0 : 1 - ($sn[$alt] / $max_sn);
}

// Simpan ke sesi
$_SESSION['nsp'] = $nsp;
$_SESSION['nsn'] = $nsn;

$currentStep = 6;
$_labelStep = "4";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Langkah 5</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <h2>Langkah 5: Normalisasi Nilai SP (NSP) dan SN (NSN)</h2>

    <table border="1">
        <tr>
            <th>Alternatif</th>
            <th>NSP</th>
            <th>NSN</th>
        </tr>
        <?php foreach ($alternatif as $alt): ?>
            <tr>
                <td><?= $alt ?></td>
                <td><?= round($nsp[$alt], 10) ?></td>
                <td><?= round($nsn[$alt], 10) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php render_navigation($currentStep); ?>
</body>

</html>