<?php
include 'koneksi.php';
$nama_barang = $_GET["nama_barang"];
$harga = $_GET["harga_barang"];
$sql="INSERT INTO barang(nama_barang,harga) VALUES('$nama_barang', '$harga')";
$mysqli->query($sqli);
header('location:index.php');
?>
