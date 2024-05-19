<!DOCTYPE html>
<html>
<head>
    <title>Tambah Berita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #d2b48c; /* Warna coklat muda */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }
        h1 {
            color: #333;
            font-size: 24px; /* Font sedikit besar */
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-size: 16px; /* Font sedikit besar */
            color: #333;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form action="tambah_berita.php" method="POST">
        <h1>Tambah Berita</h1>
        <label for="idKategori">Kategori:</label>
        <select id="idKategori" name="idKategori">
            <?php
            $conn = new mysqli("localhost", "root", "", "dbBerita");
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

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbBerita";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $idKategori = $_POST['idKategori'];
        $judulberita = $_POST['judulberita'];
        $isiberita = $_POST['isiberita'];
        $penulis = $_POST['penulis'];
        $tgldipublish = $_POST['tgldipublish'];

        $sql = "INSERT INTO tblBerita (idKategori, judulberita, isiberita, penulis, tgldipublish)
                VALUES ('$idKategori', '$judulberita', '$isiberita', '$penulis', '$tgldipublish')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }
    ?>
</body>
</html>
