<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbBerita";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM tblBerita WHERE idBerita='$id'");
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <!DOCTYPE html>
            <html>
            <head>
                <title>Edit Berita</title>
            </head>
            <body>
                <h1>Edit Berita</h1>
                <form action="edit_berita.php" method="POST">
                    <input type="hidden" name="idBerita" value="<?php echo $row['idBerita']; ?>">
                    
                    <label for="judulberita">Judul Berita:</label>
                    <input type="text" id="judulberita" name="judulberita" value="<?php echo $row['judulberita']; ?>" required><br>
                    
                    <label for="isiberita">Isi Berita:</label>
                    <textarea id="isiberita" name="isiberita" required><?php echo $row['isiberita']; ?></textarea><br>
                    
                    <label for="penulis">Penulis:</label>
                    <input type="text" id="penulis" name="penulis" value="<?php echo $row['penulis']; ?>" required><br>
                    
                    <label for="tgldipublish">Tanggal Publish:</label>
                    <input type="date" id="tgldipublish" name="tgldipublish" value="<?php echo $row['tgldipublish']; ?>" required><br>
                    
                    <button type="submit">Update</button>
                </form>
            </body>
            </html>
            <?php
        } else {
            echo "No record found with the provided ID.";
        }
    } else {
        echo "Invalid ID provided.";
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idBerita = $_POST['idBerita'];
    $judulberita = $_POST['judulberita'];
    $isiberita = $_POST['isiberita'];
    $penulis = $_POST['penulis'];
    $tgldipublish = $_POST['tgldipublish'];

    $sql = "UPDATE tblBerita SET judulberita='$judulberita', isiberita='$isiberita', penulis='$penulis', tgldipublish='$tgldipublish' WHERE idBerita='$idBerita'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
