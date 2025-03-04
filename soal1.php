<?php

$jml = $_GET['jml'];
echo "<table border=1>\n";

// Loop untuk membuat baris
for ($a = $jml; $a > 0; $a--) {
    echo "<tr>\n";
    
    // Loop untuk mencetak angka pada setiap baris
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>";
    }
    
    echo "</tr>\n";
}

echo "</table>";

?>
