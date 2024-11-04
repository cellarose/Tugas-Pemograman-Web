<?php

include 'koneksi.php';
include 'function.php';

$query = "SELECT * FROM barang";
$result = $koneksi->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
    
<h2>Data Barang</h2>

<a href="tambah.php">Tambah Data</a>

<table border="1">
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>

    <?php
    $query = "SELECT * FROM barang order by nama_barang ASC";
    $result = $koneksi->query($query);
    $no=0;
    while ($row = $result->fetch_assoc()){
        $no++;
        ?>
        <tr>
            <td><?= $no;?></td>
            <td><?= $row['id'] ?></td>
            <td><?= $row['nama_barang'] ?></td>
            <td><?= FormatRupiah($row['harga']);?></td>
            <td>
                <a href="<?= 'edit-data.php?id=' .$row['id'];?>">Edit</a>
                <a href="<?= 'hapus-data.php?id=' .$row['id'];?>">Hapus</a>
            </td>
            <td><?= $row['kategori'] ?></td>
            <td><?= $row['harga'] ?></td>
            <td><?= $row['stok'] ?></td>
        </tr>
        <?php
    }
    ?>

</table>
</body>
</html>