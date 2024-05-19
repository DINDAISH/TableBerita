<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dbBerita";

$conn = new mysqli($servername, $username, $password, $dbname);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM tblBerita WHERE idBerita='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID not set.";
}

$conn->close();
?>
