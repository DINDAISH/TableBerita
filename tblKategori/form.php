<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffdab9; /* orange muda */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        input[type="text"] {
            width: calc(100% - 22px); /* Penyesuaian untuk margin */
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-family: Arial, sans-serif;
        }
        button {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: Arial, sans-serif;
        }
        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <form action="tambah_kategori.php" method="POST">
        <label for="nama_kategori">Nama Kategori:</label>
        <input type="text" id="nama_kategori" name="nama_kategori" required>
        <button type="submit">Tambah</button>
    </form>
</body>
</html>
