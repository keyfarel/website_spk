<?php
$judul = [
  1 => "Matriks Keputusan",
  2 => "Solusi Rata-rata (AV)",
  3 => "Jarak Positif dari AV (PDA)",   // Akan tampil sebagai 3.1
  4 => "Jarak Negatif dari AV (NDA)",   // Akan tampil sebagai 3.2
  5 => "Jumlah Terbobot PDA & NDA (SP & SN)",
  6 => "Normalisasi Nilai SP & SN (NSP & NSN)",
  7 => "Skor Penilaian Alternatif (AS)",
  8 => "Perankingan Alternatif"
];

// Mapping label tampilan
$labelLangkah = [
  1 => "1",
  2 => "2",
  3 => "3.1",
  4 => "3.2",
  5 => "4",
  6 => "5",
  7 => "6",
  8 => "7"
];
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EDAS - Multi-Step</title>
  <link rel="stylesheet" href="css/index.css">
</head>

<body>
  <div class="container">
    <h1>Perhitungan Metode EDAS</h1>
    <nav class="step-nav">
      <?php foreach ($judul as $step => $name): ?>
        <a class="step-link" href="steps/langkah_<?= $step ?>.php">
          Langkah <?= $labelLangkah[$step] ?> - <?= $name ?>
        </a>
      <?php endforeach; ?>
    </nav>
  </div>
</body>

</html>