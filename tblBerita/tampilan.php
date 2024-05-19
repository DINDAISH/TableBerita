<!DOCTYPE html>
<html>
<head>
    <title>Daftar Berita</title>
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
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Daftar Berita</h1>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "dbBerita";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT tblKategori.nama_kategori, tblBerita.judulberita, tblBerita.isiberita, tblBerita.penulis, tblBerita.tgldipublish
                FROM tblBerita
                JOIN tblKategori ON tblBerita.idKategori = tblKategori.idKategori
                ORDER BY tblBerita.tgldipublish DESC";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Nama Kategori</th>
                        <th>Judul Berita</th>
                        <th>Isi Berita</th>
                        <th>Penulis</th>
                        <th>Tanggal Publish</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row['nama_kategori'] . "</td>
                        <td>" . $row['judulberita'] . "</td>
                        <td>" . $row['isiberita'] . "</td>
                        <td>" . $row['penulis'] . "</td>
                        <td>" . $row['tgldipublish'] . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No results</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
