<?php
$host = "localhost";
$user = "root";
$password = "root";
$database = "web_project";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}
?>
