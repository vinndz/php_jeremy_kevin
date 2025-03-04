<!-- menggabungkan soal2a, soal2b, dst -->
<?php
//soal 2

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nama = $_POST['nama'];
        $umur = $_POST['umur'];
        $hobi = $_POST['hobi'];
    }else{
        // jika data belum di submit maka set kosong
        $nama = $umur = $hobi = "";
    }

?>

    <!-- form html -->
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulir Input</title>
    </head>
    <body>

    <h2>Formulir Input</h2>
    <form method="post" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>"><br><br>
        
        <label for="umur">Umur:</label><br>
        <input type="number" id="umur" name="umur" value="<?php echo htmlspecialchars($umur); ?>"><br><br>
        
        <label for="hobi">Hobi:</label><br>
        <input type="text" id="hobi" name="hobi" value="<?php echo htmlspecialchars($hobi); ?>"><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    // Menampilkan hasil jika form sudah disubmit
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Hasil:</h2>";
        echo "Nama: " . htmlspecialchars($nama) . "<br>";
        echo "Umur: " . htmlspecialchars($umur) . "<br>";
        echo "Hobi: " . htmlspecialchars($hobi) . "<br>";
    }
    ?>

    </body>
    </html>



