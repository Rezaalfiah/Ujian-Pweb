<?php
include("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";

    if ($conn->query($query) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <style>
                body {
            font-family: Arial, sans-serif;
            background: url('vector-abstract-template-blue-geometric-triangles-contrast-black-background-you-can-use-for-corporate-design-cover-brochure-book-banner-web-advertising-poster-leaflet-flyer.jpg') center/cover fixed no-repeat;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center; /* Perubahan posisi teks ke tengah */
        }

        form {
            background-color: rgba(255, 255, 255, 0.5); /* Menurunkan opasitas menjadi 0.5 */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
            margin: auto;
        }
        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            margin-top: 12px;
            text-align: center;
            color: #333;
            text-decoration: none;
            display: block; /* Perubahan agar tautan menjadi blok dan mengambil lebar maksimal */
        }

        a:hover {
            text-decoration: underline;
        }

    </style>
</head>
<body>
    <h2>Registrasi</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br>

        <input type="submit" value="Daftar">
    </form>
    <a href="index.html">Kembali ke Beranda</a>
</body>
</html>
