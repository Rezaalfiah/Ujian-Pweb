# Ujian-Pweb membuat sebuah manajemen inventory barang dengan menggunakan CRUD
# Nama = Reza Alfiansyah
# Kelas = 3IA15
# NPM = 51421294
# Universitas Gunadarma

<!-- //note -->
<!-- Note 
<!--Tempatkan folder pada htdocs untuk menggunakan nya -->
 <!-- Jika inventory.sql tidak dapat dibaca, maka lakukan create database pada cmd mysql dengan nama database inventory -->

> CREATE DATABASE inventory;
> 
>  USE inventory;
>
> CREATE TABLE products (
> product_id INT AUTO_INCREMENT PRIMARY KEY,
> product_name VARCHAR(255) NOT NULL,
> quantity INT NOT NULL,
> price VARCHAR(255));
