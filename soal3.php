<?php
// soal 3
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "pt_terakorp"; // nama database

// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Variabel untuk pencarian
$search_name = $search_alamat = $search_hobi = "";

// Menangani input pencarian
if (isset($_POST['search_name'])) {
    $search_name = $_POST['search_name'];
}

if (isset($_POST['search_alamat'])) {
    $search_alamat = $_POST['search_alamat'];
}

if (isset($_POST['search_hobi'])) {
    $search_hobi = $_POST['search_hobi'];
}

// Membuat query berdasarkan input pencarian
$sql = "SELECT person.id, person.nama, person.alamat, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS hobi
        FROM person
        LEFT JOIN hobi ON person.id = hobi.person_id
        WHERE person.nama LIKE '%$search_name%' 
        AND person.alamat LIKE '%$search_alamat%' 
        AND hobi.hobi LIKE '%$search_hobi%'
        GROUP BY person.id";

// Jalankan query
$result = $conn->query($sql);

// Periksa jika query berhasil
if ($result === false) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing Data Person dan Hobi</title>
</head>
<body>

<h2>Daftar Person dan Hobi</h2>

<!-- Form Pencarian -->
<form method="POST" action="">
    <label for="search_name">Nama :</label>
    <input type="text" id="search_name" name="search_name" value="<?php echo htmlspecialchars($search_name); ?>"><br><br>

    <label for="search_alamat">Alamat :</label>
    <input type="text" id="search_alamat" name="search_alamat" value="<?php echo htmlspecialchars($search_alamat); ?>"><br><br>

    <label for="search_hobi">Hobi :</label>
    <input type="text" id="search_hobi" name="search_hobi" value="<?php echo htmlspecialchars($search_hobi); ?>"><br><br>

    <input type="submit" value="Search"><br><br>
</form>

<!-- Tabel Menampilkan Data -->
<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Hobi</th>
    </tr>

<?php
// Periksa apakah ada hasil query
if ($result->num_rows > 0) {
    // Menampilkan data untuk setiap orang
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
        echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
        echo "<td>" . htmlspecialchars($row['hobi']) . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>Data tidak ditemukan</td></tr>";
}

$conn->close();
?>

</table>

</body>
</html>
