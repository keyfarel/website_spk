<?php
session_start();
include 'data.php';

// Ambil data NSP dan NSN dari sesi
$nsp = $_SESSION['nsp'];
$nsn = $_SESSION['nsn'];
$alternatif = $_SESSION['alternatif'];

// Hitung skor akhir (AS)
$score = [];
foreach ($alternatif as $alt) {
    $score[$alt] = 0.5 * ($nsp[$alt] + $nsn[$alt]);
}

// Hitung ranking tanpa mengubah urutan aslinya
$sorted = $score;
arsort($sorted); // urutkan dari terbesar ke terkecil

$rank = [];
$rank_value = 1;
foreach ($sorted as $alt => $_) {
    $rank[$alt] = $rank_value++;
}

// Simpan ke sesi jika perlu di langkah selanjutnya
$_SESSION['score'] = $score;
$_SESSION['rank'] = $rank;

$currentStep = 7;
$_labelStep = "6";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Langkah 6</title>
    <link rel="stylesheet" href="../css/main.css">

</head>

<body>
    <h2>Langkah 6: Skor Penilaian Alternatif (AS) dan Ranking</h2>
    <table border="1">
        <tr>
            <th>Alternatif</th>
            <th>Skor Akhir (AS)</th>
            <th>Rank</th>
        </tr>
        <?php foreach ($alternatif as $alt): ?>
            <tr>
                <td><?= $alt ?></td>
                <td><?= round($score[$alt], 10) ?></td>
                <td><?= $rank[$alt] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php render_navigation($currentStep); ?>
</body>

</html>