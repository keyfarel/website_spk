<?php
$alternatif = [
    "A1" => [7, 7, 9, 7, 1, 9, 1, 6],
    "A2" => [4, 3, 5, 3, 3, 10, 7, 4],
    "A3" => [5, 5, 7, 4, 9, 2, 6, 1],
    "A4" => [9, 5, 10, 9, 7, 8, 6, 7],
    "A5" => [10, 1, 9, 2, 10, 6, 10, 2],
    "A6" => [6, 7, 2, 7, 10, 2, 8, 7],
    "A7" => [10, 9, 10, 2, 6, 7, 10, 4],
    "A8" => [7, 6, 6, 4, 7, 2, 3, 9],
    "A9" => [4, 9, 9, 1, 6, 1, 6, 1],
    "A10" => [9, 8, 2, 4, 5, 3, 2, 5],
    "A11" => [4, 4, 2, 5, 4, 10, 6, 5],
    "A12" => [10, 6, 9, 9, 10, 10, 2, 6],
    "A13" => [6, 8, 8, 5, 4, 9, 2, 3],
    "A14" => [8, 6, 3, 3, 6, 7, 8, 7],
    "A15" => [4, 9, 3, 5, 10, 5, 10, 6],
    "A16" => [6, 2, 7, 6, 5, 6, 5, 9],
    "A17" => [8, 4, 1, 8, 3, 10, 7, 4],
    "A18" => [4, 1, 8, 5, 10, 5, 2, 6],
    "A19" => [9, 8, 9, 5, 1, 3, 10, 6],
    "A20" => [3, 1, 10, 4, 7, 5, 10, 8]
];

// Jenis Kriteria (BENEFIT / COST)
$jenis_kriteria = ["BENEFIT", "COST", "BENEFIT", "BENEFIT", "BENEFIT", "BENEFIT", "BENEFIT", "BENEFIT"];

// Bobot Kriteria
$bobot = [0.2904, 0.1708, 0.2133, 0.0441, 0.1399, 0.0293, 0.0498, 0.0624];

$nama_kriteria = ["K1", "K2", "K3", "K4", "K5", "K6", "K7", "K8"];

function render_navigation($currentStep, $labelStep = null)
{
    // Label default
    $labelStep = $labelStep ?? $currentStep;

    // Tentukan label previous & next
    $prevStep = $currentStep - 1;
    $nextStep = $currentStep + 1;

    $prevLabel = $prevStep;
    $nextLabel = $nextStep;

    // Custom label khusus langkah-langkah tertentu
    switch ($currentStep) {
        case 2:
            $nextLabel = "3.1";
            break;
        case 3:
            $prevLabel = 2;
            $nextLabel = "3.2";
            break;
        case 4:
            $prevLabel = "3.1";
            $nextLabel = 4;
            break;
        case 5:
            $prevLabel = "3.2";
            $nextLabel = 5;
            break;
        case 6:
            $prevLabel = 4;
            $nextLabel = 6;
            break;
        case 7:
            $prevLabel = 5;
            $nextLabel = 7;
            break;
        case 8:
            $prevLabel = 6;
            break;
        default:
            // nextLabel dan prevLabel tetap default
            break;
    }


    echo "<div style='margin-top: 20px;'>";

    // Tombol sebelumnya
    if ($currentStep > 1) {
        echo "<a href='langkah_" . $prevStep . ".php'>
                <button>Kembali ke Langkah $prevLabel</button>
              </a> ";
    }

    echo "<a href='../index.php'><button>Kembali ke Halaman Utama</button></a> ";

    // Tombol berikutnya
    if ($currentStep < 8) {
        echo "<a href='langkah_" . $nextStep . ".php'>
                <button>Ke Langkah $nextLabel</button>
              </a>";
    }

    echo "</div>";
}
