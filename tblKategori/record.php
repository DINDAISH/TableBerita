<?php
// Membuat koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbBerita";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Array kategori
$kategori = ['sosial', 'budaya', 'teknologi', 'pendidikan', 'olahraga'];

// Menyisipkan setiap kategori ke dalam tabel
foreach ($kategori as $kat) {
    $sql = "INSERT INTO tblKategori (nama_kategori) VALUES ('$kat')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully for category: " . $kat . "<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>