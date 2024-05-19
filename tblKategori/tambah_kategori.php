<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffdab9; /* orange muda */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
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
        .success-message {
            color: green;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Kategori</h2>
        <form action="tambah_kategori.php" method="POST">
            <label for="nama_kategori">Nama Kategori:</label>
            <input type="text" id="nama_kategori" name="nama_kategori" required><br>
            <button type="submit">Tambah Kategori</button>
        </form>

        <?php
        // Cek jika form telah disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "dbBerita";
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            // Periksa koneksi
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Ambil nilai dari input form
            $nama_kategori = $_POST['nama_kategori'];
            
            // Buat query SQL untuk memasukkan data ke dalam tabel
            $sql = "INSERT INTO tblKategori (nama_kategori) VALUES ('$nama_kategori')";
            
            // Jalankan query SQL
            if ($conn->query($sql) === TRUE) {
                $success_message = "New record created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            
            // Tutup koneksi
            $conn->close();
        }
        ?>

        <?php if(isset($success_message)) { ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php } ?>
    </div>
</body>
</html>
