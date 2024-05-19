<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita</title>
</head>
<body>
    <form action="tambah_berita.php" method="POST">
        <label for="idKategori">Kategori:</label>
        <select id="idKategori" name="idKategori" required>
            <?php
            $conn = new mysqli("localhost", "root", "", "dbBerita");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $result = $conn->query("SELECT idKategori, nama_kategori FROM tblKategori");
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['idKategori'] . "'>" . $row['nama_kategori'] . "</option>";
            }
            $conn->close();
            ?>
        </select><br>
        
        <label for="judulberita">Judul Berita:</label>
        <input type="text" id="judulberita" name="judulberita" required><br>
        
        <label for="isiberita">Isi Berita:</label>
        <textarea id="isiberita" name="isiberita" required></textarea><br>
        
        <label for="penulis">Penulis:</label>
        <input type="text" id="penulis" name="penulis" required><br>
        
        <label for="tgldipublish">Tanggal Publish:</label>
        <input type="date" id="tgldipublish" name="tgldipublish" required><br>
        
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
