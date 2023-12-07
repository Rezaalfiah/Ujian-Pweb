<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: index.html");
}

$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Welcome</title>
    <style>
        body {
            background: url('vector-abstract-template-blue-geometric-triangles-contrast-black-background-you-can-use-for-corporate-design-cover-brochure-book-banner-web-advertising-poster-leaflet-flyer.jpg') center/cover fixed no-repeat;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="left-section">
            <h2>Selamat datang, <?php echo $username; ?>!</h2>
            <p>
                Terima kasih telah menggunakan layanan kami. Selamat menikmati pengalaman browsing Anda di Web Project Reza.
            </p>
            <div class="biography">
                <h3>Biografi Singkat</h3>
                <p>
                    Perkenalkan nama saya adalah Reza Alfiansyah, Saya adalah seorang Mahasiswa Universitas Gunadarma Fakultas Teknik Industri Angkatan 21 Prodi Informatika
                </p>
                <p>
                  Umur saya sekarang 20 tahun, saya berdomisili Depok dan memiliki hobi bermain game dan bulu tangkis, web ini merupakan sebuah aplikasi tentang Manajemen Barang
                  yang sudah terkoneksi ke dalam database
                </p>
            </div>
            <div class="interests">
                <h2>Minat Saya</h2>
                <ul>
                    <li class="list">Pengembangan Web</a></li>
                    <li class="list">Desain Antarmuka Pengguna</a></li>
                    <li class="list">Teknologi Terkini</a></li>
                </ul>
            </div>
            <a href="logout.php" class="logout">Logout</a>
        </div>
        <div class="right-section">
            <div class="ManajemenBarang">
                <h2>Menu</h2>
                <ul>
                    <!-- Add a link to the inventory management page -->
                    <li><a href="inventory.php" class="ManajemenBarang">Manajemen Barang</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
