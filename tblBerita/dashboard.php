<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(45deg, #ffa500, #ffd700); /* Gradasi oranye ke kuning */
        }
        .menu-container {
            width: 100%;
            max-width: 1200px;
        }
        .navbar {
            display: flex;
            background-color: #333;
            overflow: hidden;
            justify-content: center;
            margin-bottom: 20px;
        }
        .navbar a {
            flex: 1;
            color: white;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .content-container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
        .content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            text-align: center;
            max-width: 800px;
            width: 100%;
        }
        .content h1.large {
            font-size: 36px;
            color: #333;
        }
        .content h1.medium {
            font-size: 24px;
            color: #333;
        }
        .content p {
            color: #666;
        }
    </style>
</head>
<body>
    <div class="menu-container">
        <div class="navbar">
            <a href="tambah_berita.php">Tambah Berita</a>
            <a href="daftar_berita.php">Daftar Berita</a>
            <a href="tampilan.php">Tampilan</a>
        </div>
        <div class="content-container">
            <div class="content">
                <h1 class="large">SELAMAT DATANG DI BERITA PEMROGRAMAN WEB</h1>
                <h1 class="medium">DINDA NUR ISHMA</h1>
                <h1 class="medium">201011401432</h1>
                <p>Pilih menu di atas untuk mengelola berita.</p>
            </div>
        </div>
    </div>
</body>
</html>
