<?php
include "koneksi.php";
$query = "SELECT * FROM barang where id='$_GET[id]'";
$result = $koneksi->query($query);
$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <form action="<?= 'update.php?id=' .$_GET['id'];?>" method="post">
        <label for="nama_barang">Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= $row['nama_barang'];?>"><br />
        <label for="harga_barang">Harga Barang</label>
        <input type="number" name="harga_barang" value="<?= $row['harga'];?>"><br />
        <button>Update</button>
    </form>
</body>
</html>