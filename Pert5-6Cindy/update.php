<?php
include "koneksi.php";
$nama_barang = $_POST['nama_barang'];
$harga_barang - $_POST['harga_barang'];
$query = " UPDATE barang set nama_barang= '$nama_barang', harga='$harga_barang' where id='$_GET[id]'";
header(('location:index.php'));