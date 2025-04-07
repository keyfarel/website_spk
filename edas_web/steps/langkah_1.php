<?php
include 'data.php';

function print_table($judul, $headers, $rows)
{
    echo "<h2>$judul</h2>";
    echo "<table border='1'><tr><th>Alternatif</th>";
    foreach ($headers as $h) echo "<th>$h</th>";
    echo "</tr>";
    foreach ($rows as $key => $row) {
        echo "<tr><td>$key</td>";
        foreach ($row as $val) echo "<td>$val</td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Langkah 1</title>
    <link rel="stylesheet" href="../css/main.css">
</head>


<body>
    <?php print_table("Langkah 1: Matriks Keputusan", $nama_kriteria, $alternatif); ?>
    <?php render_navigation(1); ?>
</body>

</html>