<?php

//soal 1

$jml = $_GET['jml']; // Mengambil parameter jml dari URL
echo "<table border=1>\n"; // Membuka tag <table> untuk membuat tabel

// Loop untuk membuat baris
for ($a = $jml; $a > 0; $a--) {
    // Menampilkan total untuk setiap baris
    $total = 0; // Inisialisasi total untuk setiap baris
    
    // Hitung total untuk baris ini
    for ($b = $a; $b > 0; $b--) {
        $total += $b; // Menambahkan angka pada baris ke total
    }
    
    // Menampilkan total
    echo "<tr><td colspan='$jml'>TOTAL: $total</td></tr>\n"; // Menampilkan total di atas baris
    
    // Loop untuk mencetak angka pada setiap baris
    echo "<tr>\n";
    for ($b = $a; $b > 0; $b--) {
        echo "<td>$b</td>"; // Mencetak angka pada baris
    }
    
    // Menambahkan kolom kosong agar jumlah kolom tetap sama
    for ($empty = $a; $empty < $jml; $empty++) {
        echo "<td></td>"; // Menambahkan kolom kosong
    }

    echo "</tr>\n"; // Menutup tag </tr> untuk baris
}

echo "</table>"; // Menutup tag </table>

?>
