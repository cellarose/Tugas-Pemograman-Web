<?php

include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nama_barang = $_POST["nama_barang"];
    $harga_barang = $_POST["harga_barang"];
    $stok = $_POST["aksi"];

    $sql = "INSERT INTO barang (nama_barang, harga, stok, kategori)
    VALUES ('$nama_barang', $harga_barang', '$stok', '$kategori')";
    $koneksi->query($sql);

    header('location: index.php');
}

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>
    <form action="" method="post">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang">
        <br>
        <label>Harga Barang</label>
        <input type="number" name="harga_barang">
        <br>
        <label>Stok</label>
        <input type="text" name="stok">
        <br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
