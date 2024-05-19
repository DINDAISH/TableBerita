<!DOCTYPE html>
<html>
<head>
    <title>Daftar Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> <!-- Menggunakan Font Awesome -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5deb3; /* coklat muda */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            max-width: 1000px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 20px;
            text-transform: uppercase;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
            text-transform: uppercase;
            text-align: center;
        }
        td {
            background-color: #fff;
            text-align: left;
        }
        tr:nth-child(even) td {
            background-color: #f9f9f9;
        }
        tr:hover td {
            background-color: #f1f1f1;
        }
        .icon {
            font-size: 18px;
            color: #333;
            text-decoration: none;
            margin-right: 5px;
        }
        .icon.edit {
            color: #007bff; /* Warna biru */
        }
        .icon.delete {
            color: #dc3545; /* Warna merah */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Berita</h1>
        <table>
            <tr>
                <th>Nama Kategori</th>
                <th>Judul Berita</th>
                <th>Isi Berita</th>
                <th>Penulis</th>
                <th>Tanggal Publish</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            <?php
            $conn = new mysqli("localhost", "root", "", "dbBerita");
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $sql = "SELECT tblKategori.nama_kategori, tblBerita.idBerita, tblBerita.judulberita, tblBerita.isiberita, tblBerita.penulis, tblBerita.tgldipublish
                    FROM tblBerita
                    JOIN tblKategori ON tblBerita.idKategori = tblKategori.idKategori
                    ORDER BY tblBerita.tgldipublish DESC";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nama_kategori'] . "</td>";
                    echo "<td>" . $row['judulberita'] . "</td>";
                    echo "<td>" . $row['isiberita'] . "</td>";
                    echo "<td>" . $row['penulis'] . "</td>";
                    echo "<td>" . $row['tgldipublish'] . "</td>";
                    echo "<td><a class='icon edit' href='edit_berita.php?id=" . $row['idBerita'] . "'><i class='fas fa-pencil-alt'></i></a></td>";
                    echo "<td><a class='icon delete' href='delete_berita.php?id=" . $row['idBerita'] . "'><i class='fas fa-trash-alt'></i></a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No results</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
