<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Koneksi ke database
    include "../../koneksi.php";
    
    // Pastikan parameter aksi ada
    if (!isset($_GET['aksi'])) {
        die("Aksi tidak ditemukan");
    }
    $aksi = $_GET['aksi'];

    // Aksi tambah
    if ($aksi == "tambah") {
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];

        $sql = "INSERT INTO barang (id_pemasok, nama_barang, merk, ukuran, satuan, id_kategori, harga_beli, harga_jual, deskripsi) 
                VALUES ('$idpemasok', '$namabarang', '$merk', '$ukuran', '$satuan', '$idkategori', '$hargabeli', '$hargajual', '$deskripsi')";

        if ($mysqli->query($sql)) {
            header('Location: ../../dashboard.php?modul=barang&status=success');
            exit();
        } else {
            die("Gagal menambahkan data: " . $mysqli->error);
        }

    // Aksi edit
    } elseif ($aksi == "edit") {
        if (!isset($_GET['id'])) {
            die("ID barang tidak ditemukan");
        }
        $id = $_GET['id'];
        $idpemasok = $_POST['pemasok'];
        $namabarang = $_POST['nama_barang'];
        $merk = $_POST['merk'];
        $ukuran = $_POST['ukuran'];
        $satuan = $_POST['satuan'];
        $idkategori = $_POST['kategori'];
        $hargabeli = $_POST['harga_beli'];
        $hargajual = $_POST['harga_jual'];
        $deskripsi = $_POST['deskripsi'];

        $sql = "UPDATE barang SET 
                id_pemasok = '$idpemasok', 
                nama_barang = '$namabarang', 
                merk = '$merk', 
                ukuran = '$ukuran', 
                satuan = '$satuan', 
                id_kategori = '$idkategori', 
                harga_beli = '$hargabeli', 
                harga_jual = '$hargajual', 
                deskripsi = '$deskripsi' 
                WHERE id_barang = '$id'";

        if ($mysqli->query($sql)) {
            header('Location: ../../dashboard.php?modul=barang&status=success');
            exit();
        } else {
            die("Gagal mengedit data: " . $mysqli->error);
        }

    // Aksi hapus
    } elseif ($aksi == "hapus") {
        if (!isset($_GET['id'])) {
            die("ID barang tidak ditemukan");
        }
        $id = $_GET['id'];

        $sql = "DELETE FROM barang WHERE id_barang = '$id'";

        if ($mysqli->query($sql)) {
            header('Location: ../../dashboard.php?modul=barang&status=success');
            exit();
        } else {
            die("Gagal menghapus data: " . $mysqli->error);
        }
    } else {
        die("Aksi tidak valid");
    }
} else {
    die("Akses tidak valid");
}
?>