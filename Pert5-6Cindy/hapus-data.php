<?php
include "koneksi.php";
$query = "DELETE FROM barang WHERE id='$_GET[id]'";
$koneksi->query($query);
header('location:index.php');